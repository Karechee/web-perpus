@extends('index')
@section('title', 'Peminjaman')

@section('isihalaman')
    <h3><center>Data Peminjaman Buku</center><h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPinjamTambah"> 
        Tambah Data Peminjaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
                <tr>
                    <td scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td>{{$p->petugas->nama_petugas}}</td>
                    <td>{{$p->anggota->nama_anggota}}</td>
                    <td>{{$p->buku->judul}}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali }}</td>
                    <td>{{ $p->status }}</td>
                    <td> <!-- Kolom Aksi -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit{{$p->id_pinjam}}"> 
                            Edit
                        </button>

                        <a href="pinjam/hapus/{{$p->id_pinjam}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->

<!-- Awal Modal tambah data Peminjaman -->
<div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
            </div>
            <div class="modal-body">

                <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                <option></option>
                                @foreach($petugas as $pt)
                                    <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                <option></option>
                                @foreach($anggota as $a)
                                    <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                <option></option>
                                @foreach($buku as $bk)
                                    <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_pinjam" class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_kembali" class="col-sm-4 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="status" name="status" required>
                                <option value="meminjam">Meminjam</option>
                                <option value="sudah kembali">Sudah Kembali</option>
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal tambah data Peminjaman -->

@endsection
