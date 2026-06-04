<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Gallery; 
use App\Models\Announcement; 

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda (Home Page).
     *
     * Fungsi ini mengambil 3 menu signature dari database untuk ditampilkan
     * sebagai highlight di halaman depan. Selain itu, fungsi juga mengambil
     * seluruh data pengumuman/promo yang diurutkan dari yang terbaru.
     * Kedua data tersebut dikirim ke view 'home' untuk dirender.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil 3 menu saja untuk ditampilkan sebagai signature di halaman depan
        $signatureMenus = Menu::take(3)->get(); 

        // Ambil data pengumuman/promo dari yang terbaru
        $announcements = Announcement::latest()->get(); 

        // Kirim kedua variabel ke view 'home' menggunakan compact
        return view('home', compact('signatureMenus', 'announcements'));
    }

    /**
     * Menampilkan halaman daftar menu lengkap.
     *
     * Fungsi ini mengambil seluruh data menu dari database, lalu
     * mengelompokkannya berdasarkan kolom 'category'. Setelah dikelompokkan,
     * kategori diurutkan sesuai prioritas yang sudah ditentukan secara manual
     * (Ramen paling atas, Dessert paling bawah). Hasilnya dikirim ke view 'menu'.
     *
     * @return \Illuminate\View\View
     */
    public function menu()
    {
        // Tentukan urutan kategori sesuai prioritas yang diinginkan
        $priority = ['Ramen', 'Dry Ramen', 'Rice', 'Fried Rice', 'Drinks', 'Snacks', 'Dessert'];

        $groupedMenus = Menu::all()
            ->groupBy('category')
            ->sortBy(function ($items, $key) use ($priority) {
                // Mencari posisi kategori di dalam array priority
                return array_search($key, $priority);
            });

        return view('menu', compact('groupedMenus'));
    }

    /**
     * Menampilkan halaman galeri foto.
     *
     * Fungsi ini mengambil seluruh data galeri dari database
     * dan mengirimkannya ke view 'gallery' untuk ditampilkan
     * dalam bentuk grid foto.
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }

    /**
     * Menampilkan halaman tentang kami (About Us).
     *
     * Fungsi ini merender view 'about' yang berisi informasi
     * mengenai sejarah, visi, dan misi Tadaima Ramen.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about'); 
    }

    /**
     * Menampilkan halaman fasilitas restoran.
     *
     * Fungsi ini merender view 'facilities' yang menampilkan
     * informasi tentang fasilitas yang tersedia di restoran,
     * seperti WiFi gratis, area parkir, dan kapasitas meja.
     *
     * @return \Illuminate\View\View
     */
    public function fasilitas()
    {
        return view('facilities'); 
    }
}