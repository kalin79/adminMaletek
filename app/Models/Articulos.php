<?php

namespace App\Models;

use App\Traits\Audit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Articulos extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Audit;

    protected $table = 'articulos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['created_at', 'updated_at','deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'slug', 'sub_titulo', 'imagen_banner', 'imagen_banner_mobile','fecha','etiqueta','imagen_portada','descripcion_corta','contenido',  'active','created_user_id','updated_user_id','deleted_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'poster' => 'string',
        'button' => 'string',
        'link' => 'string',
        'position' => 'integer',
        'active' => 'boolean',
        'poster_mobile' => 'string',
    ];

    public static function storeValidation($request)
    {
        return [
            'title' => 'required',
            //'poster' => 'required',
            //'position' => 'numeric|required',

        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'required',
            //'poster' => 'required',
            //'position' => 'numeric|required',

        ];
    }

    public static function attributesValidation()
    {
        return [
            'poster' => 'poster',
            'position' => 'position',

        ];
    }

    public static function finterAndPaginate()
    {
        return Blogs::orderBy('id', 'asc')
            ->paginate("20");
    }

    public function scopeActivos($query)
    {
        return $query->where('active', 1);
    }

    public function articulos()
    {
        return $this->hasMany(Articulos::class, 'blog_id');
    }



    public function updateImages($images)
    {
        if ($images) {
            $destinationPath = public_path('/images/articulos/'.$this->id);
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $file = $images;
            //$imagename = time() . "-sl." . $file->getClientOriginalExtension();
            $imagename = $this->id . "-desk-" . time() . '.' . $images->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
            $this->update(['imagen_banner'=>$imagename]);
        }
    }

    public function updateImageMobile($images)
    {
        if ($images) {
            $destinationPath = public_path('/images/articulos/'.$this->id);
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $file = $images;
            //$imagename = time() . "-sl." . $file->getClientOriginalExtension();
            $imagename = $this->id . "-mb-" . time() . '.' . $images->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
            $this->update(['imagen_banner_mobile'=>$imagename]);
        }
    }
    public function updateImagePortada($images)
    {
        if ($images) {
            $destinationPath = public_path('/images/articulos/'.$this->id);
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $file = $images;
            //$imagename = time() . "-sl." . $file->getClientOriginalExtension();
            $imagename = $this->id . "-mb-" . time() . '.' . $images->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
            $this->update(['imagen_portada'=>$imagename]);
        }
    }
}
