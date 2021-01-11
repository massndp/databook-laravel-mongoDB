<?php

namespace App\Http\Controllers\Admin;

use App\BookGallery;
use App\DataBook;
use App\Http\Requests\BookGalleryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BookGallery::with('databook')->get();
        return view('pages.gallery.index', [
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
        $databook = DataBook::all();
        return view('pages.gallery.create', [
            'databook' => $databook
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/gallery',
            'public'
        );

        BookGallery::create($data);

        return redirect()->route('gallery.index')->with('sukses', 'Gambar buku berhasil ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BookGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
