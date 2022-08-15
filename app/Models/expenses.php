<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class expenses extends Model
{
    use HasFactory;
    protected $table ="expenses";//definir campos//
    protected $primaryKey= "id";
    protected $fillable=['amount','customer_name','customer_last_name','user_id'];

    protected static function booted() //solo mostrar los que digan active en la base de datos
    {
        static::addGlobalScope('amount', function (Builder $builder) {
            $builder->where(['amount' => '1000']);
        }); 
    }
}
