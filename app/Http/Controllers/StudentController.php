<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'course_id' => 'required|exists:courses,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        $photoPath = $request->file('photo')->store('images', 'public');

        $student = Student::create([
            'user_id' => $user->id,
            'course_id' => $request->course_id,
            'photo' => $photoPath,
        ]);


        return redirect()->route('students.index')->with('success', 'Student created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
//        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $users = User::all();
        $courses = Course::all();
        return view('students.edit', compact('student', 'users', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, Student $student)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the photo update
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $student->photo = $photoPath;
        }

        // Update the student record
        $student->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');

    }
}
