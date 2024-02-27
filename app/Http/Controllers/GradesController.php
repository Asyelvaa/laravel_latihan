<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grade.all', [
            "title" => "Grades",
            "grades" => Grades::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grade.form', [
            "title" => "Form Tambah Kelas",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
        ]);
        $result = Grades::create($validatedData);
        if ($result) {
            return redirect('/grade/all')->with('success', 'Data kelas berhasil ditambahkan !');
        } else {
            return redirect('/grade/all')->with('failed', 'Data kelas gagal ditambahkan !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Grades $grades)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grades $grades)
    {
        //
    }
}
