<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['name','position','salary','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
