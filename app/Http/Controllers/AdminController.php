<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $data = ArtikelModel::all();

        return view('admin.index', compact('data'));
    }

    public function loginAdmins(){
        return view('login');
    }

    public function formTambahArtikel(){
        return view('admin.form');
    }

    public function formTambahUser(){
        return view('admin.form_user');
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


        return redirect()->route('adminIndex');
    }


}