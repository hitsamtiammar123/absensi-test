@extends('template.base')
@section('content')
    <style>
        .blue-500{
            color: #0d6efd;
        }
    </style>
    <section class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-6 justify-content-center">
                <h2>Selamat datang Pak Haha Hehe, Silahkan klik tombol absen</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-4 d-flex justify-content-center">
                <button type="button" class="btn btn-success">
                    ABSEN MASUK
                </button>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6 justify-content-center">
               <h5 class="blue-500">
                   Anda masuk pada pukul 10:00 AM pada hari Senin, 20 January 2021
               </h5>
            </div>
        </div>
    </section>
@endsection
