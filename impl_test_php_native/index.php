<?php
session_start();

$param_from_url = isset($_GET["controller"]) ? $_GET["controller"] : "main_content";
$file_controller = "controller/$param_from_url.php";
include "view/master_layout.php";
?>