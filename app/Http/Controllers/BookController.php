<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $halaman = "Halaman utama";
        return view('welcome',compact('halaman'));
    }
}
