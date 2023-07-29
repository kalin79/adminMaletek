<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoRubro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'producto_rubros';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto_id', 'rubro_id'
    ];


    public function rubro(){
        return $this->hasOne(Rubros::class,'id','rubro_id');
    }

    public function producto(){
        return $this->hasOne(Producto::class,'id','producto_id');
    }
}
