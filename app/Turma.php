<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Turma extends Model
{
    protected $table = 'TURMA';
    protected $fillable = ['NOMETURMA','CDSEMESTRE','CDCURSO'];
    protected $guarded =['CDTURMA'];
    public $timestamps = false;
    protected $primaryKey = 'CDTURMA'; 

   
}
