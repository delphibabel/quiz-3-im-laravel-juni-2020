<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtikelModel;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class ArtikelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('auth')->with('alert', 'Anda harus login untuk mengakses halaman ini');
        } else {
            return view('dashboard');
        }
    }
    public function all_artikel()
    {
        $artikel = ArtikelModel::all();
        return view('daftar_artikel', ['list_artikel' => $artikel]);
    }
    public function create()
    {
        return view('create_artikel');
    }
    public function show($id)
    {
        $artikel = ArtikelModel::where('id', $id)->first();
        return view('artikel_by_id', ['artikel' => $artikel]);
    }

    public function edit($id)
    {
        $artikel = ArtikelModel::where('id', $id)->first();
        return view('edit_artikel', ['artikel' => $artikel]);
    }
    public function store(Request $request)
    {
        $user_id = Session::get('user_id');
        $slug = str_replace(" ", "-", strtolower($request->judul));
        $data =  new ArtikelModel();
        $data->judul = ucwords($request->judul);
        $data->isi = ucfirst($request->isiArtikel);
        $data->tag = $request->tag;
        $data->slug = $slug;
        $data->user_id = $user_id;
        $data->save();
        return redirect('artikel')->with('success', 'Artikel berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $slug = str_replace(" ", "-", strtolower($request->judul));
        $artikel = ArtikelModel::find($id);
        $artikel->slug = $slug;
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isiArtikel;
        $artikel->tag = $request->tag;
        $artikel->save();
        return redirect('artikel' . '/' . $id)->with('success', 'Artikel berhasil diubah');
    }

    public function destroy(ArtikelModel $id)
    {
        $id->delete();
        return redirect('artikel')->with('success', 'Artikel berhasil dihapus');
    }
}
