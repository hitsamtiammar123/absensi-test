@extends('template.base')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="mt-3">List Pegawai</h1>
            <div class="mt-3">
                <a href="{{route('pegawai.create')}}">
                    <button class="btn btn-primary">Buat Data Pegawai</button>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Divisi</th>
                                <th>Jam Masuk Terakhir</th>
                                <th>Jam Keluar Terakhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->division === null ? '' : $user->division->nama}}</td>
                                    <td>{{$user->today_absences === null ? '' : $user->today_absences->in_hour_formated}}</td>
                                    <td>{{$user->today_absences === null ? '' : $user->today_absences->out_hour_formated}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success">
                                            <a class="link" href="{{route('pegawai.update.post',['id' => $user->id])}}">Update</a>
                                        </button>
                                        <button type="button" onclick="onDelete({{$user->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
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
    @include('components.delete-modal',['route' => 'pegawai.delete'])
@endsection
