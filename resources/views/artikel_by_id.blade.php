@extends('layouts.master')
@section('judul_halaman', $artikel->judul)
@section('content')
<div class="pt-3">
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <div>{{ Session::get('success') }}</div>
    </div>
    @endif
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Judul: {{ $artikel->judul }}</h5>
                <h6 class="card-subtitle mb-2 text-muted text-sm">slug: {{ $artikel->slug }}</h6>
                <p class="card-text">{{ $artikel->isi }}</p>
                @php
                    $tag = $artikel->tag;
                    $arr_tag = explode (",",$tag);
                    foreach ($arr_tag as $kl) {
                    echo '<span class="btn btn-success btn-sm mr-1">'. $kl .'</span>';
                    }
                @endphp
            </div>            
        </div>
        <a href="{{url('artikel/') .'/'. $artikel->id}}">
        <div class="actionbutton pt-3">
            <div class="row">
                <div class="col-2">
                    <a href="{{url('artikel/') .'/'. $artikel->id . '/edit'}}" class="btn btn-primary mb-2">Edit Artikel</a>
                </div>
                <div class="col-1">
                    <form action="{{ url('/artikel', ['id' => $artikel->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Hapus Artikel" />
                    </form>    
                </div>
            </div>
        </div>
        

</div>
@endsection