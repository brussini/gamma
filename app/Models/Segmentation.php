<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Segmentation extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'br',
        'gl_code',
        'ccy_code',
        'cust_ac_no',
        'cust_no',
        'ac_desc',
        'account_class',
        'cust_mis_1',
        'cust_mis_2',
        'comp_mis_4',
        'cust_mis_7',
        'solde',
        'bu',
        'segment',
        'type',

    ];

    
}
