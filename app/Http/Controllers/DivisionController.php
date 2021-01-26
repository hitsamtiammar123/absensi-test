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

    protected function applyDivisionData(Division $division, Request $request, $route, $type, $params = []){
        $validator = $this->makeDivisionValidator($request);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $result = 0;
        // $type = 'divisi.create';
        try{
            $division->nama = $request->nama;
            $result = $division->save();
        }catch(Exception $err){
            return $this->failedRedirection($route, $params);
        }

        return $this->successRedirection($result, $route, $type, $params);
    }

    public function createDivision(Request $request){
        $division = new Division();
        return $this->applyDivisionData($division, $request, 'divisi.create', 'CREATE');
    }

    public function updateDivision(Request $request, $id){
        $division = Division::find($id);
        if($division){
            return $this->applyDivisionData($division, $request, 'divisi.update', 'UPDATE', ['id' => $id]);
        }
        return redirect()->route('divisi.list');
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
