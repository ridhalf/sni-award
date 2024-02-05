<?php

namespace App\Http\Controllers;

use App\Models\JadwalAcara;
use App\Models\User;
use Illuminate\Http\Request;

class PenjadwalanAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $id = auth()->user()->id;
        $data = $this->user->getUser($id);
        $dataEvent = JadwalAcara::all();
        return view('admin.penjadwalanacara.index', $data = [
            'menu' => 'Penjadwalan Acara',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataEvent' => $dataEvent
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
        return view('admin.penjadwalanacara.create', $data = [
            'menu' => 'Penjadwalan Acara',
            'data' => $data,
            'peran' => auth()->user()->peran,
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
            'judul' => ['required'],
            'mulai' => ['required'],
            'hingga' => ['required'],
            'kategori' => ['required'],

        ]);
        $validatedData['link_meet'] = $request->link_meet;
        $validatedData['user_id'] = auth()->user()->id;
        $ret_val = JadwalAcara::create($validatedData);
        $request->session()->flash('sukses','Acara berhasil ditambahkan');
        return redirect()->route('penjadwalanacara.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = auth()->user()->id;
        $data   = $this->user->getUser($userId);
        $acara  = JadwalAcara::findOrFail($id);

        return view('admin.penjadwalanacara.edit', $data = [
            'menu' => 'Penjadwalan Acara',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'acara' => $acara
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
        $validatedData = $request->validate([
            'judul' => ['required'],
            'mulai' => ['required'],
            'hingga' => ['required'],
            'kategori' => ['required'],

        ]);
        $validatedData['link_meet'] = $request->link_meet;

        $dataAcara = JadwalAcara::findOrFail($id);
        $dataAcara->update($validatedData);
        $request->session()->flash('sukses','Acara berhasil diubah');
        return redirect()->route('penjadwalanacara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataAcara   = JadwalAcara::findOrFail($id);
        $dataAcara->delete();

        return redirect()->route('penjadwalanacara.index')->with('sukses','Acara berhasil dihapus');
    }
}
