<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'CURSO';
    protected $fillable = ['nomecurso','valorcurso'];
    protected $guarded =['CDCURSO'];
    public $timestamps = false;
    protected $primaryKey = 'CDCURSO'; 

}
