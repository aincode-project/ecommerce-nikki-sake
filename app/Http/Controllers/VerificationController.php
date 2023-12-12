<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        $dataBarangs = Barang::latest()->filter(request(['search', 'category']));

        $dataJenisBarangs = JenisBarang::all();

        return view('age-verification', [
            "dataBarangs" => $dataBarangs->paginate(15),
            "dataJenisBarangs" => $dataJenisBarangs,
        ]);
    }

    public function verify(Request $request)
    {
        $request->session()->put('is_age_verified', true);
        return redirect()->intended('/');
    }
}
