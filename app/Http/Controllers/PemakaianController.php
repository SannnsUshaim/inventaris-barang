<?php

namespace App\Http\Controllers;
use App\Models\Pemakaian;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    public function index()
    {
        // mengambil data barang yang memiliki stok saja
        $barang = Barang::where('jumlah','>',0)->get();
        $pemakaian = Pemakaian::join('barangs', 'barangs.id_barang', '=', 'pemakaians.id_barang')
        ->join('users', 'users.id_user', '=', 'pemakaians.pemakai')
        ->select('pemakaians.*', 'barangs.id_barang', 'barangs.nama_barang', 'barangs.jenis_barang', 'barangs.merek', 'barangs.harga', 'users.id_user', 'users.name')
        ->get();

        return view('pemakaian.index', compact('pemakaian','barang'));
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {

        $user = User::all();
        // memakai jika stok di data barang ada atau lebih dari 0
        $barang = Barang::all()->where('jumlah','>',0);
        return view('pemakaian.create', compact('user','barang'));
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_barang' => 'required',
            'pemakai' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required',
        ],
        [
            'id_barang.required' => 'Data barang wajib Diisi',
            'pemakai.required' => 'Nama pemakai wajib diisi',
            'jumlah.required' => 'Data jumlah barang wajib diisi',
            'jumlah.integer' => 'Data jumlah barang harus berisi angka',
            'jumlah.min' => 'Data jumlah barang minimal :min',
            'tanggal.required' => 'Tanggal pemakaian wajib diisi',
        ]
        );
        $data = [
            'id_barang' => $request->id_barang,
            'pemakai' => $request->pemakai,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ];

        $barang = Barang::where('id_barang', $data['id_barang'])->first();
        $jumlah_barang = $barang->jumlah;

        // mengambil data barang yang memiliki stok saja
        if($data['jumlah'] <= $barang->jumlah){
        $pemakaian = Pemakaian::create($data);
        if($pemakaian){
        $barang->update([
        'jumlah' => $barang->jumlah - $data['jumlah']
        ]);
        return redirect()->route('pemakaian.index')->with('success', 'Data berhasil ditambahkan');
        }
        // jika request pemakaian melebihi stok di data barang maka dia redirect gagal
        } else{
        return redirect()->route('pemakaian.create')->with(['jumlah_barang' => $jumlah_barang, 'fail-pemakaian' => 'Data
        gagal ditambahkan']);
        }

    }

        /**
        * Display the specified resource.
        */
        public function show(Pemakaian $Pemakaian)
        {
        //
        }

        /**
        * Show the form for editing the specified resource.
        */
    public function edit(string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $user = User::select('id', 'name','role')->where('id', $data->pemakai)->first();
        $user_all = User::select('id', 'name','role')->whereNot('id', $data->pemakai)->whereNot('role',
        'petugas')->get();
        $barang = Barang::select('id_barang','nama_barang','merek','jumlah')->where('id_barang',
        $data->id_barang)->first();

        return view('pemakaian.edit', compact('data','user',''));
    }

        /**
        * Update the specified resource in storage.
        */
    public function update(Request $request, string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $barang = Barang::where('id_barang', $data->id_barang)->first();

        $barang->update([
        'jumlah' => $barang->jumlah + $data->jumlah,
        ]);


        $this->validate($request,[
        'id_barang' => 'required',
        'pemakai' => 'required',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'required',
        ],
        [
        'id_barang.required' => 'Data barang wajib Diisi',
        'pemakai.required' => 'Nama pemakai wajib diisi',
        'jumlah.required' => 'Data jumlah barang wajib diisi',
        'jumlah.integer' => 'Data jumlah barang harus berisi angka',
        'jumlah.min' => 'Data jumlah barang minimal :min',
        'tanggal.required' => 'Tanggal pemakaian wajib diisi',
        ]
        );

        // Menambahkan jumlah barang berdasarkan permintaan yang baru
        $barang->update([
        'jumlah' => $barang->jumlah - $request->jumlah,
        ]);

        $data->update([
        'id_barang' => $request->id_barang,
        'pemakai' => $request->pemakai,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('pemakaian.index')->with('success-update', 'Data barang '.$barang->nama_barang.'
        berhasil diedit');

    }

        /**
        * Remove the specified resource from storage.
        */
    public function destroy(string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $barang = Barang::where('id_barang', $data->id_barang)->first();

        $barang->jumlah = $barang->jumlah + $data->jumlah;
        if($barang->jumlah){
            $barang->save();
            $data->delete();
            return redirect()->route('pemakaian.index')->with('success-delete', 'Data barang '.$barang->nama_barang.'
            berhasil dihapus!');
        } else{
            return redirect()->route('pemakaian.index')->with('fail', 'Data barang gagal dihapus!');
        }
    }

    // public function download(){
    //     return Excel::download(new PemakaianExport, 'data_pemakaian.xlsx');
    // }
}
