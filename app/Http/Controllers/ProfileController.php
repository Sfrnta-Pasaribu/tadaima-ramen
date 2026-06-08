<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // 1. Ambil data yang sudah lolos validasi (nama dan username)
        $request->user()->fill($request->validated());

        // Pengecekan email_verified_at sudah dihapus di sini

        // 2. Simpan perubahannya ke database
        $request->user()->save();

        // 3. Kembalikan ke halaman pengaturan profil
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // 1. Cek jumlah akun admin
        $adminCount = \App\Models\User::count(); 

        // 2. Proteksi jika hanya tersisa 1 admin
        if ($adminCount <= 1) {
            // Kirim error ke bag 'userDeletion'
            return back()->withErrors(['password' => 'Tidak bisa menghapus akun: Anda adalah satu-satunya admin yang tersisa.'], 'userDeletion');
        }

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}