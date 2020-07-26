@extends('components.master')
@section('content')
    <div class="login-btn">
        <h2>Login</h2>
        <a href="https://github.com/login/oauth/authorize?client_id=0438722c2246a5db8826">Login via github</a>
    </div>
@endsection

@section('header')
    @include('components.header_notlogin')
@endsection

@section('title', 'Login')
