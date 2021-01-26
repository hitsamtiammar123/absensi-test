@extends('template.base')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="mt-3">{{isset($title) ? $title : 'Buat Divisi Baru'}}</h1>
            <div class="mt-3">
                <a href="{{route('divisi.list')}}">
                    <button class="btn btn-primary">Lihat List Divisi</button>
                </a>
            </div>
                <form class="mt-5" action="{{$route}}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Nama Divisi</label>
                            <input type="text" value="{{isset($division) ? $division->nama : ''}}" class="form-control" name="nama" id="divisi" placeholder="Silahkan masukan nama divisi">
                            @error('nama')
                                <p class="red">{{$errors->first('nama')}}</p>
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
