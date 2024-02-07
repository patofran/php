<?php

namespace App\Http\Controllers;


class homeController extends Controller
{
    public function getHome(){
        return view('home');
    }
}
