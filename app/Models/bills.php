<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = "bills"; //definir campos
    protected $primaryKey = "id";
    protected $guarded = ['id'];
    // protected $fillable = ['date', 'amount', 'itbis', 'comment', 'username', 'customer_id','branche_id','user_id','contact_id'];

    public function branch(){
        return $this->belongsTo(branches::class, 'branche_id', 'id');
    }
}

