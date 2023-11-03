<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // property animals
    #membuat method index
    public function index()
    {
        // menampilkan data students dari database
        $student = Student::all();

        $data = [
            'message' => 'Menampilkan seluruh data students',
            'data' => $student
        ];

        // kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Resource deleted successfully'], 200);
    }

    public function update()
    {
    }

    public function show()
    {
    }
}
