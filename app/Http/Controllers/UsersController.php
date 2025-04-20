<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $major = Major::orderBy('id', 'asc')->get();
        $level = Level::orderBy('id', 'asc')->get();

        $users = User::with('major', 'level')->where('level_id', 1)->get();

        return view('users.index', compact('users', 'major', 'level'));
    }

    public function store(Request $request)
    {
        //ORDER CODE
        $nip_code = User::max('id');
        $nip_code++;
        if ($request->level == 1) {
            $prefix = 'PPKDJP-A';
        } elseif ($request->level == 2) {
            $prefix = 'PPKDJP-I';
        } elseif ($request->level == 3) {
            $prefix = 'PPKDJP-S';
        } else {
            $prefix = 'PPKDJP-V';
        }

        $nip_code = $prefix . '-' . sprintf('%04d', $nip_code);

        $data = [
            'nip' => $nip_code,
            'class_id' => $request->class,
            'level_id' => $request->level,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => "12345678",
        ];

        User::create($data);
        return redirect()->route('users.index')->with('success', 'Users Added!');
    }

    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
        ];

        User::where('id', $id)->update($data);
        return redirect()->route('users.index')->with('success', 'User Updated!');
    }

    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted!');
    }
}
