<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('department.index', [
            'title' => 'Department',
            'departments' => Department::latest()->get(),
            //'departments' => Department::orderBy('name', 'asc')->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create', 
        ['title' => 'Create department']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|digits:11|numeric',
        ], [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'name.max' => 'Nama Maksimal 255 Karakter',
            'nim.required' => 'NIM Tidak Boleh Kosong',
            'nim.digits' => 'NIM Harus 11 Digit',
            'nim.numeric' => 'NIM Harus Angka',
        ]
        );

    Department::create($validated);

        return to_route('department.index')->withSuccess('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('department.show', [
            'title' => 'Detail Department',
            'department' => $department, 
            //'departments' => Department::orderBy('name', 'asc')->get(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', [
            'title' => 'Edit Department',
            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|digits:11|numeric',
        ], [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'name.max' => 'Nama Maksimal 255 Karakter',
            'nim.required' => 'NIM Tidak Boleh Kosong',
            'nim.digits' => 'NIM Harus 11 Digit',
            'nim.numeric' => 'NIM Harus Angka',
        ]);

        $department->update($validated);

        return to_route('department.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete($department);

        return to_route('department.index')->withSuccess('Data Berhasil Dihapus');
    }
}