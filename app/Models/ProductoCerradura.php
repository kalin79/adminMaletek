<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoCerradura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'producto_cerraduras';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto_id', 'tipo_cerradura_id'
    ];


    public function tipoCerradura(){
        return $this->hasOne(Tipos::class,'id','tipo_cerradura_id');
    }

    public function producto(){
        return $this->hasOne(Producto::class,'id','producto_id');
    }
}
