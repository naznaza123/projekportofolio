@extends('beranda')
@section('content')
@if ($errors->any())


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif 
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-6">
                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">nama portofolio</label>
                            <td> 
                                <input type="text " name="nama_portofolio" id="nama_portofolio" class="form-control" value="{{ $portofolio->nama_portofolio }}" placeholder="Masukan nama portofolio">
                            </td>
                        </div>
                        <div class="">
                            <label for="" class="form-label">kategori</label>
                            <td>
                                <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $portofolio->kategori }}" placeholder="masukan kategori">
                            </td>
                        </div>
                        <div class="">
                            <label for="" class="form-label">deskripsi</label>
                            <td>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $portofolio->deskripsi }}" placeholder="masukan deskripsi">
                            </td>
                        </div>
                        <div class="">
                            <label for="" class="form-label">gambar</label>
                            <td>
                                <input type="file" name="gambar" id="gambar"  class="form-control " >
                            </td>
                        </div>
                        <div class="my-3">
                            <input type="submit" value="{{ $tombol }}" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    @endsection
</body>
</html>