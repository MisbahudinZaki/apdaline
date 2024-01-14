@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">PASAMAN CERDAS</div>
            <div class="card-body">

<form action="{{ route('cari.beasiswa') }}" method="get">
<input type="text" name="keyword" placeholder="Cari nama pengirim">
<button type="submit" data-toggle="modal" data-target="#searchModal">Cari</button>
</form>

            </div>

            <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                </button>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form untuk input data -->
            <form action="{{ route('beasiswa.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">No Urut</label>
                    <input type="number"
                        class="form-control @error('no_urut') is-invalid  @enderror"
                        value="{{old('no_urut')}}" name="no_urut" placeholder="masukkan no urut">
                </div>



                <div class="form-group">
                    <label class="font-weight-bold">Nama Pengirim</label>
                    <input type="text"
                        class="form-control @error('pengirim') is-invalid  @enderror"
                        value="{{old('pengirim')}}" name="pengirim"
                        placeholder="masukkan nama">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Alamat Pengirim</label>
                    <input type="text"
                        class="form-control @error('alamat_pengirim') is-invalid  @enderror"
                        value="{{old('alamat_pengirim')}}" name="alamat_pengirim"
                        placeholder="masukkan alamat pengirim">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Jenis</label>
                    <input type="text"
                        class="form-control @error('jenis') is-invalid  @enderror"
                        value="{{old('jenis')}}" name="jenis"
                        placeholder="masukkan jenis bantuan">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">tanggal masuk</label>
                    <input type="date" name="tanggal_masuk"
                        class="form-control @error('tanggal_masuk') is-invalid @enderror"
                        value="{{ old('tanggal_masuk') }}" id="tanggal_masuk"
                        placeholder="masukan tanggal">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">tanggal keluar</label>
                    <input type="date" name="tanggal_keluar"
                        class="form-control @error('tanggal_keluar') is-invalid @enderror"
                        value="{{ old('tanggal_keluar') }}" id="tanggal_keluar"
                        placeholder="masukan tanggal keluar">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>



                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">NO URUT</th>
                        <th scope="col">DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beasiswas as $item)
                            <tr>
                                <td>{{$item->no_urut}}</td>
                                <td>
                                    <ul>
                                        <li>{{$item->pengirim}}</li>
                                        <li>{{$item->jenis}}</li>
                                        <li>{{$item->alamat_pengirim}}</li>
                                        <li>{{$item->tanggal_masuk}}</li>
                                        <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="{{ $item->id }}">Edit</button>

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
                    <form action="{{ route('beasiswa.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">No Urut</label>
                            <input type="number"
                                class="form-control @error('no_urut') is-invalid  @enderror"
                                value="{{old('no_urut', $item->no_urut)}}" name="no_urut" placeholder="masukkan no urut">
                        </div>



                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pengirim</label>
                            <input type="text"
                                class="form-control @error('pengirim') is-invalid  @enderror"
                                value="{{old('pengirim', $item->pengirim)}}" name="pengirim"
                                placeholder="masukkan nama">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Alamat Pengirim</label>
                            <input type="text"
                                class="form-control @error('alamat_pengirim') is-invalid  @enderror"
                                value="{{old('alamat_pengirim', $item->alamat_pengirim)}}" name="alamat_pengirim"
                                placeholder="masukkan alamat pengirim">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenis</label>
                            <input type="text"
                                class="form-control @error('jenis') is-invalid  @enderror"
                                value="{{old('jenis', $item->jenis)}}" name="jenis"
                                placeholder="masukkan jenis bantuan">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">tanggal masuk</label>
                            <input type="date" name="tanggal_masuk"
                                class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                value="{{ old('tanggal_masuk', $item->tanggal_masuk) }}" id="tanggal_masuk"
                                placeholder="masukan tanggal">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">tanggal keluar</label>
                            <input type="date" name="tanggal_keluar"
                                class="form-control @error('tanggal_keluar') is-invalid @enderror"
                                value="{{ old('tanggal_keluar', $item->tanggal_keluar) }}" id="tanggal_keluar"
                                placeholder="masukan tanggal keluar">
                        </div>

                        <!-- Tambahkan field lain jika diperlukan -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </li>
        <li><form onsubmit="return confirm('apakah anda yakin?')" action="{{route('ekspedisi.destroy', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-md btn-danger">hapus</button>
            </form></li>
                                    </ul>
                                   </td>

                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Kosong
                            </div>
                        @endforelse
                    </tbody>
                </table>

            </div>
            </div>
        </div>

    </div>
</div>
@endsection
