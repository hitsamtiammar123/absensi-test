@extends('template.base')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="mt-3">{{$title}}</h1>
            <div class="mt-3">
                <a href="{{route('pegawai.list')}}">
                    <button class="btn btn-primary">Lihat List Karyawan</button>
                </a>
            </div>
                <form class="mt-5" action="{{$route}}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" value="{{isset($user) ? $user->name : ''}}" class="form-control" name="name" id="nama" placeholder="Silahkan masukan nama karyawan">
                            @error('nama')
                                <p class="red">{{$errors->first('nama')}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{isset($user) ? $user->email : ''}}" class="form-control" name="email" id="email" placeholder="Silahkan masukan email karyawan">
                            @error('email')
                            <p class="red">{{$errors->first('email')}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan masukan password">
                            @error('password')
                                <p class="red">{{$errors->first('password')}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" name="division" id="divisi">
                                <option value="-1" selected>-- Silahkan masukan divisi --</option>
                                @foreach ($divisions as $divisi)
                                    <option {{isset($user) && $divisi->id === $user->division->id ? 'selected' : ''}} value="{{$divisi->id}}">{{$divisi->nama}}</option>
                                @endforeach
                            </select>
                            @error('division')
                                <p class="red">{{$errors->first('division')}}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            @include('template.response-crud')
                        </div>
                    </div>
                </form>
        </div>
    </section>
@endsection
