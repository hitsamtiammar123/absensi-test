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
                            <th scope="col">No.</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>IT</td>
                            <td>
                                <button type="button" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                            <td>Finance</td>
                            <td>
                                <button type="button" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
