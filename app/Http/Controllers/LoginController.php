<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            // Cek level user
            if ($user->level_id === 1) {
                return redirect()->route('admin')->with('success', 'Login sebagai Admin berhasil!');
            } elseif ($user->level_id === 2) {
                return redirect()->route('instruktur')->with('success', 'Login sebagai Instruktur berhasil!');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Level tidak dikenali.');
            }
        } else {
            return back()->with('error', 'Email atau Password salah!')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
