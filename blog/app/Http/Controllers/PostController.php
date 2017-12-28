<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getBlogIndex() {
        //fetch posts and paginate
        $posts = Post::paginate(5);
        foreach ($posts as $post) {
            $post->body = $this->shortenedText($post->body, 20);
        }
        return view('frontend.blog.index', ['posts' => $posts]);
    }

    public function getPostsIndex() {
        $posts = Post::paginate(5);
        return view('admin.blog.index', ['posts' => $posts]);
    }

    public function getSinglePost($post_id, $end = 'frontend') {
        $post = Post::find($post_id);
        if(!$post) {
            return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
        }
        return view($end . '.blog.single', ['post' => $post]);
    }

    public function getCreatePost() {
        return view('admin.blog.create_post');
    }

    public function postCreatePost(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:120|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];

        $post->save();
        //TODO: attaching categories

        return redirect()->route('admin.index')->with(['success' => 'Post successfully created!']);
    }

    public function getUpdatePost($post_id) {
        $post = Post::find($post_id);
        if(!$post) {
            return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
        }
        //TODO: find categories
        return view('admin.blog.edit_post', ['post' => $post]);
    }

    public function postUpdatePost(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:120',
            'author' => 'required|max:80',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];

        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        //TODO handle fail case
        $post->update();
        //TODO: attaching categories
        return redirect()->route('admin.index')->with(['success' => 'Post successfully updated!']);
    }

    public function getDeletePost($post_id) {
        $post = Post::find($post_id);
        if(!$post) {
            return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post successfully deleted!']);
    }

    private function shortenedText($text, $word_count) {
        if(str_word_count($text, 0) > $word_count) {
            // Extracts the words
            $words = str_word_count($text, 2);
            // Position of last character to include
            $pos = array_keys($words);
            // Get the text from start to the last character to include
            $text = substr($text, 0, $pos[$word_count]) . '...';
        }
        return $text;
    }
}