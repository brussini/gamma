<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BusinessUnit extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mis_code',
        'description',
        'bu',
        'segment',
        'code',
    ];

    public static function getBusinessUnit()
    {
        $records =  DB::table('business_units')->select('id','mis_code','description','bu','segment','code');
        return $records;
    }
}
