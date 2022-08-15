<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class bill_detail extends Model
{
    use HasFactory;
    protected $table ="bill_detail";//definir campos//
    protected $primaryKey= "id";
    protected $fillable=['item_name', 'quantity', 'price'];

    protected static function booted() //solo mostrar los que digan 20 en la base de datos
    {
        static::addGlobalScope('quantity', function (Builder $builder) {
            $builder->where(['quantity' => '20']);
        }); 
    }

}
