<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function student()
    {
        $students =  Student::latest()->filter(request(['search']))->paginate(5);
        return view('dashboard.student.index', [
            "title" => "Student Page",
            "students" => $students
        ]);
    }

    public function grade()
    {
        $grades = Grades::all();

        return view('dashboard.grade.index', [
            'grades' => $grades
        ]);
    }
}
