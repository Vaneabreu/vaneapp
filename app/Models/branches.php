<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    use HasFactory;
    protected $table = "branches";//definir campos//
    protected $primaryKey = "id";
    protected $fillable = ['branch_name', 'address', 'coordinate_x', 'coordinate_y'];

    public function bills(){ 

        return $this->hasMany(bills::class, 'branche_id', 'id');
        
    }

    
}
