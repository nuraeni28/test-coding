<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return view('create');
    }
    public function dashboard()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }
    public function store(Request $request)
    {
        $data = [];
        $name = $request->input('name');
        $nim = $request->input('nim');
        $gender = $request->input('gender');
        $major = $request->input('major');
        $address = $request->input('address');
        $phone = $request->input('phone');

        foreach ($name as $key => $value) {
            $validator = Validator::make(
                [
                    'nim' => $request->input('nim')[$key],
                    'phone' => $request->input('phone')[$key],
                ],
                [
                    'nim' => ['required', 'string', 'unique:students'],
                    'phone' => ['required', 'numeric', 'unique:students', 'digits_between:8,14'],
                ],
                [
                    'phone.unique' => 'No HP ' . $request->input('phone')[$key] . ' sudah digunakan.',
                    'phone.digits_between' => 'No HP ' . $request->input('phone')[$key] . ' harus 8-14 digit.',
                    'nim.unique' => 'NIM ' . $request->input('nim')[$key] . ' sudah digunakan.',
                ],
            );

            // Cek jika validasi gagal
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data[] = [
                'name' => $name[$key],
                'nim' => $nim[$key],
                'gender' => $gender[$key],
                'major' => $major[$key],
                'address' => $address[$key],
                'phone' => $phone[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        //bulk insert students
        Student::insert($data);
        return redirect()->route('student.dashboard')->with('success', 'Data mahasiswa berhasil disimpan.');
    }
}
