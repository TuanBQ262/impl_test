<?php

class repos_save_list {
    public $model;
    public function __construct () {
        require_once ('model/model.php');
        $this->model = new model();
        $repos = $this->model->get_all("select * from repos_clone");
        include "view/repos_save_list.php";
    }

}
new repos_save_list();
?>