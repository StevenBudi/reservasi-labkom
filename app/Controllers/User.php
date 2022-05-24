<?php

namespace App\Controllers;

class User extends BaseController
{
    public function login(){
        return view('/user/sign-in.php');
    }

    public function daftar(){
        return view('/user/sign-up.php');
    }
}
