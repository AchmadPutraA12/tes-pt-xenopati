<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function presences()
    {
        return $this->hasOne(EmpPresence::class, 'employee_id', 'id');
    }

    public function salaries()
    {
        return $this->hasOne(EmpSalary::class, 'employee_id', 'id');
    }
}
