<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Absence;
use Carbon\Carbon;
use Auth;

class AbsenceController extends Controller
{
    //

    public function absenceIn(Request $request){
        $user = Auth::user();
        if($user){
            $now = Carbon::now()->clone();
            if(!$user->hasTodayAbsence()){
                $absence = new Absence();
                try{
                    $absence->user_id = $user->id;
                    $absence->in_hour = $now->format(Absence::FORMAT_DISPLAY);
                    $absence->save();
                }catch(\Exception $err){
                    return response([
                        'status' => 'FAILED',
                    ], 500);
                }
                $message = $absence->in_hour_message;
                return [
                    'status' => 'SUCCESS',
                    'message' => $message
                ];
            }
        }
        return response([
            'status' => 'unauthenticated'
        ], 403);
    }

    public function absenceOut(Request $request){
        $user = Auth::user();
        if($user){
            $now = Carbon::now()->clone();
            $absence = $user->todaysAbsences();
            if($absence->is_fulfilled){
                return [
                    'status' => 'FULFILLED'
                ];
            }
            if($absence){
                try{
                    $in_hour = $absence->in_hour->clone();
                    $absence->out_hour = $absence->in_hour = $now->format(Absence::FORMAT_DISPLAY);
                    $absence->save();
                    $absence->in_hour = $in_hour->format(Absence::FORMAT_DISPLAY);
                    $absence->save();
                    //$absence->save();
                }catch(\Exception $err){
                    return response([
                        'status' => 'FAILED',
                    ], 500);
                }
                $message = $absence->out_hour_message;
                return [
                    'status' => 'SUCCESS',
                    'message' => $message
                ];
            }
        }
        return response([
            'status' => 'unauthenticated'
        ], 403);
    }
}
