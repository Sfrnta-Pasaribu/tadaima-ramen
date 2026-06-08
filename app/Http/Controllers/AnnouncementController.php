<?php

namespace App\Http\Controllers;

use App\Models\Announcement; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class AnnouncementController extends Controller
{
    // 1. Menampilkan Daftar Pengumuman
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcement.index', compact('announcements'));
    }

    // 2. Menampilkan Form Tambah
    public function create()
    {
        return view('admin.announcement.create');
    }

    // 3. Menyimpan Pengumuman Baru
    public function store(Request $request)
    {
        // Diperbarui: Menambah 'info' dan 'jadwal' ke dalam daftar yang diizinkan
        $data = $request->validate([
            'type'    => 'required|in:promo,info,jadwal,pengumuman',
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pengumuman'), $fileName);
            $data['image'] = 'images/pengumuman/' . $fileName;
        } else {
            $data['image'] = null; 
        }

        $data['admin_id'] = auth()->id();

        Announcement::create($data);

        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // 4. Fungsi Mengubah Pengumuman (Edit)
    public function update(Request $request, Announcement $announcement)
    {
        // Diperbarui: Validasi type disamakan dengan store
        $request->validate([
            'type'    => 'required|in:promo,info,jadwal,pengumuman',
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->only(['type', 'title', 'content']);

        if ($request->hasFile('image')) {
            if ($announcement->image) {
                $oldImagePath = public_path($announcement->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pengumuman'), $fileName);
            
            // Diperbarui: Path konsisten ke images/pengumuman/
            $data['image'] = 'images/pengumuman/' . $fileName;
        }

        $announcement->update($data);

        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    // 5. Menghapus Pengumuman
    public function destroy(Announcement $announcement)
    {
        if ($announcement->image) {
            $imagePath = public_path($announcement->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        
        $announcement->delete();
        
        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil dihapus!');
    }
}