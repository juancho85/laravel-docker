@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/form.css') }}" type="text/css">
@endsection

@section('content')
    @include('includes.info-box')
    <form action="{{ route('contact.send') }}" method="post" id="contact-form">
        <div class="input-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" value="{{ Request::old('name') }}"/>
        </div>
        <div class="input-group">
            <label for="email">Your e-mail</label>
            <input type="text" name="email" id="email" value="{{ Request::old('email') }}" />
        </div>
        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" value="{{ Request::old('subject') }}"/>
        </div>
        <div class="input-group">
            <label for="message">Your message</label>
            <textarea rows="10" name="message" id="message">{{ Request::old('message') }}</textarea>
        </div>
        <button type="submit" class="btn">Submit message</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token" />
    </form>
@endsection