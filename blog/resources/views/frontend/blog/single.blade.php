@extends('layouts.master')

@section('title')
    Post title
@endsection

@section('content')
    {{--Posts--}}
    <article>
        <h1>Post Title</h1>
        <span class="subtitle">Post Author | Date</span>
        <p>Post body</p>
    </article>
@endsection