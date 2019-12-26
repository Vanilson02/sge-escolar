<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matdisciplinas extends Model
{
    protected $table = 'MATDISCIPLINA';
    protected $fillable = ['CDDISCIPLINA', 'CDMATRICULA','SITUACAO','MEDIA','STATUS','VALOR'];
    protected $guarded =['CDDISCIPLINA','CDPROFESSOR'];
    public $timestamps = false;
    protected $primaryKey = 'CDMATDISCIPLINA';

    public function disciplinas(){

    	return $this->belongsTo('App\Disciplina','CDDISCIPLINA');
    }

    public function professor(){

        return $this->belongsTo('App\Professor','CDPROFESSOR');
    }
    
    public function alunos(){
    	return $this->belongsTo('App\Matricula','CDMATRICULA');
    	 
    } 

}
