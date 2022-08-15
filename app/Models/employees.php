<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $table = "employees";//definir campos//
    protected $primaryKey= "id";
    protected $fillable= ['employee_name', 'address', 'phone', 'position' , 'salary'];

    public function branches(){
        return $this->belongsToMany(branches::class, 'branches', 'id', 'branch_id');
    }
}
