<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    use HasFactory;
    protected $table ="pays";//definir campos//
    protected $primaryKey= "id";
    protected $fillable=[ 'amount', 'date', 'billid', 'customer_id', 'branch_id'];

    protected static function booted() //solo mostrar los que digan active en la base de datos
    {
        static::addGlobalScope('sstatus', function (Builder $builder) {
            $builder->where(['status' => 'active']);
        }); 
    }
}
