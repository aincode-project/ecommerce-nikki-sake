<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $dataUser = Auth::user();

        return view('backend.profile.index', compact('dataUser'));
    }

    public function update(Request $request)
    {
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        return redirect()->route('profile.index');
    }

    public function updatePassword(Request $request)
    {
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.index');
    }
}
