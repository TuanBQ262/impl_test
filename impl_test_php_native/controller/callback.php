<?php
class callback {
    public function __construct () {
        $code = isset($_GET['code']) ? $_GET['code'] : '';

        if( $code == '' ) {
            include "view/github_login.php";
        } else {
            $CLIENT_ID = 'ad3c4c751ba98db216e8';
            $CLIENT_SECRET = '1bcab696fc9f2cf2b45fad854d8e198ad0dbe4b2';
            $URL = 'https://github.com/login/oauth/access_token';
            $postFields = [
              'client_id' => $CLIENT_ID,
              'client_secret' => $CLIENT_SECRET,
              'code' => $code
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            $res = curl_exec($ch);
            curl_close ($ch);

            $data = json_decode($res);
            if ($data->access_token != "") {
                session_start();
                $_SESSION["my_access_token"] = $data->access_token;
                header("location: ../index.php");
                exit();
            }
        }
    }
}
new callback();
?>