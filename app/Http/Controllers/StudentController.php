<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Form submission received', $request->all());

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'whatsapp' => 'required|digits:10|unique:students,whatsapp',
            'school' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'address' => 'required|string',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20'
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            Log::error('Validation failed', $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Log before creating the record
            Log::info('Creating student record', $request->only([
                'name', 'email', 'whatsapp', 'school', 'grade', 'address', 'parent_name', 'parent_phone'
            ]));

            // Create new student record
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'school' => $request->school,
                'grade' => $request->grade,
                'address' => $request->address,
                'parent_name' => $request->parent_name,
                'parent_phone' => $request->parent_phone
            ]);

            // Log successful creation
            Log::info('Student created successfully', ['student_id' => $student->id]);

            // Redirect to success page with success message
            return redirect()->route('success')->with('success', 'Registration successful!');
            
        } catch (\Exception $e) {
            // Log the error and redirect back with error message
            Log::error('Registration error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->with('error', 'An error occurred during registration. Please try again.')
                ->withInput();
        }
    }
}
