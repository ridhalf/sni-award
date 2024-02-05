<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\MasterPertanyaan;
use App\Models\User;
use Illuminate\Http\Request;

class FaqController extends Controller
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
    }
    public function index()
    {
        $dataFaq = Faq::all();
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.faq.index',$data = [
            'menu' => 'FaQ',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataFaq' => $dataFaq
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.faq.create',$data = [
            'menu' => 'FaQ',
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
        $validateData = $request->validate([
            'pertanyaan' => ['required'],
            'jawaban' => ['required']
        ]);
        $ret_val = Faq::create($validateData);
        return redirect()->route('faq.index')->with('sukses','FaQ berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataFaq = Faq::findOrFail($id);
        $idUser = auth()->user()->id;
        $data = $this->user->getUser($idUser);
        return view('admin.faq.edit',$data=[
            'menu' => 'FaQ',
            'data' => $data,
            'peran' => auth()->user()->peran,
            'dataFaq' => $dataFaq
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
        $validateData = $request->validate([
            'pertanyaan' => ['required'],
            'jawaban' => ['required']
        ]);
        $dataFaq = Faq::findOrFail($id);
        $dataFaq->update($validateData);
        return redirect()->route('faq.index')->with('sukses','FaQ berhasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = Faq::findOrFail($id);
        $data->delete();

        return redirect()->route('faq.index')->with('sukses','FaQ berhasil dihapus');
    }
}
