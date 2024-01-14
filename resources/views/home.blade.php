@extends('layouts.app')
@section('content')

<body style="background: lightgrey">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h1>Selamat Datang</h1>
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>:</td>
                                    <td>{{$data->no_hp}}</td>
                                </tr>
                                <tr>
                                    <td>Edit</td>
                                    <td>:</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="{{ $data->id }}">Edit</button>

                                    <!-- File: resources/views/data/edit.blade.php -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form untuk update data -->
            <form action="{{ route('pengguna.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text"
                        class="form-control @error('name') is-invalid  @enderror"
                        value="{{old('name', $data->name)}}" name="name"
                        placeholder="masukkan alamat pengirim">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">No hp</label>
                    <input type="number"
                        class="form-control @error('no_hp') is-invalid  @enderror"
                        value="{{old('no_hp', $data->no_hp)}}" name="no_hp" placeholder="masukkan no hp">
                </div>





                <!-- Tambahkan field lain jika diperlukan -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
