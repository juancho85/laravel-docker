@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/modal.css') }}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="" class="btn">New Posts</a></li>
                        <li><a href="" class="btn">Show all posts</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{--if no posts--}}
                    <li>No Posts</li>
                    {{--if posts--}}
                    <li>
                        <article>
                            <div class="post-info">
                                <h3>Post title</h3>
                                <span class="info">Post Author | Date</span>
                            </div>
                        </article>
                        <div class="edit">
                            <nav>
                                <ul>
                                    <li><a href="">View Post</a></li>
                                    <li><a href="">Edit</a></li>
                                    <li><a href="" class="danger">Delete</a></li>
                                </ul>
                            </nav>
                        </div>
                    </li>
                </ul>
            </section>
        </div>

        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="" class="btn">Show all messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{--if no messages--}}
                    <li>No Posts</li>
                    {{--if messages--}}
                    <li>
                        <article date-message="Body" data-id="ID">
                            <div class="message-info">
                                <h3>Message subject</h3>
                                <span class="info">Sender ... | Date</span>
                            </div>
                        </article>
                        <div class="edit">
                            <nav>
                                <ul>
                                    <li><a href="">View</a></li>
                                    <li><a href="" class="danger">Delete</a></li>
                                </ul>
                            </nav>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </div>

    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">Close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}"
    </script>
    <script type="text/javascript" src="{{ URL::to('js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/contact_messages.js') }}"></script>
@endsection
