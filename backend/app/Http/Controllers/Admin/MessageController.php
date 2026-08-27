<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(int|string $id): \Illuminate\Contracts\View\View
    {
        $m = Message::findOrFail($id);
        return view('admin.messages.show', compact('m'));
    }

    public function destroy(int|string $id): \Illuminate\Http\RedirectResponse
    {
        $m = Message::findOrFail($id);
        // remove attachment file if exists
        if ($m->attachment) {
            if (Storage::disk('public')->exists($m->attachment)) {
                Storage::disk('public')->delete($m->attachment);
            }
        }
        $m->delete();
        return redirect()->route('admin.messages.index')->with('status', 'Message deleted');
    }
}
