<?php

namespace App\Http\Controllers;

use App\User;
use Cassandra\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GithubLoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function getLogout()
    {
        Auth::logout();
        session(['my_access_token' => '']);
        return redirect('/login');
    }

    public function callback()
    {
        $code = isset($_GET['code']) ? $_GET['code'] : '';

        if( $code == '' ) {
            return redirect('/login');
        } else {
            $CLIENT_ID = '0438722c2246a5db8826';
            $CLIENT_SECRET = '4db6f89a572dfa25aed0ac06c1f3dd3a80a8e139';
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
                session(['my_access_token' => $data->access_token]);
                $this->handleLoginEvent();
                return redirect('/dashboard');
            }
        }
    }

    public function handleLoginEvent()
    {
        $URL = 'https://api.github.com/user';
        $ch = curl_init();
        $fileContent = [
            'Accept: application/json',
            'Authorization: token '.  session('my_access_token'),
            'User-Agent: php'
        ] ;

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $fileContent);
        $res = curl_exec($ch);
        curl_close ($ch);

        $data = json_decode($res);
        $user = User::where('github_id', $data->id )->first();
        if(!$user){
            $user = new User();
            $user->name = $data->login;
            $user->github_id = $data->id;
            $user->avatar = $data->avatar_url;
            $user->save();
        }
        Auth::login($user);
    }
}
