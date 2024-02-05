<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        return view('student.all', [
            "title" => "Students",
            "students" => Student::all()
        ]);
    }
    public function show($student) {
        return view('student.student', [
            "title" => "Detail Students",
            "student" => Student::find($student)
        ]);
    }
    public function create() {
        return view('student.form', [
            "title" => "Form Tambah Data Siswa",
            "grades" => Grades::all()
        ]);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            "nis" => "required|max:255",
            "nama" => "required|max:255",
            "tanggal_lahir" => "required",
            "grade_id" => "required",
            "alamat" => "required"
        ]);
        $result = Student::create($validatedData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil ditambahkan !');
        } else {
            return back()->with('error', 'Failed to add data');
        }
    }
    public function destroy( Student $student) {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil dihapus !');
        } else {
            return back()->with('error', 'Failed to delete data');
        }
    }

    public function edit(Student $student) {

        return view('student.edit', [
            "title" => "Edit Tambah Data Siswa",
            "student" => $student,
            "grade_id" => Grades::all()
        ]);

    }
    public function update(Request $request, Student $student){
        $validateData = $request->validate([
            "nis" => "required|max:255",
            "nama" => "required|max:255",
            "tanggal_lahir" => "required",
            "grade_id" => "required",
            "alamat" => "required"
        ]);
        $result = Student::where('id', $student->id)->update($validateData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data updated successfully');
        } else {
            return back()->with('error', 'Failed to update data');
        }
    }

    
}
 