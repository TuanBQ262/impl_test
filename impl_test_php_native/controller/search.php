<?php

class search {
    public $model;
    public function __construct () {
        require_once ('model/model.php');
        $this->model = new model();
        $search_key = isset($_GET["search_key"]) ? $_GET["search_key"] : "";
        $per_page = isset($_GET["per_page"]) ? $_GET["per_page"] : 30;
        $URL = 'https://api.github.com/users/'.$search_key.'/repos?&per_page='.$per_page;
        $ch = curl_init();
        $fileContent = [
            'Accept: application/json',
            'Authorization: token '.  $_SESSION["my_access_token"],
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
        include "view/search.php";
    }

    public function count_user_data ($search_key) {
        $URL = 'https://api.github.com/users/'.$search_key.'/repos';
        $ch = curl_init();
        $fileContent = [
            'Accept: application/json',
            'Authorization: token '.  $_SESSION["my_access_token"],
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
}
new search();
?>