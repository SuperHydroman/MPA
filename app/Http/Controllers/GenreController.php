<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $homepage = 'genres.index';

    public function show() {
        return view($this->homepage, [
            'genres' => Genre::all()
        ]);
    }

    public function add() {
        return view('genres.add');
    }

    public function store(Request $request) {
        Genre::storeGenre($request->name);

        return redirect()->route($this->homepage);
    }

    public function edit($id) {
        return view('genres.update', [
            'genre' => Genre::find($id)
        ]);
    }

    public function update(Request $request, $id) {
        Genre::updateGenre($request->name, $id);

        return redirect()->route($this->homepage);
    }

    public function delete($id) {
        return view('genres.delete', [
           'genre' => Genre::find($id)
        ]);
    }

    public function remove($id) {
        Genre::deleteGenre($id);

        return redirect()->route($this->homepage);
    }
}
