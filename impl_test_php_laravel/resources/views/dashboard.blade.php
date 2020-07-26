@extends('components.master')
@section('content')
    <div class="dashboard">
        <h2>Dashboard</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $data->id }}</td>
            </tr>
            <tr>
                <th scope="row">Username</th>
                <td>{{ $data->login }}</td>
            </tr>
            <tr>
                <th scope="row">Avatar</th>
                <td> <img width="50" src="{{ $data->avatar_url }}"> </td>
            </tr>
            <tr>
                <th scope="row">Public repos</th>
                <td> {{ $data->public_repos }} </td>
            </tr>
            <tr>
                <th scope="row">Public gists</th>
                <td> {{ $data->public_gists }} </td>
            </tr>
            <tr>
                <th scope="row">Following</th>
                <td> {{ $data->following }} </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('header')
    @include('components.header_login')
@endsection

@section('title', 'Dashboard')
