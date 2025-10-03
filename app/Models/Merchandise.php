<?php
namespace App\Models;  







use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Merchandise extends Model

{

    use HasFactory;


    protected $table = 'merchandise';



    protected $fillable = [

        'name',

        'description',

        'price',

        'image',

        'category',

        'is_active'

    ];  



    protected $casts = [ 

        'price' => 'decimal:0',

        'is_active' => 'boolean'

    ];



    // Scope untuk merchandise aktif

    public function scopeActive($query)

    {    {

        return $query->where('is_active', true);

    }    }



    // Categories available 

    public static function getCategories()

    {    

        return [ 
            'Jersey' => 'Jersey',     

            'Jaket' => 'Jaket',

            'Kaos' => 'Kaos',

            'Celana' => 'Celana',

            'Aksesoris' => 'Aksesoris'

        ];   

    }    

}
