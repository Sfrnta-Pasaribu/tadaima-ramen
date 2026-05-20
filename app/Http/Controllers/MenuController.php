<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // 1. Menampilkan Daftar Menu (Tabel)
    public function index()
    {
        // SEKARANG: Ambil data mulai dari yang paling baru (latest)
        $menus = Menu::latest()->get();
        
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
        ], [
            'image.max' => 'Ukuran gambar terlalu besar! Maksimal hanya 2MB.',
            'image.image' => 'File yang diunggah harus berupa gambar!',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'name.required' => 'Nama menu wajib diisi.',
            'category.required' => 'Category menu wajib diisi.',
            'price.required' => 'Price menu wajib diisi.',
            'description.required' => 'Description menu wajib diisi.',
        ]);

        $imagePath = null; // Siapkan variabel kosong

        // Proses Upload Foto
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            // Pindah file dari komputer admin ke public/images
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

    public function show(Menu $menu) 
    {
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu) 
    {
        return view('admin.menu.edit', compact('menu'));
    }

    // 4. Logika Mengubah Data (Hasil Klik Tombol Update)
    public function update(Request $request, Menu $menu) 
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Boleh kosong jika tidak ganti foto
        ], [
            'image.max' => 'Ukuran gambar terlalu besar! Maksimal hanya 2MB.',
            'image.image' => 'File yang diunggah harus berupa gambar!',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'name.required' => 'Nama menu wajib diisi.',
            'category.required' => 'Category menu wajib diisi.',
            'price.required' => 'Price menu wajib diisi.',
            'description.required' => 'Description menu wajib diisi.',
        ]);

        $data = $request->only(['name', 'category', 'price', 'description']);

        // Jika admin mengupload foto baru
        if ($request->hasFile('image')) {
            
            // LAKUKAN PEMBERSIHAN: Hapus foto lama yang ada di folder
            if ($menu->image && file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }

            // UPLOAD FOTO BARU
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            
            // Timpa data foto di database dengan yang baru
            $data['image'] = 'images/' . $fileName;
        }

        $menu->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah!');
    }

    // 5. Logika Menghapus Data
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