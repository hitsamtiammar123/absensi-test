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
        $user = Auth::user();
        return view('absen', [
            'user' => $user
        ]);
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
            'title' => 'Buat Pegawai Baru',
            'route' => route('pegawai.create.post'),
            'divisions' => $divisions,
        ]);
    }

    public function updatePegawai($id){
        $divisions = Division::all();
        $user = User::find($id);
        if($user !== null){
            return view('create-pegawai',[
                'title' => 'Ubah Pegawai',
                'route' => route('pegawai.update.post', ['id' => $id]),
                'user' => $user,
                'divisions' => $divisions,
            ]);
        }
        return \redirect()->route('pegawai.list');
    }

    public function divisi(){
        $divisions = Division::all();
        return view('divisi', [
            'divisions' => $divisions
        ]);
    }

    public function createDivisi(){
        return view('create-divisi', [
            'title' => 'Buat Divisi Baru',
            'route' => route('divisi.create.post')
        ]);
    }

    public function updateDivisi($id){
        $division = Division::find($id);
        if($division !== null){
            return view('create-divisi',[
                'title' => 'Ubah Divisi',
                'route' => route('divisi.update.post',['id' => $division->id]),
                'division' => $division
            ]);
        }
        return redirect()->route('divisi.list');
    }
}
