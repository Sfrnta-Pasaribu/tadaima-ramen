<?php

namespace App\Http\Controllers;

use App\Models\Announcement; 
use App\Models\Menu; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $data = $request->validate([
            'type'            => 'required|string|max:50', 
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'menu_id'         => 'nullable|array', 
            'discount_type'   => 'nullable|string|in:percentage,nominal',
            'discount_amount' => 'nullable|numeric|min:1',
        ]);

        $typeInput = strtolower($request->type);
        
        // === 2. LOGIKA KALKULASI DISKON (MULTI-MENU) ===
        if ($typeInput === 'diskon') {
            $data['type'] = 'promo'; 
            
            if ($request->filled('discount_amount') && $request->filled('discount_type') && $request->filled('menu_id')) {
                
                // Cek apakah 'all' ada di dalam array pilihan admin
                // UBAH: Menggunakan whereIn untuk mencari banyak ID sekaligus
                $menusToUpdate = in_array('all', $request->menu_id) 
                    ? Menu::all() 
                    : Menu::whereIn('id', $request->menu_id)->get();

                foreach ($menusToUpdate as $menu) {
                    $hargaBaru = null;

                    if ($request->discount_type === 'percentage') {
                        $potongan = $menu->price * ($request->discount_amount / 100);
                        $hargaBaru = $menu->price - $potongan;
                    } else if ($request->discount_type === 'nominal') {
                        $hargaBaru = $menu->price - $request->discount_amount;
                    }

                    if ($hargaBaru < 0) $hargaBaru = 0;

                    $menu->update(['harga_diskon' => $hargaBaru]);
                }
            }
        } 
        else if (str_contains($typeInput, 'promo')) {
            $data['type'] = 'promo';
        } else {
            $data['type'] = 'info';
        }

        // 3. Proses upload gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/pengumuman'), $fileName);
            $data['image'] = 'images/pengumuman/' . $fileName;
        }

        $data['admin_id'] = auth()->id();
        
        unset($data['menu_id'], $data['discount_type'], $data['discount_amount']);
        
        Announcement::create($data);

        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil ditambahkan dan diskon telah diterapkan ke menu yang dipilih!');
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'type'    => 'required|string|max:50',
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->only(['type', 'title', 'content']);

        $typeInput = strtolower($request->type);
        if (str_contains($typeInput, 'promo')) {
            $data['type'] = 'promo';
        } else {
            $data['type'] = 'info';
        }

        if ($request->hasFile('image')) {
            if ($announcement->image && File::exists(public_path($announcement->image))) {
                File::delete(public_path($announcement->image));
            }
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/pengumuman'), $fileName);
            $data['image'] = 'images/pengumuman/' . $fileName;
        }

        $announcement->update($data);
        return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Announcement $announcement)
    {
        // 1. Hapus file gambar secara fisik dari folder menggunakan native PHP (Lebih tangguh di localhost)
        if ($announcement->image && file_exists(public_path($announcement->image))) {
            unlink(public_path($announcement->image));
        }

        // 2. Bersihkan Harga Diskon
        // Karena sistem pengumuman tidak mengikat ID Menu secara spesifik, 
        // cara paling aman saat sebuah promo dihapus adalah mereset SEMUA harga diskon kembali ke normal.
        Menu::query()->update(['harga_diskon' => null]);

        // 3. Hapus data pengumuman dari database
        $announcement->delete();

        return redirect()->route('announcement.index')->with('success', 'Pengumuman dihapus, gambar dibersihkan, dan harga menu kembali normal!');
    }
}