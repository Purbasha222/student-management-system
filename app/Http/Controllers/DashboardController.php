<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $totalStudents  = Student::count();
        $totalCourses   = Course::count();
        $latestStudents = Student::with('course')->latest()->take(5)->get();

        return view('dashboard', compact('totalStudents', 'totalCourses', 'latestStudents'));
    }
}
