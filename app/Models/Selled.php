<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Selled extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Sell';
    
    protected $fillable = [
'id','model','brand','notes','proDate','type','energie','kilometrage','price','transmission','couleur','papiers','url','date_annonce','location','adDate','ch','tdi','litre','notes_moteur',


    ];
}
