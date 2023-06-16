@extends('beranda')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profil</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
    <section id="setting profile">
        <div class="container p-2">
            <h3 class="fw-bold text-center" mb-3>Setting Profile</h3>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{$action}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <form action="">
                        <div class="mb-1">
                            <label for="form" class="form-label">nis</label>
                            <input type="text" name="nis" id="nis" class="form-control" value="{{ $nis }} " placeholder="masukan nis">
                        </div>
                        <div class="mb-1">
                            <label for="form" class="form-label">nama lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama }} " placeholder="masukan nama">
                        </div>
                        <div class="mb-1">
                            <label for="form" class="form-label">
                                jenis kelamin
                            </label>
                            <select name="jk" id="jk" class="form-select">
                                <option value="">jenis kelamin</option>
                                <option value="L"{{ $jk=='L'?'selected':'' }}>laki laki</option>
                                <option value="P"{{ $jk=='p'?'selected':'' }}>perempuan</option>
                                
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="from" class="from-label">tempat tanggal lahir</label>
                            <input type="text" name="ttl" id="ttl" class="form-control" value="{{ $ttl }}" placeholder="masukan tannggal lahir anda">
                        </div>
                        <div class="mb-1">
                            <label for="from" class="from-label">pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value="{{ $pendidikan }}" placeholder="masukan pendidikan anda">

                        </div>
                        <div class="mb-1">
                            <label for="form" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $alamat }}" placeholder="masukan alamat">
                        </div>
                        <div class="mb-1">
                            <label for="form" class="from-label">Foto</label>
                            <img src="/storage/{{ $foto }}" alt="" srcset="" width="1000" height="">
                            <input type="file" name="foto" id="foto" class="form-control" >
                        </div>
                        <div class="mb-1">
                            <label for="form" class="form-label">About</label>
                            <input class="form-control" type="text" name="about" id="about" value="{{$about}}">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="simpan" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                    </form>
                </div>

            </div>
        </div>
    </section>
    
    
        
    
</body>
</html>
@endsection 