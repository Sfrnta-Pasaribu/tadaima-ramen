<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
        ]);

        \App\Models\Announcement::create($request->all());

        return back()->with('success', 'Pengumuman berhasil dipasang!');
    }
    public function create()
    {
        return view('admin.announcement.create');
    }
    public function index()
    {
        $announcements = \App\Models\Announcement::latest()->get();
        return view('admin.announcement.index', compact('announcements'));
    }

    public function destroy(\App\Models\Announcement $announcement)
    {
        // Hapus gambar kalau ada
        if ($announcement->image && file_exists(public_path($announcement->image))) {
            unlink(public_path($announcement->image));
        }
        
        $announcement->delete();
        return redirect()->route('announcement.index')->with('success', 'Berhasil dihapus!');
    }
}