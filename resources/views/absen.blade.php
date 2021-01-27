@extends('template.base')
@php
    $today_absence = $user->todaysAbsences();
    $has_absense = !is_null($today_absence);
    $message = '';
    $m_class = '';
    $disabled_btn = false;
    if($today_absence){
        if(!$today_absence->is_fulfilled){
            $m_class = 'blue-500';
            $message = $today_absence->in_hour_message;
        }
        else{
            $m_class = 'red-500';
            $message = $today_absence->out_hour_message;
            $disabled_btn = true;
        }
    }

@endphp
@section('content')
    <style>
        .blue-500{
            color: #0d6efd;
        }
        .red-500{
            color:#dc3545;
        }
    </style>
    <section class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-6 justify-content-center align-items-center">
                <h2 class="text-center">Selamat datang {{$user->name}}</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-4 d-flex justify-content-center">
                <button type="button" {{$disabled_btn ? 'disabled' : ''}} id="absen-btn" class="btn {{!$has_absense ? 'btn-success' : 'btn-danger'}}">
                    @if (!$has_absense)
                        <input type="hidden" id="type" value="masuk">
                        ABSEN MASUK
                    @else
                        <input type="hidden" id="type" value="keluar">
                        ABSEN KELUAR
                    @endif
                </button>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6 justify-content-center">
               <h5 id="message" class="{{$m_class}}">
                   {{$message}}
               </h5>
            </div>
        </div>
    </section>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/absen.js')}}"></script>
@endsection
