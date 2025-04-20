<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Laravel\Prompts\Clear;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Class";
        $datas = Major::all();

        return view('major.index', compact('title', 'datas'));
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
        Major::create([
            'name_major' => $request->class_name,
            'description_major' => $request->desc_major,
        ]);

        return redirect()->to('class');
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
        Major::where('id', $id)->update([
            'name_major' => $request->class_name,
            'description_major' => $request->desc_major,
        ]);

        return redirect()->to('class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Major::where('id', $id)->delete();

        return redirect()->to('class');
    }
}
