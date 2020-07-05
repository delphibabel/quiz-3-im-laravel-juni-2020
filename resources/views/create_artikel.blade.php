@extends('layouts.master')
@section('judul_halaman', 'Buat Artikel')
@section('content')
<div class="pt-3">
    <form action="{{ url('/artikel') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" required>
        </div>
        <div class="form-group">
            <label for="judul">Tag (Pisahkan dengan koma ',')</label>
            <input type="text" class="form-control" name="tag" required>
        </div>
        <div class="form-group">
            <label for="isiArtikel">Isi Artikel</label>
            <textarea class="form-control" id="isiArtikel" name="isiArtikel" rows="5"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Tambah Artikel">
    </form>
</div>

@endsection