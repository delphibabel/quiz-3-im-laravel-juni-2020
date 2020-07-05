@extends('layouts.master')
@section('judul_halaman', 'List Artikel')
@section('content')
<div class="pt-3">
    <a href="{{ url('/artikel/create') }}" class="btn btn-primary mt-3">Buat Artikel</a>
    @if(\Session::has('success'))
    {{-- <div class="alert alert-success mt-3">
        <div>{{ Session::get('success') }}</div>
    </div> --}}
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'Cool'
            })
        </script>
    @endif
    @foreach($list_artikel as $artikel)
        <div class="card mt-3">
            <div class="card-body">
                <a href="{{url('artikel/') .'/'. $artikel->id}}"><h5 class="card-title">Judul: {{ $artikel->judul }}</h5></a>
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
    @endforeach
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
</div>
@endsection
