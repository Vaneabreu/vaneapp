<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = "contacts"; //definir campos
    protected $primaryKey = "id";
    protected $fillable = ['contact_name', 'phone', 'address'];

    public function bills(){ 

        return $this->hasMany(bills::class, 'contact_id', 'id');
        
    }
}
