<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\PesanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $data = ArtikelModel::all();
        $dd = $data->first();
        // dd($dd);

        return view('admin.artikel.index', compact('data'));
    }

    public function listPesan(){
        $data = PesanModel::all();

        return view('admin.pesan_management.pesan', compact('data'));
    }

    public function formBanner(){
        $data = BannerModel::where('id', '1')->first();
        return view('admin.banner.form_banner', compact('data'));
    }

    public function gantiBanner(Request $request, $id){
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = BannerModel::findOrFail($id);
        if($request->hasFile('banner')){

            //hapus banner (opsional)
            if($data->banner){
             Storage::disk('public')->delete("photos/{$data->banner}");
            }

            //mengupload gambar baru
            $picture = $request->file('banner');
            $hashName = $picture->hashName();

            Storage::disk('public')->put("photos/{$hashName}", file_get_contents($picture));
            $data->banner = $hashName;
         }
        $data->save();


        return redirect()->route('adminIndex')->with('success', 'Oke, banner berhasil diganti');
    }

    public function loginAdmins(){
        return view('login');
    }

    public function formTambahArtikel(){
        return view('admin.artikel.form');
    }

    public function formTambahUser(){
        return view('admin.user_management.form_user');
    }

    public function prosesLoginAdmins(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('adminIndex')->with('success', 'Login successful!');
        }

        // Authentication failed...
        return redirect()->route('halaman_login')->withErrors('Login failed! Please check your credentials and try again.');
    }

    public function prosesLogoutAdmins(){
        Auth::logout();
        return redirect()->route('halaman_login')->with('success', 'Logout successful!');
    }




    public function prosesTambahArtikel(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required',
            'text' => 'required',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = new ArtikelModel();

        if($request->hasFile('foto')){

           //hapus foto (opsional)
           if($article->foto){
            Storage::disk('public')->delete("photos/{$article->foto}");
           }

           //mengupload gambar baru
           $picture = $request->file('foto');
           $hashName = $picture->hashName();

           Storage::disk('public')->put("photos/{$hashName}", file_get_contents($picture));
           $article->foto = $hashName;
        }


        $article->judul = $validatedData['judul'];
        $article->text = $validatedData['text'];
        $article->kategori = $validatedData['kategori'];

        $article->status = 1; // default status

        // Simpan artikel ke database
        $article->save();


        return redirect()->route('adminIndex')->with('success', 'Artikel Berhasil Ditambahkan..!!');
    }

    public function prosesTambahUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:5',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();


        return redirect()->route('adminIndex')->with('success', 'Ada user yang sudah ditambahkan');
    }

    public function formEditArtikel($id){
        $data = ArtikelModel::where('id', $id)->first();

        return view('admin.artikel.form_edit', compact('data'));
    }

    public function prosesEditArtikel(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = ArtikelModel::findOrFail($id);
        $data->judul = $validatedData['judul'];
        // $data->foto = $validatedData['foto'];

        if ($request->has('text')) {
            $data->text = $request->input('text');
        }

        // Simpan file ke storage dan dapatkan path-nya
        if($request->hasFile('foto')){
            //hapus foto (opsional)
            if($data->foto){
            Storage::disk('public')->delete("photos/{$data->foto}");
            }
            //mengupload gambar baru
            $picture = $request->file('foto');
            $hashName = $picture->hashName();
            Storage::disk('public')->put("photos/{$hashName}", file_get_contents($picture));
            $data->foto = $hashName;
        }

        if ($request->has('kategori')) {
            $data->kategori = $request->input('kategori');
        }


        $data->save();

        return redirect()->route('adminIndex')->with('success', 'Data Berhasil di Edit');
    }

    public function switch($id){
        $data = ArtikelModel::findOrFail($id);

        if ($data->status == '1') {
            $data->status = '2';
        } else if ($data->status == '2') {
            $data->status = '1';
        }

        $data->save();
        return redirect()->route('adminIndex');
    }

    public function prosesHapus($id){
        $data = ArtikelModel::findOrFail($id);
        $data->delete();
        return redirect()->route('adminIndex');
    }


}