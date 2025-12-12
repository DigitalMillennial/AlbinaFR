<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   $students = Student::with('courses')->get();;
    return view('admin.students.index', compact('students'));
    }


    public function create() { }

    public function store(Request $request) { }

    public function show(string $id) { }

    public function edit(string $id) { }

    public function update(Request $request, string $id) { }

    public function destroy(string $id) { }
}
