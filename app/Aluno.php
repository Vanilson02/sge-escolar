<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'ALUNO';
    protected $fillable = ['nome', 'nmatricula','statuss'];
    protected $guarded =['CDALUNO'];
    public $timestamps = false;
    protected $primaryKey = 'CDALUNO'; 
     //public function matricula(){
    	//return $this->hasMany('App\Matricula');
    //}
     public function matdisciplina(){
    	//return $this->belongsToMany('App\Matricula','CDALUNO','CDMATRICULA','CDMATDISCIPLINA');
    	 //return $this->hasMany(Aluno::class, 'CDMATDISCIPLINA', 'CDMATRICULA');
    	 return $this->belongsToMany('App\Matdisciplina','MATRICULA', 'CDALUNO', 'CDMATDISCIPLINA')->withPivot(['CDMATRICULA']);
    } 
}
