<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $data = [
            'message' => 'Get All Data Students',
            'data' => $students
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'message' => 'Data Students Berhasil Ditambahkan',
            'data' => $student
        ];
        return response()->json($data, 201);
    }

    public function show(Request $request)
    {
        $student = Student::find($request->id);
        if ($student) {
            $data = [
                'message' => 'Detail Data Student',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data Student Tidak Ditemukan'
            ];
            return response()->json($data, 404);
        }
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
        if ($student) {
            $student->update([
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ]);
            $data = [
                'message' => 'Data Student Berhasil Diupdate',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data Student Tidak Ditemukan'
            ];
            return response()->json($data, 404);
        }
    }

    public function destroy(Request $request)
    {
        $student = Student::find($request->id);
        if ($student) {
            $student->delete();
            $data = [
                'message' => 'Data Student Berhasil Dihapus'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data Student Tidak Ditemukan'
            ];
            return response()->json($data, 404);
        }
    }
}
