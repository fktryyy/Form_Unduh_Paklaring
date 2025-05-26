<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login_page');
    }

    public function loginform(Request $request)
    {
        $request->validate([
            'barcode' => 'required',
        ]);

        $response = Http::post('https://wiki.ssmindonesia.com/login', [
            'barcode' => $request->barcode
        ]);

        if ($response->successful() && $response->json()) {
            $data = $response->json();
            return view('result', compact('data'));
        } else {
            return back()->with('error', 'Data tidak ditemukan.');
        }
    }
}

