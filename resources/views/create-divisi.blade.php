@extends('template.base')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="mt-3">Buat Divisi Baru</h1>
            <div class="mt-3">
                <a href="{{route('divisi.list')}}">
                    <button class="btn btn-primary">Lihat List Divisi</button>
                </a>
            </div>
                <form class="mt-5" action="" method="POST">
                    <div class="row mt-3">
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control" id="divisi" placeholder="Silahkan masukan nama divisi">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </section>
@endsection
