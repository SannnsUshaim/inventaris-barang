<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PembelianController extends Controller
{
    public function index() {
        $pembelian = Pembelian::join('barangs', 'barangs.id_barang', '=', 'pembelians.id_barang')
        ->select('pembelians.id','barangs.id_barang','barangs.nama_barang','barangs.jenis_barang','barangs.merek','pembelians.jumlah','pembelians.harga','pembelians.total')
        ->get();

        return view('pembelian.index', compact('pembelian'));
    }

    public function create() {
        $barang = Barang::all();
        return view("pembelian.create", compact("barang"));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_barang' => 'required',
            'jumlah' => 'required|integer',
        ],
        [
            'id_barang.required' => 'Pilih Barang terlebih dahulu',
            'jumlah.required' => 'Jumlah Barang wajib diisi',
            'jumlah.integer' => 'Jumlah Barang wajib berisi angka',
        ]
        );

        $barang = Barang::where('id_barang', $request->id_barang)->first();

        $pembelian = [
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'harga' => $barang->harga,
            'total' => $barang->harga * $request->jumlah,
        ];

        // menambahkan jumlah di table barang berdasarkan jumlah pembelian di table data_pembelian
        $barang = Barang::where('id_barang', $request['id_barang'])->first();
        if(Pembelian::create($pembelian)){
            if($request->id_barang === $barang->id_barang){
                $barang->update([
            'jumlah' => $barang->jumlah + $request->jumlah
        ]);
            }
            return redirect()->route('pembelian.index')->with('success', 'Data barang berhasil disimpan');
        }
    }

    public function edit(string $id) {
        $pembelian = Pembelian::join('barangs','barangs.id_barang','=','pembelians.id_barang')
        ->where('pembelians.id',$id)
        ->first();
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, string $id){
        $barang = Barang::where('id_barang',$request->id_barang)->first();
        $data = Pembelian::findOrFail($id);

        $barang->jumlah = $barang->jumlah - $data->jumlah;
        $barang->save();

        $this->validate($request,[
            'jumlah' => 'required|integer',
        ]);

        $data->update([
            'jumlah' => $request->jumlah,
            'total' => $barang->harga * $request->jumlah,
        ],[
            'jumlah.required' => 'Jumlah Barang wajib diisi',
            'jumlah.integer' => 'Jumlah Barang wajib berisi angka',
        ]);

        if($data->update()){
            $barang->jumlah = $barang->jumlah + $request->jumlah;
            if($barang->jumlah){
                $barang->save();
            return redirect()->route('pembelian.index')->with('success', 'Data berhasil diedit');
            }
        }
    }

    public function destroy(string $id) {
        $data = Pembelian::findOrFail($id);
        $barang = Barang::where('id_barang', $data->id_barang)->first();

        $barang->jumlah = $barang->jumlah - $data->jumlah;
        $barang->save();

        $hapus = $data->delete();
        if($hapus){
        return redirect()->route('pembelian.index')->with('success-delete','Data barang berhasil dihapus');
        }
        // $data_delete = $data->delete();
    }

}
