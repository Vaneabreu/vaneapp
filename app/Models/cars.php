<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class cars extends Model
{
    protected $table = "cars";//definir campos//
    protected $primaryKey = "id";
    protected $fillable = ['car_name','model','mark','year','customer_id','user_id'];

    public function category(){
        return $this->hasOneThrough(
            Categories::class,
            Brands::class,
            'car_id', // Foreign key on the cars table...
            'brand_id', // Foreign key on the owners table...
            'id', // Local key on the mechanics table...
            'rec_id' // Local key on the cars table...
        );
    }
     
    protected static function booted() //solo mostrar los que digan active en la base de datos u otros detalles, se utilizn los where
    {
        static::addGlobalScope('year',  function (Builder $builder) {
            $builder->whereBetween('year', [2021, 2022]);
        });

        static::saving(function($customer){ 
            $customer->status='active';
        }); //se utiliza para que antes de que se guarde el nuevo customer en la base de datos se le agregue active al status
    }


}
