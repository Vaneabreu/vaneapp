<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class customer extends Model
{
    use HasFactory;
    protected $table ="customers";//definir campos//
    protected $primaryKey= "id";
    protected $fillable=[
         'customer_name', 'address', 'phone', 'pending_debt', 'itbis', 'total'
    ];

    protected static function booted() //solo mostrar los que digan active en la base de datos u otros detalles, se utilizn los where
    {
        static::addGlobalScope('pending debt',  function (Builder $builder) {
            $builder/* ->whereNotBetween('pending debt', [100, 200]) */->where(['status' => 'active']); //menor que 100 y 200
        });

        static::saving(function($customer){ 
            $customer->status='active';
        }); //se utiliza para que antes de que se guarde el nuevo customer en la base de datos se le agregue active al status
    }

    public function branches(){
        return $this->belongsToMany(branches::class, 'branches', 'id', 'branch_id');
    }

    public function getAvatarUrl()
    {
    if ($this->photo_extension)
        return asset('customer-image/'.$this->id.'.'.$this->photo_extension);

    return asset('customer-image/default.gif');
    }

    
}
