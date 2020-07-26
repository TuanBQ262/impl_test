<?php

namespace App\Http\Controllers;

use App\ReposClone;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSearch($search_key, $per_page){
        $URL = 'https://api.github.com/users/'.$search_key.'/repos?&per_page='.$per_page;
        $ch = curl_init();
        $fileContent = [
            'Accept: application/json',
            'Authorization: token '.  session('my_access_token'),
            'User-Agent: php'
        ] ;

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $fileContent);
        $res = curl_exec($ch);
        curl_close ($ch);
        $data = json_decode($res);
        $numberRepos = $this->count_user_data($search_key);
        $per_page_next = ($per_page + 30) <= $numberRepos ? $per_page + 30 : $numberRepos;
        return view('search', compact('data', 'per_page_next', 'search_key', 'per_page', 'numberRepos'));
    }

    public function count_user_data ($search_key) {
        $URL = 'https://api.github.com/users/'.$search_key.'/repos';
        $ch = curl_init();
        $fileContent = [
            'Accept: application/json',
            'Authorization: token '.  session('my_access_token'),
            'User-Agent: php'
        ] ;

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $fileContent);
        $res = curl_exec($ch);
        curl_close ($ch);
        $data = json_decode($res);

        return count($data);
    }

    public function clone_repos ($owner, $repos_name) {
        ReposClone::insert_a_record($owner, $repos_name);
        return redirect()->back();
    }
}
