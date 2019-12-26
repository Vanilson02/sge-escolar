<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
     protected $table = 'PROFESSOR';
      protected $fillable = ['nome'];
    protected $guarded =['CDPROFESSOR'];
    public $timestamps = false;
    protected $primaryKey = 'CDPROFESSOR'; 

    public function Disciplina(){
    	return $this->hasMany('App\Disciplina');
    }
}
