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

    public function createPegawai(Request $request){
        $validator = $this->makePegawaiValidator($request);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $result = 0;
        $type = 'pegawai.create';
        try{
            $pegawai = new User();
            $pegawai->email = $request->email;
            $pegawai->name = $request->name;
            $pegawai->password = \bcrypt($request->password);
            $pegawai->division_id = $request->division;
            $pegawai->role = 'EMPLOYEE';
            $result = $pegawai->save();
        }catch(\Exception $err){
            return $this->failedRedirection($type);
        }
        return $this->successRedirection($result, $type, 'CREATE');
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
