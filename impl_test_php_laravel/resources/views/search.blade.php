@extends('components.master')
@section('content')

<div class="dashboard">
    <h2>Search</h2>
    <?php if (!$data) : ?>
    <p>Nodata</p>
    <?php elseif ($data != null): ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">NAME</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 0;
        foreach ($data as $item):
        ?>
        <tr>
            <th scope="row">{{ $count += 1 }}</th>
            <td>{{ $item->name }} | {{ $item->stargazers_count }} stargazers</td>
            <?php
            $is_clone = \App\ReposClone::get_a_repos($item->name, $search_key);
            ?>

            <?php if ($is_clone == null): ?>
            <td><a type="button" href="{{ route('clone-repos', [$search_key, $item->name]) }} " class="btn btn-success">Clone</a></td>
            <?php else: ?>
            <td><a type="button" style="cursor: default;" class="btn btn-warning">Saved</a></td>
            <?php endif; ?>
        </tr>
        <?php
        endforeach;
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Hiển thị {{ $per_page }}/ {{ $numberRepos }} Repos </th>
            <?php if($per_page != $numberRepos) : ?>
            <th colspan="2"><a href="{{ route('search', [$search_key, $per_page_next]) }}">ViewMore</a></th>
            <?php else: ?>
            <th colspan="2"></th>
            <?php endif; ?>
        </tr>
        </tfoot>
    </table>
    <?php endif; ?>
</div>


@endsection

@section('header')
    @include('components.header_login')
@endsection

@section('title', 'Search')
