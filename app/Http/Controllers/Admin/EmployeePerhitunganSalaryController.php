<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmpSalary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeePerhitunganSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        $gajis = EmpSalary::select('employee_id', 'month', 'year', 'basic_salary', 'bonus', 'bpjs', 'jp', 'loan', 'total_salary')
            ->with(['employee' => function ($query) {
                $query->select('id', 'name');
            }])
            ->where('month', $bulan)
            ->where('year', $tahun)
            ->get();

        $totalGaji = $gajis->sum('total_salary');

        // return response()->json([
        //     'gajis' => $gajis,
        //     'bulan' => $bulan,
        //     'tahun' => $tahun,
        //     'totalGaji' => $totalGaji,
        // ]);

        return view('Admin.Perhitungan.Index', [
            'gajis' => $gajis,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'totalGaji' => $totalGaji,
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
