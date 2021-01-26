<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\Division;
use App\Model\User;
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
        $users = User::where('role','Employee')->get();
        return view('pegawai',[
            'users' => $users
        ]);
    }

    public function createPegawai(){
        $divisions = Division::all();
        return view('create-pegawai', [
            'divisions' => $divisions,
        ]);
    }

    public function divisi(){
        $divisions = Division::all();
        return view('divisi', [
            'divisions' => $divisions
        ]);
    }

    public function createDivisi(){

        return view('create-divisi');
    }
}
