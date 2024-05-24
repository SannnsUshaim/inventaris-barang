<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    /**
     * index
     * @return View
     */
    public function index():View {
        $barang = Barang::latest()->paginate(10);
        return view("barang.index", compact("barang"));
    }

    /**
     * create
     * @return View
    */ 
    public function create() {
        return view("barang.create");
    }

    /**
     * stor
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
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
        $data = Barang::findOrFail($id);
        return view('barang.edit', compact('data'));
    }

    /**
    * update
    *
    * @param mixed $request
    * @param mixed $id
    * @return RedirectResponse
    */
    public function update(Request $request, $id): RedirectResponse {
        $this->validate($request, [
            'nama_barang' => 'required|min:2',
            'jenis_barang' => 'required|min:2',
            'merek' => 'required|min:2',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $data = Barang::findOrFail($id);

        $data->update($request->only(['nama_barang', 'jenis_barang', 'merek', 'jumlah', 'harga']));

        return redirect()->route('barang.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * @param mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse {
        $data = Barang::findOrFail($id);

        $data->delete();

        return redirect()->route('barang.index')->with('success','Data Berhasil Dihapus!');
    }
}
