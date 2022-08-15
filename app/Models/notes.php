<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class notes extends Model
{
    use HasFactory;
    protected $table ="notes";//definir campos//
    protected $primaryKey= "id";
    protected $fillable=['note','address', 'name', 'amount','customer_id'];

    protected static function booted() //solo mostrar los que digan pago en la base de datos
    {
        
        static::addGlobalScope('note',  function (Builder $builder) {
            $builder->where(['note'=> 'pago']);
        });
    }
}
