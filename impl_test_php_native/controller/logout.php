<?php

class logout {
    public function __construct () {
        session_start();
        unset($_SESSION["my_access_token"]);
        header("location: ../index.php");
        exit();
    }
}
new logout();
?>