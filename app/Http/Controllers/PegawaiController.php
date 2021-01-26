<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Traits\RedirectionResponse;

class PegawaiController extends Controller
{
    //
    use RedirectionResponse;

    protected function makePegawaiValidator(Request $request, $type = 'CREATE'){
        $condition = [
            'name' => 'required',
            'email' => 'required|email|max:100',
            'division' => ['required', 'num' => function($attribute, $value, $fail){
                if(intval($value) === -1){
                    $fail($attribute.' harus diisi');
                }
            }]
        ];
        switch($type){
            case 'CREATE':
                $condition['password'] = 'required';
                $condition['email'].= '|unique:users,email';
            break;

        }
        return Validator::make($request->all(), $condition, [
            'required' => 'data :attribute harus diisi',
            'email' => 'format email salah',
            'max' => 'data :attribute maksimal :max karakter',
            'unique' => 'data :attribute sudah ada',
        ]);
    }

    protected function applyPegawaiData(User $pegawai, Request $request, $route, $type, $params = []){
        $validator = $this->makePegawaiValidator($request, $type);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $result = 0;
        // $type = 'pegawai.create';
        try{
            // $pegawai = new User();
            $pegawai->email = $request->email;
            $pegawai->name = $request->name;
            $request->password ? $pegawai->password = \bcrypt($request->password) : null;
            $pegawai->division_id = $request->division;
            $pegawai->role = 'EMPLOYEE';
            $result = $pegawai->save();
        }catch(\Exception $err){
            return $this->failedRedirection($type);
        }
        return $this->successRedirection($result, $route, $type, $params);
    }

    public function createPegawai(Request $request){
        $pegawai = new User();
        return $this->applyPegawaiData($pegawai, $request, 'pegawai.create', 'CREATE');
    }

    public function updatePegawai(Request $request, $id){
        $pegawai = User::find($id);
        if($pegawai){
            return $this->applyPegawaiData($pegawai, $request, 'pegawai.update', 'UPDATE', ['id' => $id]);
        }
        return \redirect()->route('pegawai.list');
    }

    public function deletePegawai($id){
        $user = User::find($id);
        $type = 'pegawai.list';
        if($user){
            $id = $user->id;
            $result = $user->delete();
            return redirect()->route($type)->with([
                'status' => 'SUCCESS_DELETE',
                'message' => 'Berhasil menghapus pegawai dengan ID '.$id
            ]);
        }
        return redirect()->route($type);
    }
}
