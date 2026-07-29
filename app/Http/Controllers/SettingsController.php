<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Tampilkan halaman pengaturan profil admin.
     */
    public function index(Request $request): View
    {
        return view('admin.settings.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Perbarui informasi profil admin (name & email).
     */
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('settings.index')->with('success', 'Informasi profil berhasil diperbarui.');
    }

    /**
     * Perbarui kata sandi admin.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('settings.index')->with('success', 'Kata sandi berhasil diperbarui.');
    }
}
