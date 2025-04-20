<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Level;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Instructor Data';

        $major = Major::orderBy('id', 'asc')->get();
        $levels = Level::orderBy('id', 'asc')->get();
        $data = User::all();
        $instructor_web = User::with('major')->where('class_id', 1)->get();
        $instructor_mobile = User::with('major')->where('class_id', 2)->get();

        // return $products;
        return view('instructor.index', compact('title', 'instructor_web', 'instructor_mobile', 'major', 'levels', 'data'));
    }

    public function account()
    {
        $title = 'Account Instructor';
        $data = User::with('major')->where('id', Auth::id())->first();

        return view('instructor.account', compact('title', 'data'));
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
        //ORDER CODE
        $nip_code = User::max('id');
        $nip_code++;
        $nip_code = 'PPKDJP-I-' . sprintf('%04d', $nip_code);

        $data = [
            'nip' => $nip_code,
            'class_id' => Level::where('id', 1)->first()->id,
            'level_id' => Level::where('id', 2)->first()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => '12345678',
        ];

        User::create($data);
        return redirect()->route('instructor.index')->with('success', 'Instructor Added!');
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
        $data = [
            'class_id' => $request->class,
            'level_id' => $request->level,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? bcrypt($request->password) : User::where('id', $id)->value('password')
        ];

        User::where('id', $id)->update($data);
        return redirect()->route('instructor.index')->with('success', 'Instructor Updated!');
    }

    public function updateAccount(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? bcrypt($request->password) : User::where('id', $id)->value('password')
        ];

        User::where('id', $id)->update($data);
        return redirect()->route('instruktur')->with('success', 'Instructor Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Instructor::findOrFail($id);
        $product->delete();
        return redirect()->route('instructor.index')->with('success', 'Instructor Deleted!');
    }
}
