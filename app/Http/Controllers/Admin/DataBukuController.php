<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataBook;
use App\Http\Requests\DataBukuRequest;
use Illuminate\Http\Request;

class DataBukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataBook::all();
        return view('pages.buku.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataBukuRequest $request)
    {
        $data = $request->all();

        DataBook::create($data);

        return redirect()->route('buku.index')->with('sukses', 'Data buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DataBook::findOrFail($id);

        return view('pages.buku.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataBukuRequest $request, $id)
    {
        $data = $request->all();
        $item = DataBook::findOrFail($id);
        $item->update($data);

        return redirect()->route('buku.index')->with('sukses', 'Data buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataBook::findOrFail($id);
        $item->delete();

        return redirect()->route('buku.index')->with('hapus', 'Data buku berhasil dihapus!');
    }
}
