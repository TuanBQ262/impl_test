<?php

class dashboard {
    public function __construct () {
        $accessToken = isset($_SESSION["my_access_token"]) ? $_SESSION["my_access_token"] : '' ;
        if( $accessToken == '' ) {
            include "view/github_login.php";
        } else {
            $URL = 'https://api.github.com/user';
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

            include "view/dashboard.php";
        }
    }
}
new dashboard();
?>