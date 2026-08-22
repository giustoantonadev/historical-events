<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotification;
use App\Models\Message;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Log::info('Contact form submitted', $data);

        // Persist to DB
        $msg = Message::create([
            'type' => 'contact',
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);

        // Queue email notification
        $to = config('mail.from.address');
        if ($to) {
            try {
                Mail::to($to)->queue(new ContactNotification(array_merge(['type' => 'contact', 'id' => $msg->id], $data)));
            } catch (\Exception $e) {
                Log::error('Failed to queue contact email: ' . $e->getMessage());
            }
        }

        return response()->json(['ok' => true, 'id' => $msg->id]);
    }

    public function support(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'issueType' => 'required|string|in:bug,feature,question',
            'priority' => 'required|string|in:low,medium,high,urgent',
            'note' => 'required|string',
            'steps' => 'nullable|string',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            // store to ensure worker can access the file when processing the queue
            $attachmentPath = $request->file('attachment')->store('support_attachments', 'public');
            $data['attachment'] = $attachmentPath;
        }

        Log::info('Support request submitted', $data);

        // Persist support request
        $msg = Message::create([
            'type' => 'support',
            'name' => null,
            'email' => $data['email'],
            'message' => $data['note'],
            'issue_type' => $data['issueType'],
            'priority' => $data['priority'],
            'steps' => $data['steps'] ?? null,
            'attachment' => $attachmentPath,
        ]);

        // Queue email notification to support-specific recipient (or fallback)
        $to = config('support.email');
        if ($to) {
            try {
                $payload = array_merge(['type' => 'support', 'id' => $msg->id], [
                    'email' => $data['email'],
                    'issue_type' => $data['issueType'],
                    'priority' => $data['priority'],
                    'steps' => $data['steps'] ?? null,
                    'message' => $data['note'],
                    'attachment' => $attachmentPath,
                ]);
                Mail::to($to)->queue(new ContactNotification($payload));
            } catch (\Exception $e) {
                Log::error('Failed to queue support email: ' . $e->getMessage());
            }
        }

        return response()->json(['ok' => true, 'attachment' => $attachmentPath, 'id' => $msg->id]);
    }
}
