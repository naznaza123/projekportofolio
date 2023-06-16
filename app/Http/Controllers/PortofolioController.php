<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portofolio;

class PortofolioController extends Controller
{
    //
    function show(){
        $data['portofolio']=Portofolio::paginate(2);
        $data['cari']="";
        return view('portofolio',$data);

    }
    function add(){
        $data=[
            'action'=>url('portofolio/create'),
            'tombol'=>'simpan',
            'portofolio'=>(object)[

                'nama_portofolio'=>'',
                'kategori'=>'',
                'deskripsi'=>'',
                'gambar'=>''

            ]

            
            ];
            return view('form_portofolio',$data);
    }
    function create(Request $request){
        $validate= $this->validate($request,[
            'nama_portofolio'=>'required|string',
            'kategori'=>'required|string|max:30',
            'deskripsi'=>'required|string',
            'gambar'=>'required|mimes:jpg,png,jpeg'
        ]);
        $namafile=$request->kategori.".".$request->file('gambar')->getClientOriginalExtension();
        $validate['gambar']=$request->file('gambar')->storeAs('gambar',$namafile);
        Portofolio::create($validate);
        return redirect('portofolio');
    }
    function hapus($id){
        Portofolio::where('id',$id)->delete();
        return redirect('portofolio');
    }
        function edit($id){
        $data['portofolio']=Portofolio::find($id);
        $data['action']= url('portofolio/update').'/'.$data['portofolio']->id;
        $data['tombol']="Update";
        return view('form_portofolio',$data);
    }
    function update(Request $request){
        $namafile=$request->kategori.".".$request->file('gambar')->getClientOriginalExtension();
        portofolio::where('id',$request->id)->update([
            'nama_portofolio'=>$request->nama_portofolio,
            'kategori'=>$request->kategori,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>$request->file('gambar')->storeAs('gambar',$namafile),
        ]);
        return redirect('portofolio');
    }
    function search(Request $request){
        $data['portofolio']=Portofolio::where('id',$request->cari)
        ->orWhere('nama_portofolio','like',$request->cari."&")
        ->orWhere('kategori',$request->cari)
        ->paginate();
        $data['cari']=$request->cari;
        return view('portofolio',$data);
    }

    
}
