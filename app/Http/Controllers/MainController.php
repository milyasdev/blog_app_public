<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\KomentarModel;
use App\Models\PesanModel;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        $data = ArtikelModel::all();
        $banner = BannerModel::where('id', '1')->first();
        // dd($banner);
        return view('master.index', compact('data', 'banner'));
    }

    public function detail($id){
        $data = ArtikelModel::findOrFail($id);
        $blog = ArtikelModel::where('kategori', 'blog')->get();
        $teknologi = ArtikelModel::where('kategori', 'teknologi')->get();
        $tutorial = ArtikelModel::where('kategori', 'tutorial')->get();
        // dd($blog);
        $data->increment('view_count');
        $komen = KomentarModel::where('id_artikel', $id)->get();
        // dd($komen);
        $comments = $data->comments;
        return view('master.detail', compact('data', 'komen', 'comments', 'blog', 'teknologi', 'tutorial'));
    }

    public function prosesTambahArtikel(Request $request, $id){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'komentar' => 'required|string',
            'id_artikel' => 'required|integer|exists:db_artikel,id',
        ]);

        $sanitizedData = [
            'nama' => strip_tags($validatedData['nama']),
            'email' => strip_tags($validatedData['email']),
            'komentar' => strip_tags($validatedData['komentar']),
            'id_artikel' => strip_tags($validatedData['id_artikel']),
        ];
        // Simpan data komentar ke dalam database
        KomentarModel::create($sanitizedData);


        return redirect()->route('detail', $id)->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function formContact(){
        return view('contact_form');
    }

    public function prosesContact(Request $request){
        $validatedData = $request->validate([
            'nama_pengirim' => 'required|max:255',
            'email_pengirim' => 'required|email|max:255',
            'wa_pengirim' => 'required',
            'pesan_pengirim' => 'required|max:400',
            'captcha' => 'required',
        ]);

        $sanitizedData = [
            'nama_pengirim' => strip_tags($validatedData['nama_pengirim']),
            'email_pengirim' => strip_tags($validatedData['email_pengirim']),
            'wa_pengirim' => strip_tags($validatedData['wa_pengirim']),
            'pesan_pengirim' => strip_tags($validatedData['pesan_pengirim']),
        ];

        // Simpan ke database
        PesanModel::create($sanitizedData);
        return redirect()->route('home');
    }

    public function reload(){
        return response()->json(['captcha'=>captcha_img()]);
    }
}