@extends('layouts.master')

@section('title')
    Trending quotes
@endsection

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
@endsection

@section('content')
    <section class="quotes">
        <h1>Latest Quotes</h1>
        <article class="quote">
            <div class="delete"><a href="#">x</a></div>
            Quote text
            <div class="info">Created by <a href="#">Juan</a> on ...</div>
        </article>
        Pagination
    </section>

    <section class="edit-quote">
        <h1>Add a Quote</h1>
        <form action="">
            <div class="input-group">
                <label for="author">Your Name</label>
                <input type="text" name="author" id="author" placeholder="Your Name">
            </div>
            <div class="input-group">
                <label for="quote">Quote</label>
                <textarea rows="5" name="quote" id="quote" placeholder="Your Quote"></textarea>
            </div>
            <button class="btn" type="submit">submit quote</button>
            <input type="hidden" name="_token" value=""{{ Session::token() }}>
        </form>
    </section>
@endsection