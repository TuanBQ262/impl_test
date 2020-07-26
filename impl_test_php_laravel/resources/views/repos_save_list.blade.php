@extends('components.master')
@section('content')

    <div class="dashboard">
        <h2>Repos Save List</h2>
        <?php if (!$repos) : ?>
        <p>Nodata</p>
        <?php elseif ($repos != null): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">OWNER</th>
                <th scope="col">NAME</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($repos as $item):
            ?>
            <tr>
                <th scope="row">{{ $count += 1 }}</th>
                <td>{{ $item->owner }}</td>
                <td>{{ $item->repos_name }}</td>
                <th><a href="{{ route('repos-fork', [$item->owner, $item->repos_name]) }}">FORK</a></th>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>


@endsection

@section('header')
    @include('components.header_login')
@endsection

@section('title', 'Repos Save List')
