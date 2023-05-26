<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\MemberModel;

class MemberController extends Controller
{
    //method untuk tampil data member
    public function membertampil()
    {
        $datamember = MemberModel::orderby('id_member', 'ASC')
        ->paginate(5);

        return view('halaman/view_member',['member'=>$datamember]);
    }

    //method untuk tambah data member
    public function membertambah(Request $request)
    {
        $this->validate($request, [
            'nama_member' => 'required',
            'email' => 'required'
        ]);

        MemberModel::create([
            'nama_member' => $request->nama_member,
            'email' => $request->email
        ]);

        return redirect('/member');
    }

     //method untuk hapus data member
     public function memberhapus($id_member)
     {
         $datamember=MemberModel::find($id_member);
         $datamember->delete();
 
         return redirect()->back();
     }

     //method untuk edit data member
    public function memberedit($id_member, Request $request)
    {
        $this->validate($request, [
            'nama_member' => 'required',
            'email' => 'required'
        ]);

        $id_member = MemberModel::find($id_member);
        $id_member->nama_member      = $request->nama_member;
        $id_member->email   = $request->email;

        $id_member->save();

        return redirect()->back();
    }
}