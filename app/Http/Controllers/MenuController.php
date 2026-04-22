<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // 1. Menampilkan Daftar Menu (Tabel)
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    // 2. Menampilkan Form Tambah Menu
    public function create()
    {
        return view('admin.menu.create');
    }

    // 3. Logika Menyimpan Data (Hasil Klik Tombol Simpan)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            // Pindah file ke public/images
            $file->move(public_path('images'), $fileName);
            $imagePath = 'images/' . $fileName;
        }

        Menu::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambah!');
    }

    // Fungsi lainnya (edit, update, destroy) bisa kita isi nanti
    public function show(Menu $menu) 
    {
        return view('admin.menu.show', compact('menu'));
    }
    public function edit(Menu $menu) 
    {
        return view('admin.menu.edit', compact('menu'));
    }
    public function update(Request $request, Menu $menu) 
    {
        $request->validate([
        'name' => 'required',
        'category' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // nullable karena foto boleh tidak diganti
        ]);

        $data = $request->only(['name', 'category', 'price', 'description']);

        // Jika ada upload foto baru
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data['image'] = 'images/' . $fileName;
        }

        $menu->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah!');
    }
    public function destroy(Menu $menu) 
    {
        // Cek apakah file fotonya ada di folder public/images
        if ($menu->image && file_exists(public_path($menu->image))) {
            // Hapus file fisiknya supaya folder images tidak penuh sampah
            unlink(public_path($menu->image));
        }
        // Hapus data dari database
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus selamanya!');
    }
}