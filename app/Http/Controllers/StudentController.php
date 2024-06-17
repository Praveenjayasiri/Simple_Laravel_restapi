<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            $data = [
                'status' => 404,
                'message' => 'No students found'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'status' => 200,
            'students' => $students
        ];
        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {

            $data = [
                'status' => 400,
                'message' => $validator->messages()
            ];

            return response()->json($data, 400);
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();

            $data = [
                'status' => 200,
                'message' => 'Student created successfully'
            ];

            return response()->json($data, 200);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => $validator->messages()
            ];
            return response()->json($data, 400);
        }

        $student = Student::find($id);

        if (!$student) {
            $data = [
                'status' => 404,
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        $data = [
            'status' => 200,
            'message' => 'Student updated successfully'
        ];
        return response()->json($data, 200);
    }

    public function delete(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'status' => 404,
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'status' => 200,
            'message' => 'Student deleted successfully'
        ];
        return response()->json($data, 200);
    }
}
