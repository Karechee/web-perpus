<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BukuModel;

class BukuController extends Controller
{
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kd_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }

    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        BukuModel::create([
            'kd_buku' => $request->kd_buku,
            'judul' => $request->judul,
            'author' => $request->author,
            'genre' => $request->genre
        ]);

        return redirect('/buku');
    }

     //method untuk hapus data buku
     public function bukuhapus($id_buku)
     {
         $databuku=BukuModel::find($id_buku);
         $databuku->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function bukuedit($id_buku, Request $request)
    {
        $this->validate($request, [
            'kd_buku' => 'required',
            'judul' => 'required',
            'author' => 'required',
            'genre' => 'required'
        ]);

        $id_buku = BukuModel::find($id_buku);
        $id_buku->kd_buku   = $request->kd_buku;
        $id_buku->judul      = $request->judul;
        $id_buku->author  = $request->author;
        $id_buku->genre   = $request->genre;

        $id_buku->save();

        return redirect()->back();
    }
}