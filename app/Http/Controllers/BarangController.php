<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index():View {
        $barang = Barang::latest()->paginate(10);
        return view("barang.index", compact("barang"));
    }

    public function create() {
        return view("barang.create");
    }

    public function store(Request $request):RedirectResponse {
        $this->validate($request, [
            'id_barang' => 'required | min:2',
            'nama_barang' => 'required | min:2',
            'jenis_barang' => 'required | min:2',
            'merek' => 'required | min:2',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success','Data Berhasil Ditambah!');
    }

    public function edit(string $id):View {
        $data = Barang::find($id);
        return view('barang.edit', compact('data'));
    }

    public function update(Request $request, string $id): RedirectResponse {
        $this->validate($request, [
            'nama_barang' => 'required | min:2',
            'jenis_barang' => 'required | min:2',
            'merek'=> 'required | min:2',
            'jumlah'=> 'required',
            'harga'=> 'required',
        ]);

        return redirect()->route('barang.index')->with('success','Data Behasil Diubah!');
    }

    public function destroy($id_barang): RedirectResponse {
        $data = Barang::findOrFail($id_barang);

        $data->delete();

        return redirect()->route('barang.index')->with('success','Data Berhasil Dihapus!');
    }
}
