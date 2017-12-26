@extends('layouts.master')

@section('title')
    Blog Index
@endsection

@section('content')
    {{--Posts--}}
    <article>
        <h3>Post Title</h3>
        <span class="subtitle">Post Author | Date</span>
        <p>Post body</p>
        <a href="#">Read more</a>
    </article>
    {{--Pagination--}}
    <section class="pagination"></section>
@endsection