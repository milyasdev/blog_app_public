<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = ArtikelModel::all();

        return view('admin.index', compact('data'));
    }

    public function formTambahArtikel(){
        return view('admin.form');
    }

    public function prosesTambahArtikel(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required',
            'text' => 'required',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
        }

        $article = new ArtikelModel();
        $article->judul = $validatedData['judul'];
        $article->text = $validatedData['text'];
        $article->kategori = $validatedData['kategori'];
        $article->foto = $imageName;
        $article->status = 1; // default status

        // Simpan artikel ke database
        $article->save();


        return redirect()->route('adminIndex');
    }


}