<?php

class main_content {
    public function __construct () {
        $accessToken = isset($_SESSION["my_access_token"]) ? $_SESSION["my_access_token"] : '' ;
        if( $accessToken == '' ) {
            include "view/github_login.php";
        } else {
            include "controller/dashboard.php";
        }
    }
}
new main_content();
?>