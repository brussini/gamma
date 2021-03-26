<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dormant extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_code',
        'cust_ac_no',
        'ac_desc',
        'cif',
        'ac_stat_dormant',
        'eti_bus_seg',
    ];

    
}
