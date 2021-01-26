@extends('template.base')
@section('content')
    <section class="container">
        <form action="" method="post">
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Silahkan masukan email disini">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Silahkan masukan password disini">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center mt-4">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary flex-1">
                        Masuk
                    </button>
                </div>
            </section>
        </form>
    </section>
@endsection
