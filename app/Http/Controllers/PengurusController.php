<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Pengurus
use App\Models\PengurusModel;

class PengurusController extends Controller
{
    //method untuk tampil data Pengurus
    public function pengurustampil()
    {
        $datapengurus = PengurusModel::orderby('id_pengurus', 'ASC')
        ->paginate(5);

        return view('halaman/view_pengurus',['pengurus'=>$datapengurus]);
    }

    //method untuk tambah data pengurus
    public function pengurustambah(Request $request)
    {

        PengurusModel::create([
            'nama_pengurus' => $request->nama_pengurus,
            'email' => $request->email
        ]);

        return redirect('/pengurus');
    }

     //method untuk hapus data pengurus
     public function pengurushapus($id_pengurus)
     {
         $datapengurus=PengurusModel::find($id_pengurus);
         $datapengurus->delete();
 
         return redirect()->back();
     }

     //method untuk edit data pengurus
    public function pengurusedit($id_pengurus, Request $request)
    {
        $this->validate($request, [
            'nama_pengurus' => 'required',
            'email' => 'required'
        ]);

        $id_pengurus = PengurusModel::find($id_pengurus);
        $id_pengurus->nama_pengurus      = $request->nama_pengurus;
        $id_pengurus->email   = $request->email;

        $id_pengurus->save();

        return redirect()->back();
    }
}