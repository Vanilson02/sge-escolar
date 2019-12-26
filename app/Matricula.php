<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    
    protected $table = 'MATRICULA';
    protected $fillable = ['cdcurso', 'cdaluno','cdsemestre','valor'];
    protected $guarded =['CDMATRICULA'];
    public $timestamps = false;
    protected $primaryKey = 'CDMATRICULA';
    public function aluno(){
    	return $this->belongsTo('App\Aluno', 'CDALUNO');
    }
    public function curso(){
    	return $this->belongsTo('App\Curso', 'CDCURSO');
    }
    public function semestre(){
    	return $this->belongsTo('App\Semestre', 'CDSEMESTRE');
    }

    public function matdisciplinas(){
        return $this->belongsToMany('App\Matdisciplinas','CDALUNO','CDMATDISCIPLINA','CDMATRICULA');
    }
}
