<?php

class header {
    public function __construct () {
        $accessToken = isset($_SESSION["my_access_token"]) ? $_SESSION["my_access_token"] : '' ;
        if( $accessToken == '' ) {
            include "view/header_notlogin.php";
        } else {
            include "view/header_login.php";
        }
    }
}
new header();
?>