<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi diubah: email diganti menjadi username
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admin'], // Cek username kembar
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Simpan ke database menggunakan username
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // 3. Kembalikan ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Berhasil! Admin baru telah ditambahkan.');
    }
}