<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Menampilkan halaman daftar semua foto galeri
    public function index()
    {
        // Mengambil semua data galeri dari database
        $galleries = Gallery::latest()->get(); 
        
        return view('admin.gallery.index', compact('galleries'));
    }

    // 1. Menampilkan halaman form tambah foto
    public function create()
    {
        return view('admin.gallery.create');
    }

    // 2. Memproses data dari form dan memindahkan gambar ke folder
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'type'  => 'required|in:ambiance,customers', // Sesuai dengan filter di desainmu
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mengurus file gambar
        $imageFile = $request->file('image');
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        
        $imageFile->move(public_path('images/gallery'), $imageName);

        // Simpan catatan ke database
        Gallery::create([
            'admin_id' => auth()->id(), 
            'title'    => $request->title,
            'type'     => $request->type,
            'image'    => 'images/gallery/' . $imageName, 
        ]);

        // Kembali ke halaman daftar galeri admin dengan pesan sukses
        return redirect()->route('gallery.index')->with('success', 'Foto momen berhasil ditambahkan!');
    }

    // 3. Menghapus foto dari database dan folder fisik public
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Cek dan hapus file foto asli dari folder public/images/gallery agar tidak menimbun sampah file
        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }
        
        // Hapus catatan dari database
        $gallery->delete();
        
        return redirect()->route('gallery.index')->with('success', 'Foto momen berhasil dihapus dari galeri!');
    }
}