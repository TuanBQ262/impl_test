<?php

class clone_repos {
    public $model;
    public function __construct () {
        require_once ('../model/model.php');
        $this->model = new model();
        $owner = isset($_GET["owner"]) ? $_GET["owner"] : "";
        $repos_name = isset($_GET["repos_name"]) ? $_GET["repos_name"] : "";
        $this->model->execute("insert into repos_clone(repos_name, owner) values ('$repos_name', '$owner')");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
new clone_repos();
?>