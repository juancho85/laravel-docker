<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Event;

class ContactMessageController extends Controller
{
    public function getContactIndex() {
        //fetch posts and paginate
        return view('frontend.other.contact');
    }
    public function postSendMessage(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|max:100',
            'subject' => 'required|max:100',
            'message' => 'required|min:10',
        ]);
        $message = new ContactMessage();
        $message->email = $request['email'];
        $message->sender = $request['name'];
        $message->subject = $request['subject'];
        $message->body = $request['message'];
        $message->save();
        Event::fire(new MessageSent($message));
        return redirect()->route('contact')->with(['success' => 'Message successfully sent!']);
    }

    public function getContactMessageIndex() {
        $contact_messages = ContactMessage::orderBy('created_at', 'desc')->paginate('5');
        return view('admin.other.contact_messages', ['contact_messages' => $contact_messages]);
    }

    public function getDeleteMessage($message_id) {
        $contact_message = ContactMessage::find($message_id);
        $contact_message->delete();
        return Response::json(['message' => 'Category deleted'], 200);
    }
}