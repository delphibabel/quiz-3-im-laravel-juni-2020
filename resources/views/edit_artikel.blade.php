@extends('layouts.master')
@section('judul_halaman', 'Buat Artikel')
@section('content')
<div class="pt-3">
    <form action="{{url('artikel/') .'/'. $artikel->id}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" value="{{$artikel->judul}}" required>
        </div>
        <div class="form-group">
            <label for="judul">Tag (Pisahkan dengan koma ',')</label>
            <input type="text" class="form-control" name="tag" value="{{$artikel->tag}}" required>
        </div>
        <div class="form-group">
            <label for="isiArtikel">Isi Artikel</label>
            <textarea class="form-control" id="isiArtikel" name="isiArtikel" rows="5">{{$artikel->isi}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Ubah Artikel">
    </form>
</div>

@endsection