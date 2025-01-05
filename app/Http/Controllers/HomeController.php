<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // This will reference the Blade file: resources/views/home.blade.php
    }
}
