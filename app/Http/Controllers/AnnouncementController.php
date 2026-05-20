<?php

namespace App\Http\Controllers;

use App\Models\Announcement; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class AnnouncementController extends Controller
{
    // 1. Menampilkan Daftar Pengumuman (Terbaru di atas)
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcement.index', compact('announcements'));
    }

    // 2. Menampilkan Form Tambah Pengumuman
    public function create()
    {
        return view('admin.announcement.create');
    }

    // 3. Menyimpan Pengumuman Baru (Termasuk Upload Gambar)
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'image.max' => 'Ukuran gambar terlalu besar! Maksimal hanya 2MB.',
            'image.image' => 'File yang diunggah harus berupa gambar!',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'type.required' => 'Tipe pengumuman wajib diisi.',
            'title.required' => 'Judul pengumuman wajib diisi.',
            'content.required' => 'Isi pengumuman wajib diisi.',
        ]);

        $data = $request->only(['type', 'title', 'content']);
        $data['image'] = null; // Nilai default jika tidak ada gambar

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // Menggunakan gabungan time() dan uniqid() agar nama file tidak bentrok dan terhindar dari cache browser
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Pindahkan file ke folder public/images
            $file->move(public_path('images/pengumuman'), $fileName);
            
            // Simpan format path ke database
            $data['image'] = 'images/pengumuman/' . $fileName;
        }

        Announcement::create($data);

        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // 4. Fungsi Mengubah Pengumuman (Edit)
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->only(['type', 'title', 'content']);

        // Jika admin mengupload gambar yang baru
        if ($request->hasFile('image')) {
            
            // HAPUS GAMBAR LAMA MENGGUNAKAN FACADE FILE LARAVEL
            if ($announcement->image) {
                $oldImagePath = public_path($announcement->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // UPLOAD FOTO BARU
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pengumuman'), $fileName);
            
            $data['image'] = 'images/' . $fileName;
        }

        $announcement->update($data);

        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    // 5. Menghapus Pengumuman & Gambarnya
    public function destroy(Announcement $announcement)
    {
        // HAPUS GAMBAR FISIKNYA TERLEBIH DAHULU
        if ($announcement->image) {
            $imagePath = public_path($announcement->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath); // Menghancurkan file dari public/images
            }
        }
        
        // Hapus data dari database
        $announcement->delete();
        
        return redirect()->route('announcement.index')->with('success', 'Pengumuman beserta gambar berhasil dihapus!');
    }
}