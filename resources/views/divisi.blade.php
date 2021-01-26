@extends('template.base')
@section('content')
<section class="container">
    <div class="row">
        <h1 class="mt-3">List Divisi</h1>
        <div class="mt-3">
            <a href="{{route('divisi.create')}}">
                <button class="btn btn-primary">Buat Data Divisi</button>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisions as $divisi)
                            <tr>
                                <td>{{$divisi->id}}</td>
                                <td>{{$divisi->nama}}</td>
                                <td>
                                    <button type="button" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-danger" onclick="onDelete({{$divisi->id}})">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('components.delete-status')
            </div>
        </div>
    </div>
</section>
@include('components.delete-modal',['route' => 'divisi.delete'])
@endsection
