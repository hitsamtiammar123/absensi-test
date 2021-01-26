@extends('template.base')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="mt-3">Buat Karyawan Baru</h1>
            <div class="mt-3">
                <a href="{{route('pegawai.list')}}">
                    <button class="btn btn-primary">Lihat List Karyawan</button>
                </a>
            </div>
                <form class="mt-5" action="" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" id="nama" placeholder="Silahkan masukan nama karyawan">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Silahkan masukan email karyawan">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Silahkan masukan password">
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi">
                                <option selected>-- Silahkan masukan divisi --</option>
                                <option value="1">IT</option>
                                <option value="2">Finance</option>
                            </select>
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
