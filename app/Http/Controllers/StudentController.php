<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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

        // Lakukan bulk insert
        Student::insert($data);
        return view('index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }
}
