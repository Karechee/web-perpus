@extends('index')
@section('title', 'Member')

@section('isihalaman')
    <h3><center>Daftar Member Perpustakaan Universitas Semarang</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMemberTambah"> 
        Tambah Data member 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Member</td>
                <td align="center">NIM</td>
                <td align="center">Nama Member</td>
                <td align="center">Prodi</td>
                <td align="center">email</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($member as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $member->firstItem() }}</td>
                    <td>{{$a->id_member}}</td>
                    <td>{{$a->nim}}</td>
                    <td>{{$a->nama_member}}</td>
                    <td>{{$a->prodi}}</td>
                    <td>{{$a->email}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalMemberEdit{{$a->id_member}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Member -->
                        <div class="modal fade" id="modalMemberEdit{{$a->id_member}}" tabindex="-1" role="dialog" aria-labelledby="modalMemberEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalMemberEditLabel">Form Edit Data Member</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formmemberedit" id="formmemberedit" action="/member/edit/{{ $a->id_member}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}

                
                                            <div class="form-group row">
                                                <label for="nama_member" class="col-sm-4 col-form-label">Nama Member</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_member" name="nama_member" value="{{ $a->nama_member}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $a->email}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="membertambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="member/hapus/{{$a->id_member}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $member->currentPage() }} <br />
    Jumlah Data : {{ $member->total() }} <br />
    Data Per Halaman : {{ $member->perPage() }} <br />

    {{ $member->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data member -->
    <div class="modal fade" id="modalMemberTambah" tabindex="-1" role="dialog" aria-labelledby="modalMemberTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMemberTambahLabel">Form Input Data Aggota</h5>
                </div>
                <div class="modal-body">
                    <form name="formmembertambah" id="formmembertambah" action="/member/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_member" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_member" class="col-sm-4 col-form-label">Nama Member</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Masukan Nama Member">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukan Prodi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="membertambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection