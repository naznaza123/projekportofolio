<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
class profilController extends Controller
{
    function show(){
        $profil=profil::first();
        if ($profil){
            $data=[
                'nis'=>$profil->nis,
                'nama'=>$profil->nama,
                'jk'=>$profil->jk,
                'ttl'=>$profil->ttl,
                'pendidikan'=>$profil->pendidikan,
                'alamat'=>$profil->alamat,
                'foto'=>$profil->foto,
                'about'=>$profil->about,
                'action'=>'/profil/update/',$profil->nis
            
            ];
            return view('profil',$data);
        }else{
            $data=[
                'nis'=>'',
                'nama'=>'',
                'jk'=>'',
                'ttl'=>'',
                'pendidikan'=>'',
                'alamat'=>'',
                'foto'=>'',
                'about'=>'',
                'action'=>'profil/create/'
            ];
            return view('profil',$data);
        }
    }
    function create(Request $request){
        // $validate=$this->validate($request,[
        //         'nis'=>'required|numeric',
        //         'nama'=>'required|string',
        //         'jk'=>'required|string',
        //         'ttl'=>'string',
        //         'pendidikan'=>'required|string',
        //         'alamat'=>'required|string',
        //         'foto'=>'re  quired|mimes:jpg,png,jpeg',
        //         'about'=>'required|string',
                
        // ]);
        // $namafile=$request->nis.".".$request->file('foto')->getClientOriginalExtension;
        // $validate['foto']=$request->file('foto')->StoreAs('foto',$namafile);
        // profil::create($validate);
        profil::create([
            'nis'=>$request->nis,
            'nama'=>$request->nama, 
            'jk'=>$request->jk,
            'ttl'=>$request->ttl,
            'pendidikan'=>$request->pendidikan,
            'alamat'=>$request->alamat,
            'foto'=>$request->file('foto')->store('foto'),
            'about'=>$request->about
        ]);
        
        return redirect('profil');



    }
    function hapus ($id){
        profil::where('nis',$id)->delete();
        return redirect('profil');

    }
    function edit($id){
        $data['profil']= profil::find($id);
        $data['action']= url('profil/update')."/".$data['profil']->nis;
        $data['tombol']="Update";
        return view ('profil',$data);
    }
    function update(Request $request)  
    {
        $data = profil::where('nis',$request->nis)->first();
        if($request->foto==''){
            $foto = $data->foto;
        }else{
            $foto=$request->file('foto')->store('foto');
        }
        profil::where('nis',$request->id)->update([
            'nis'=>$request->nis,
            'nama'=>$request->nama, 
            'jk'=>$request->jk,
            'ttl'=>$request->ttl,
            'pendidikan'=>$request->pendidikan,
            'alamat'=>$request->alamat,
            'foto'=>$foto,
            'about'=>$request->about
                
        ]);
        return redirect('profil');
    }   
    // function search(Request $request){
    //     $data['murid']= profil::where('nis',$request->cari)
    //     ->orWhere('nama','like',$request->cari."%")
    //     ->orWhere('jk',$request->cari)
    //     ->paginate();

    //     $data['cari']=$request->cari;
    //     return view('profil',$data);
    // }
}
?>
