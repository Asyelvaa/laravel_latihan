<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Students;
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
        return view('student.detail', [
            "title" => "Detail Students",
            "student" => Student::find($student)
        ]);
    }
}
