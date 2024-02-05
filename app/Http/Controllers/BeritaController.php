<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Frontpage;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Normalizer\SlugNormalizer;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    function __construct()
    {
        $this->user = new User();
        $this->berita = new Berita();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $dataBerita = Berita::all();
        $data = $this->user->getUser($id);
        return view('admin.berita.index', $data = [
            'menu' => 'Berita & Acara',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataBerita' => $dataBerita
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        return view('admin.berita.create', $data = [
            'menu' => 'Berita & Acara',
            'data' => $data,
            'peran' => auth()->user()->peran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => ['required', 'unique:berita',],
            'konten' => ['required'],
            'gambar' => 'required|file|mimes:jpg,png,jpeg|max:10240',
            'kategori' => ['required']
        ]);
        $validatedData['slug'] = Str::slug($request->judul, '-');
        $validatedData['slug'] = Str::lower($validatedData['slug']);
        $validatedData['potongan_berita'] = Str::limit(strip_tags($validatedData['konten']), 100);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['rilis'] = now();
        $validatedData['gambar'] = $request->file('gambar')->store('dokumentasi-berita');

        Berita::create($validatedData);
        $request->session()->flash('sukses', 'Berita berhasil ditambahkan');
        return redirect()->route('berita.index');
    }

    
    public function edit($id)
    {
        $berita = Berita::find($id);
        $data = $this->user->getUser($id);
        return view('admin.berita.edit', [
            'menu' => 'Berita & Acara',
            'data' => $data,
            'berita' => $berita,
            'peran' => auth()->user()->peran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->file('gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $data['gambar']=$request->file('gambar')->store('dokumentasi-berita');
        }
        $dataGambar = Berita::findOrFail($id);
        $dataGambar->update($data);
        return redirect()->route('berita.index')->with('sukses', 'Data Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBerita = Berita::findOrFail($id);
        $file = public_path('storage/').$dataBerita->gambar;
        if(file_exists($file)){
            @unlink($file);
        }
        $dataBerita->delete();
        return redirect()->route('berita.index')->with('sukses','Berita berhasil dihapus');
    }

    public function dataTables()
    {
        $model = Berita::query();
        return DataTables::eloquent($model)
                ->addColumn('action', function(Berita $berita) {
                    return '<a href="/admin/detailberita/'.$berita->slug.'"><span class="badge badge-info">Info</span></a>';
                })
                ->editColumn('rilis', function (Berita $berita) {
                    return date('d F Y', strtotime($berita->rilis)); // human readable format
                })
                ->toJson(); 
    }


    public function detailBeritaAdmin($slug){
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $berita = Berita::where('slug',$slug)->get()->first();
        return view('admin.berita.show', $data = [
            'menu' => 'Berita & Acara',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'berita' => $berita
        ]);
    }


    //untuk frontpage

    public function detailBerita($slug)
    {
        $dataBerita = $this->berita->getBeritaWithSlug($slug);
        $dataFrontpage = Frontpage::all();
        $dataFrontpage = $dataFrontpage->last();
        return view('detailberita', $data = [
            'dataBerita' => $dataBerita,
            'data' => $dataFrontpage,
        ]);
    }

    public function kumpulanBerita()
    {
        $dataBerita = Berita::all();
        $dataFrontpage = Frontpage::all();
        $dataFrontpage = $dataFrontpage->last();
        return view('kumpulanberita', $data = [
            'data' => $dataFrontpage,
            'dataBerita' => $dataBerita
        ]);
    }
}
