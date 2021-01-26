<?php

namespace App\Http\Controllers\Traits;

trait RedirectionResponse{

    protected function failedRedirection($route){
        return redirect()->route($route)->with([
            'status' => 'FAILED',
            'type' => 'CREATE'
        ]);
    }

    protected function successRedirection($result, $route, $type){
        return $result ? redirect()->route($route)->with([
            'status' => 'SUCCESS',
            'type' => $type
        ]) : $this->failedRedirection();
    }
}
