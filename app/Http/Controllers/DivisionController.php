<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Division;
use App\Http\Controllers\Traits\RedirectionResponse;
use Validator;

class DivisionController extends Controller
{
    //
    use RedirectionResponse;
    protected function makeDivisionValidator(Request $request){
        return Validator::make($request->all(),[
            'nama' => 'required',
        ],[
            'required' => ':attribute harus diisi'
        ]);
    }

    public function createDivision(Request $request){
        $validator = $this->makeDivisionValidator($request);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $result = 0;
        $type = 'divisi.create';
        try{
            $division = new Division();
            $division->nama = $request->nama;
            $result = $division->save();
        }catch(Exception $err){
            return $this->failedRedirection($type);
        }

        return $this->successRedirection($result, $type, 'CREATE');
    }

    public function deleteDivision($id){
        $divisi = Division::find($id);
        $type = 'divisi.list';
        if($divisi){
            $id = $divisi->id;
            $result = $divisi->delete();
            return redirect()->route($type)->with([
                'status' => 'SUCCESS_DELETE',
                'message' => 'Berhasil menghapus Divisi dengan ID '.$id
            ]);
        }
        return redirect()->route($type);
    }


}
