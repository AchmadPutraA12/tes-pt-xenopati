<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::select('id', 'name', 'email', 'address', 'phone', 'user_picture')->orderBy('name')->get();
        // return response()->json([
        //     'employees' => $employees,
        // ]);

        return view('Admin.Employee.Index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Employee.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:50|unique:employees',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'user_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string',
        ]);

        if ($request->hasFile('user_picture')) {
            $path = $request->file('user_picture')->store('employee_pictures', 'public');
        }

        Employee::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'user_picture' => $path ?? null,
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('employee.index')->with('success', 'Pegawai Telah Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('Admin.Employee.Edit', [
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:50|unique:employees,email,' . $employee->id,
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'user_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8',
        ]);

        if ($request->hasFile('user_picture')) {
            $path = $request->file('user_picture')->store('employee_pictures', 'public');
            if ($employee->user_picture) {
                Storage::delete($employee->user_picture);
            }
        }

        $employee->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'user_picture' => isset($path) ? $path : $employee->user_picture,
            'password' => $validated['password'] ? bcrypt($validated['password']) : $employee->password,
        ]);

        return redirect()->route('employee.index')->with('success', 'Pegawai Telah Diganti!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->user_picture) {
            Storage::delete($employee->user_picture);
        }

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
