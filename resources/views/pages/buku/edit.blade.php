@extends('layouts.default')
@section('title','Data Buku')
@section('content')
    <div class="container d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Buku</h1>
    </div>


        <div class="card-shadow">
            <div class="card-body">
                <form action="{{route('buku.update',$item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode Buku</label>
                        <input type="text" name="kode" class="form-control @error('kode') is_invalid @enderror" value="{{$item->kode}}" required> @error('kode') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input type="text" name="judul" class="form-control @error('judul') is_invalid @enderror" value="{{$item->judul}}" required> @error('judul') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis Buku</label>
                        <input type="text" name="penulis" class="form-control @error('penulis') is_invalid @enderror" value="{{$item->penulis}}" required> @error('penulis') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit Buku</label>
                        <input type="text" name="penerbit" class="form-control @error('penerbit') is_invalid @enderror" value="{{$item->penerbit}}" required> @error('penerbit') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="date" name="tahun_terbit" class="form-control @error('tahun_terbit') is_invalid @enderror" value="{{$item->tahun_terbit}}" required> @error('tahun_terbit') <div class="text-muted">{{$message}}</div> @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <button class="btn btn-danger" type="reset">
                        <i class="fas fa-recycle"></i> Reset
                    </button>
                </form>
            </div>
        </div>
@endsection