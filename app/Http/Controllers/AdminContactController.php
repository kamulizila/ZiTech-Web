<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    // View all messages
    public function index()
    {
        $messages = Contact::all();
        return view('messages', compact('messages'));
    }

    // Reply to a message
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message = Contact::findOrFail($id);
        $message->reply = $request->reply;
        $message->save();

        return redirect()->back()->with('success', 'Reply sent successfully!');
    }

    // Delete a message
    public function deleteMessage($id)
    {
        $message = Contact::findOrFail($id); // Corrected from Message to Contact
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully');
    }
}
