@extends('index')
@section('title', 'Pengurus')

@section('isihalaman')
    <h3><center>Daftar Pengurus Perpustakaan Universitas Semarang</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPengurusTambah"> 
        Tambah Data Pengurus 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pengurus</td>
                <td align="center">Nama Pengurus</td>
                <td align="center">Email</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pengurus as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pengurus->firstItem() }}</td>
                    <td>{{$p->id_pengurus}}</td>
                    <td>{{$p->nama_pengurus}}</td>
                    <td>{{$p->email}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPengurusEdit{{$p->id_pengurus}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data pengurus -->
                        <div class="modal fade" id="modalPengurusEdit{{$p->id_pengurus}}" tabindex="-1" role="dialog" aria-labelledby="modalPengurusEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPengurusEditLabel">Form Edit Data Pengurus</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpengurustaedit" id="formpengurusedit" action="/pengurus/edit/{{ $p->id_pengurus}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pengurus" class="col-sm-4 col-form-label">Nama Pengurus</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" placeholder="Masukkan Nama Pengurus">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $p->email}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pengurustambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="pengurus/hapus/{{$p->id_pengurus}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pengurus->currentPage() }} <br />
    Jumlah Data : {{ $pengurus->total() }} <br />
    Data Per Halaman : {{ $pengurus->perPage() }} <br />

    {{ $pengurus->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Pengurus -->
    <div class="modal fade" id="modalPengurusTambah" tabindex="-1" role="dialog" aria-labelledby="modalPengurusTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengurusTambahLabel">Form Input Data Pengurus</h5>
                </div>
                <div class="modal-body">
                    <form name="formpengurustambah" id="formpengurustambah" action="/pengurus/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_pengurus" class="col-sm-4 col-form-label">Nama Pengurus</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" placeholder="Masukan Nama Pengurus">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pengurustambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection