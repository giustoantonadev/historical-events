<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

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
            $path = storage_path('app/public/' . $m->attachment);
            if (file_exists($path)) {
                @unlink($path);
            }
        }
        $m->delete();
        return redirect()->route('admin.messages.index')->with('status', 'Message deleted');
    }
}
