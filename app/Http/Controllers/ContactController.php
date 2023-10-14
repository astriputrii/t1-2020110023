<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class ContactController extends Controller

{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'ISBN' => 'required|string|min:3|max:255',
            'Judul' => 'required|string|email',
            'Halaman' => 'required|numeric|digits_between:5,15',
        ]);
        $book = new Book();
        $book->ISBN = $validated['ISBN'];
        $book->Judul = $validated['Judul'];
        $book->Halaman = $validated['Halaman'];
        $book->Kategori = $validated['Kategori'];
        $book->Penerbit = $validated['Penerbit'];
        $book->save();

        return redirect('/contact-us')->with('success', 'Thank you, we will contact you soon!');
    }
}
