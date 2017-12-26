<?php

namespace App\Http\Controllers;

class ContactMessageController extends Controller
{
    public function getContactIndex() {
        //fetch posts and paginate
        return view('frontend.other.contact');
    }
}