<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $table = 'SEMESTRE';
    protected $fillable = ['ano'];
    protected $guarded =['CDSEMESTRE'];
    public $timestamps = false;
    protected $primaryKey = 'CDSEMESTRE'; 
}
