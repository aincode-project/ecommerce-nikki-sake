<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfileController extends Controller
{
    public function index()
    {
        $dataCustomer = Customer::where('id', Auth::user()->customer->id)->first();

        return view('frontend.profile.index', compact('dataCustomer'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
        ]);

        Customer::where('id', $id)->update([
            'nama_customer' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('profil-customer.index');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profil-customer.index');
    }
}
