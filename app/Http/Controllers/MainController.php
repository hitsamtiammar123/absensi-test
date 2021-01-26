<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function absen(){
        return view('absen');
    }

    public function pegawai(){
        return view('pegawai');
    }
}
