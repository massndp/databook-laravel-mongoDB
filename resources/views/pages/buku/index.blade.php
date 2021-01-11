@extends('layouts.default')
@section('title','Data Buku')
@section('content')
    <div class="container d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
        <a href="{{route('buku.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Buku</a>
    </div>

        <div class="card-shadow">
            <div class="card-body">
                @if (session('sukses'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-circle-check"></i>
                        {{session('sukses')}}
                    </div>
                @endif
                @if (session('hapus'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-check"></i>
                        {{session('hapus')}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->penulis}}</td>
                                    <td>{{$item->penerbit}}</td>
                                    <td>{{$item->tahun_terbit}}</td>
                                    <td>
                                        <a href="" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('buku.edit', $item->id)}}" class="btn btn-warning">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('buku.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <?php $no++ ?>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Buku Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection