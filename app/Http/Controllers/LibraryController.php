<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\LibraryClass;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $library = Library::query(); // mendefinisikan variabel $contact

        if ($request->filled('search')) { // jika inputan search ada isinya maka akan dieksekusi
            $library->where('Nama_Lengkap', 'like', '%' . $request->search . '%'); // query pencarian data sesuai nama
        }
    
        return view('library.index', [
            'librarys' => $library->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('library.create', [
            'classes' => LibraryClass::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NISN' => ['required', 'min:3'],
            'Nama_Lengkap' => ['required', 'min:3'],
            'Kelas' => ['required'],
            'Nama_Buku' => ['required'],
            'Tanggal_Peminjaman' => ['required'],
            'photo' => ['image'],
        ], [
            'NISN.required' => 'NISN harus diisi!',
            'Nama_Lengkap.required' => 'Nama Lengkap harus diisi!',
            'Kelas.required' => 'Kelas harus diisi!',
            'Nama_Buku.required' => 'Nama Buku harus diisi!',
            'Tanggal_Peminjaman.required' => 'Tanggal Peminjaman harus diisi!',
        ]);

        $photo = '';

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        $library = new Library();

        $library->NISN = $request->NISN;
        $library->Nama_Lengkap = $request->Nama_Lengkap;
        $library->Kelas = $request->Kelas;
        $library->Nama_Buku = $request->Nama_Buku;
        $library->Tanggal_Peminjaman = $request->Tanggal_Peminjaman;
        $library->photo = $photo;

        $library->save();

        session()->flash('success', 'Data berhasil ditambahkan!');

        return redirect()->route('library.index');
    }

    public function edit($id)
    {
        $library = Library::find($id);

        return view('library.edit', [
            'library' => $library,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'NISN' => ['required', 'min:3'],
            'Nama_Lengkap' => ['required', 'min:3'],
            'Kelas' => ['required'],
            'Nama_Buku' => ['required'],
            'Tanggal_Peminjaman' => ['required'],
            'photo' => ['image'],
        ], [
            'NISN.required' => 'NISN harus diisi!',
            'Nama_Lengkap.required' => 'Nama Lengkap harus diisi!',
            'Kelas.required' => 'Kelas harus diisi!',
            'Nama_Buku.required' => 'Nama Buku harus diisi!',
            'Tanggal_Peminjaman.required' => 'Tanggal Peminjaman harus diisi!',
        ]);

        $photo = '';

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        $library = Library::find($id);

        $library->NISN = $request->NISN;
        $library->Nama_Lengkap = $request->Nama_Lengkap;
        $library->Kelas = $request->Kelas;
        $library->Nama_Buku = $request->Nama_Buku;
        $library->Tanggal_Peminjaman = $request->Tanggal_Peminjaman;
        $library->photo = $photo;

        $library->save();

        session()->flash('info', 'Data berhasil diperbarui!');

        return redirect()->route('library.index');
    }

    public function destroy($id)
    {
        $library = Library::find($id);

        $library->delete();

        session()->flash('danger', 'Data berhasil dihapus!');

        return redirect()->route('library.index');
    }
}
