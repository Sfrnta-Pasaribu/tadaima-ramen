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
        // 1. Validasi data (pastikan image dibuat 'nullable')
        $data = $request->validate([
            'type'    => 'required|in:pengumuman,promo',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // 2. Logika Pengecekan Gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pengumuman'), $fileName);
            
            // Simpan format path ke database jika gambar ada
            $data['image'] = 'images/pengumuman/' . $fileName;
        } else {
            $data['image'] = null; 
        }

        // Ambil ID Admin yang sedang login dan masukkan ke dalam array data
        $data['admin_id'] = auth()->id();

        // 4. Simpan ke database
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