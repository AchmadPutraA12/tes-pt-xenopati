<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmpPresence;
use Illuminate\Http\Request;

class EmployeePresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presensis = EmpPresence::select('employee_id', 'check_in', 'check_out', 'late_in', 'early_out')
            ->with(['employee' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();
        // return response()->json([
        //     'presensis' => $presensis,
        // ]);

        return view('Admin.Presensi.Index', [
            'presensis' => $presensis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
