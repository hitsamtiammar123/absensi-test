<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Division;
class MainController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role === 'EMPLOYEE'){
                return redirect(route('absen'));
            }
            else if($user->role === 'ADMIN'){
                return redirect(route('pegawai.list'));
            }
        }
        return view('login');
    }

    public function absen(){
        return view('absen');
    }

    public function pegawai(){
        return view('pegawai');
    }

    public function createPegawai(){
        $divisions = Division::all();
        return view('create-pegawai', [
            'divisions' => $divisions,
        ]);
    }

    public function divisi(){
        return view('divisi');
    }

    public function createDivisi(){

        return view('create-divisi');
    }
}
