<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use App\Models\KomentarModel;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        $data = ArtikelModel::all();

        return view('master.index', compact('data'));
    }

    public function detail($id){
        $data = ArtikelModel::findOrFail($id);
        $komen = KomentarModel::where('id_artikel', $id)->get();
        // dd($komen);
        $comments = $data->comments;
        return view('master.detail', compact('data', 'komen', 'comments'));
    }

    public function prosesTambahArtikel(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'komentar' => 'required|string',
            'id_artikel' => 'required|integer|exists:db_artikel,id',
        ]);

        // Simpan data komentar ke dalam database
        KomentarModel::create([
            'id_artikel' => $request->id_artikel,
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
        ]);


        return redirect()->route('detail', $id)->with('success', 'Komentar berhasil ditambahkan!');
    }
}