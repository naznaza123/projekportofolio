@extends('beranda')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

<button class="btn btn-primary">
    <a href="{{ url('portofolio/add') }}" class="btn btn-primary">tambah portofolio</a>

</button>
<table class="table table-hover table-bordered table-striped" border="1">
    <tr>
        <th>No</th>
        <th>Nama POrtofolio</th>
        <th>kategori</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    @foreach ($portofolio as $key=>$item)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $item->nama_portofolio }}</td>
        <td>{{ $item->kategori }}</td>
        
        <td>{{ $item->deskripsi }}</td>
        <td>
            <img src="/storage/{{ $item->gambar }}" alt="" class="w-50" srcset="">
        </td>
        <td>
            <a href="portofolio/hapus/{{ $item->id }}" onclick="return window.confirm('hapus data ini')" class="btn btn-danger">Hapus</a>
            <a href="portofolio/edit/{{ $item->id }}" class="btn btn-primary">edit</a>
        </td>
    </tr>
        
    @endforeach
    
</table>
<table>
    total portofolio :{{ $portofolio->count() }} <br>
    total perhalaman :{{ $portofolio->perpage() }}
    {{ $portofolio->links() }}
    @endsection
</table>