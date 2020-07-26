<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReposClone extends Model
{
    protected $table = 'repos_clone';

    static function get_a_repos ($repos_name, $owner) {
        return ReposClone::where('repos_name', $repos_name)->where('owner', $owner)->first();
    }

    static function insert_a_record ($owner, $repos_name) {
        $repos_clone = new ReposClone();
        $repos_clone->owner = $owner;
        $repos_clone->repos_name = $repos_name;
        $repos_clone->save();
    }

    static function get_all_record () {
        return ReposClone::all();
    }
}
