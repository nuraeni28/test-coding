<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            $validator = Validator::make(
                [
                    'name' => $request->input('name')[$key],
                    'address' => $request->input('address')[$key],
                    'phone' => $request->input('phone')[$key],
                ],
                [
                    'name' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'numeric', 'unique:students'],
                ],
                [
                    'phone.unique' => 'No HP ' . $request->input('phone')[$key] . ' sudah digunakan.',
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
        return view('index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }
}
