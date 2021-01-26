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

    public function createPegawai(){
        return view('create-pegawai');
    }

    public function divisi(){
        return view('divisi');
    }

    public function createDivisi(){
        return view('create-divisi');
    }
}
