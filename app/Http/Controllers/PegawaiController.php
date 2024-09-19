<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //function menampilkan Halaman Pegawai
    public function indexPegawai($role,$nama){
        $data= user::all();
        return view('pegawai.index',['role'=>$role,'nama'=>$nama ,'data'=>$data]);
    }

    //function menampilkan form add
    public function addPegawai($role,$nama){
        return view('pegawai.add',['role'=>$role,'nama'=>$nama]);
    }

    //function menampilkan form edit
    public function editPegawai($id){
        $data = User::find($id);
        return view('pegawai/edit', compact('data', 'id'));
    }

    //function untuk Create pada database users
    public function createPegawai(Request $request, $role, $nama) {

        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'role' => 'required|in:admin,kasir',
        ]);
        
        $newdata = new User();
    
        $newdata->username = $request->username;
        $newdata->password = bcrypt($request->password);
        $newdata->name = $request->nama;  //
        $newdata->role = $request->role;
    
        $newdata->save();
        
        return redirect('/indexPegawai/'.$role.'/'.$nama);
    }
    
    


    //function untuk Update pada database users
    public function updatePegawai(Request $request, $id, $role, $nama){
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'required',
            'name' => 'required',
            'role' => 'required|in:admin,kasir',
        ]);
    
        $data = User::find($id);
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->name = $request->name;
        $data->role = $request->role;
    
        $data->save();
        return redirect('/indexPegawai/'.$role.'/'.$nama);
        }
    //function untuk Dalate database
    public function delete($role,$nama,$id)
    {
        $dataDelete = User::find($id);
        if ($dataDelete) {
            $dataDelete->delete();
        }
        return redirect('indexPegawai/' . $role . '/' . $nama)->with('success', 'Produk berhasil dihapus');

    }
}
