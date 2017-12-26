<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function getBlogIndex() {
        //fetch posts and paginate
        return view('frontend.blog.index');
    }

    public function getSinglePost($post_id, $end = 'frontend') {
        //fetch the post
        return view($end . '.blog.single');
    }
}