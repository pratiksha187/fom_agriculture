<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create(Request $request)
    {
        if ($request->user()?->is_admin) {
            return redirect()->route('admin.enquiries.index');
        }

        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required', 'string']]);
        if (! Auth::attempt($credentials + ['is_admin' => true])) {
            throw ValidationException::withMessages(['email' => 'These login details do not match an administrator account.']);
        }
        $request->session()->regenerate();

        return redirect()->intended(route('admin.enquiries.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function editPassword()
    {
        return view('admin.account');
    }

    public function updatePassword(Request $request)
    {
        $details = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:12', 'max:128', 'confirmed'],
        ]);
        $request->user()->update(['password' => $details['password']]);
        $request->session()->regenerate();

        return back()->with('success', 'Your password has been updated.');
    }
}
