<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        return view('user/landing_page');
    }

    public function main(): string{
        return view('dashboard');
    }
}
