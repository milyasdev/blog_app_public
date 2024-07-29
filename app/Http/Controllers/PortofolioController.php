<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListPortofolio;

class PortofolioController extends Controller
{
    public function listPortofolio(){
        $portofolio = ListPortofolio::all();

        return view('admin.portofolio.list_porto', compact('portofolio'));
    }

    public function prosesSimpanPorto(Request $request){
        $request->validate([
            'nama' => 'required',
            'url' => 'required',
        ]);

        // Simpan data ke model ListPortofolio
        $listPortofolio = new ListPortofolio();
        $listPortofolio->nama = $request->input('nama');
        $listPortofolio->url = $request->input('url');
        $listPortofolio->save();

        return redirect()->route('list_portofolio');
    }

    public function hapusPorto($id){
        $listPortofolio = ListPortofolio::find($id);

        if ($listPortofolio) {

            $listPortofolio->delete();


            return redirect()->route('list_portofolio')->with('success', 'Data berhasil dihapus.');
        } else {

            return redirect()->route('list_portofolio')->with('error', 'Data tidak ditemukan.');
        }
    }
}