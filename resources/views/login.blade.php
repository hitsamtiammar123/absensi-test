@extends('template.base')
@section('content')
    <section class="container">
        <form action="{{route('login')}}" method="post">
            @csrf
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Silahkan masukan email disini">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Silahkan masukan password disini">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary flex-1">
                        Masuk
                    </button>
                    <div class="mt-4">
                        <h6 class="error">{{$errors->first('message')}}</h6>
                    </div>
                </div>

            </section>
        </form>
    </section>
    <style>
        .error{
            color:red;
        }
    </style>
@endsection
