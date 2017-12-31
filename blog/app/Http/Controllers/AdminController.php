<?php

namespace App\Http\Controllers;
use App\ContactMessage;
use App\Post;

class AdminController extends Controller
{
    public function getIndex() {
        //fetch posts and paginate
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $contact_messages = ContactMessage::orderBy('created_at', 'desc')->take(3)->get();
        return view('admin.index', ['posts' => $posts, 'contact_messages' => $contact_messages]);
    }
}