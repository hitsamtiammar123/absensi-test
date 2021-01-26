<?php

namespace App\Http\Controllers\Traits;

trait RedirectionResponse{

    protected function failedRedirection($route, $params = []){
        return redirect()->route($route, $params)->with([
            'status' => 'FAILED',
            'type' => 'CREATE'
        ]);
    }

    protected function successRedirection($result, $route, $type, $params = []){
        return $result ? redirect()->route($route, $params)->with([
            'status' => 'SUCCESS',
            'type' => $type
        ]) : $this->failedRedirection();
    }
}
