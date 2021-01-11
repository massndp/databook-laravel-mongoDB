@extends('layouts.default')
@section('title','Data Buku')
@section('content')
    <div class="container d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Buku</h1>
    </div>
        <div class="card-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="databook_id">Judul Buku</label>
                        <select name="databook_id" class="form-control">
                            <option value="">Pilih Buku</option>
                            @foreach ($databook as $item)
                                <option value="{{$item->_id}}">
                                    {{$item->judul}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Upload Gambar</label><br>
                        <input type="file" name="photo" accept="image/*">
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