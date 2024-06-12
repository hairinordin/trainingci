<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function list($arg='',$arg2='')
    {
        d($arg);

        d($arg2);
    }

    public function list2($arg='',$arg2='')
    {
        d($arg);

        d($arg2);
    }
}
