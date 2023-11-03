<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    // property animals
    // membuat method index
    public function index()
    {
        // menampilkan data students dari database
        $student = Student::all();
        if ($student->isEmpty()) {
            $data = [
                'message' => 'Resoure is empty',
                'data' => []
            ];

            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Menampilkan seluruh data students',
            'data' => $student
        ];

        // kirim data(json) dan response code
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if (!$student) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $data = [
            'message' => 'Resource found',
            'data' => $student
        ];

        // Mengembalikan data dan status code 200
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // validasi data request
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|size:9',
            'email' => 'required|email',
            'jurusan' => 'required'
        ]);

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // insert data ke database
        $student = Student::create($input);

        // buat response data
        $data = [
            'message' => 'Resource created successfully',
            'data' => $student
        ];

        // kirim data(json) dan response code
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if (!$student) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);

        $data = [
            'message' => 'Resource updated successfully',
            'data' => $student
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        // jika data yang dicari tidak ada, kirim kode 404
        if (!$student) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Resource deleted successfully'], 200);
    }
}