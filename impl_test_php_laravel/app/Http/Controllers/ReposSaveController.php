<?php

namespace App\Http\Controllers;

use App\Jobs\ForkRepos;
use App\ReposClone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReposSaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReposSaveList () {
        $repos = ReposClone::get_all_record();
        return view('repos_save_list', compact('repos'));
    }

    public function ForkReposEvent ($owner, $repo) {
        ForkRepos::dispatch($owner, $repo);

//        return redirect()->back();
    }
}

