@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/form.css') }}" type="text/css">
@endsection

@section('content')
    @include('includes.info-box')
    <div class="container">
        <section id="post-admin">
            <a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
        </section>
        <section class="list">
            <ul>
                @if(count($posts) == 0 )
                    No Posts
                @else
                    @foreach($posts as $post)
                        <article>
                            <div class="post-info">
                                <h3>{{ $post->title }}</h3>
                                <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
                            </div>
                            <div class="edit">
                                <nav>
                                    <ul>
                                        <li><a href="{{route('admin.blog.single', ['post_id' => $post->id, 'end' => 'admin'])}}">View Post</a></li>
                                        <li><a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id])}}">Edit</a></li>
                                        <li><a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="danger">Delete</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    @endforeach
                @endif
            </ul>
        </section>
        @if($posts->lastPage() > 1)
            <section class="pagination">
                @if($posts->currentPage() != 1)
                    <a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-caret-left"></i></a>
                @endif
                @if($posts->currentPage() != $posts->lastPage())
                    <a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
                @endif
            </section>
        @endif
    </div>
@endsection
