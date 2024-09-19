<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    public function produk($role,$nama){
        $data= produk::all();
        return view('produk',['role'=>$role,'nama'=>$nama ,'data'=>$data]);
     
    }

    public function add($role,$nama){
        return view('add',['role'=>$role,'nama'=>$nama]);
    }

    public function addProduk(Request $request, $role, $nama)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
        ]);
        $newdata = new produk();
        $newdata->nama_produk = $request->nama_produk;
        $newdata->stock = $request->stock;
        $newdata->harga = $request->harga;

        $newdata->save();

        // Redirect to the produk listing page with role and nama parameters
        return redirect('produk/' . $role . '/' . $nama);
    }

    public function edit($role, $nama, $id)
    {
        $data = produk::findOrFail($id);
        return view('edit', ['role' => $role, 'nama' => $nama, 'data' => $data]);
    }

    public function editProduk(Request $request, $role, $nama, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stock' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $data = produk::findOrFail($id);
        $data->nama_produk = $request->nama_produk;
        $data->stock = $request->stock;
        $data->harga = $request->harga;

        $data->save();

        // Redirect to the produk listing page with role and nama parameters
        return redirect('produk/' . $role . '/' . $nama);
    }

    public function delete($role,$nama,$id)
    {
        $dataDelete = produk::find($id);
        if ($dataDelete) {
            $dataDelete->delete();
        }
        return redirect('produk/' . $role . '/' . $nama)->with('success', 'Produk berhasil dihapus');
    }
    
    
}