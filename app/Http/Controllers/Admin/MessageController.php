<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController
{
    public function index() {
        $messages = Message::latest()->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function show($id) {
        $message = Message::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message Deleted Successfully');
    }
}
