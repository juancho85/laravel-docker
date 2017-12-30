@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
@endsection

@section('content')
    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif
    @if(Session::has('fail'))
        <section class="info-box fail">
            {{ Session::get('fail') }}
        </section>
    @endif
    <form action="{{ route('admin.login') }}" method="post">
        <div class="input-group">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" placeholder="Your name">
        </div>
        <div class="input-group">
            <label for="password">Your password</label>
            <input type="password" name="password" id="password" placeholder="Your password">
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button class="btn" type="submit">Submit</button>
    </form>
@endsection