<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    //

    protected function makePegawaiValidator(Request $request){
        return Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required',
            'division' => ['required', function($attribute, $value, $fail){
                if(intval($value) === -1){
                    $fail($attribute.' harus diisi');
                }
            }]
        ], [
            'required' => 'data :attribute harus diisi',
            'email' => 'format email salah',
            'max' => 'data :attribute maksimal :max karakter',
            'unique' => 'data :attribute sudah ada'
        ]);
    }

    protected function failedRedirection($route){
        return redirect()->route('pegawai.create')->with([
            'status' => 'FAILED',
            'type' => 'CREATE'
        ]);
    }

    public function createPegawai(Request $request){
        $validator = $this->makePegawaiValidator($request);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $result -= 0;
        try{
            $pegawai = new User();
            $pegawai->email = $request->email;
            $pegawai->name = $request->name;
            $pegawai->password = \bcrypt($request->password);
            $pegawai->division_id = $request->division;
            $pegawai->role = 'EMPLOYEE';
            $result = $pegawai->save();
        }catch(\Exception $err){
            return $this->failedRedirection('pegawai.create');
        }
        return $result ? redirect()->route('pegawai.create')->with([
            'status' => 'SUCCESS',
            'type' => 'CREATE'
        ]) : $this->failedRedirection();
    }
}
