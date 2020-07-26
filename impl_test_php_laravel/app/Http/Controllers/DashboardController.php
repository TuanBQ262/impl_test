<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDashboard()
    {
        $accessToken = session('my_access_token');
        if( $accessToken == '' ) {
            return redirect('/login');
        } else {
            $URL = 'https://api.github.com/user';
            $ch = curl_init();
            $fileContent = [
                'Accept: application/json',
                'Authorization: token '. session('my_access_token'),
                'User-Agent: php'
            ] ;

            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $fileContent);
            $res = curl_exec($ch);
            curl_close ($ch);
            $data = json_decode($res);
        }
        return view('dashboard', compact('data'));
    }

}
