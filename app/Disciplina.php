<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'DISCIPLINA';
    protected $fillable = ['nomedisciplina', 'cdprofessor','valor'];
    protected $guarded =['CDDISCIPLINA','CDPROFESSOR'];
    public $timestamps = false;
    protected $primaryKey = 'CDDISCIPLINA';

    public function professor(){
    	return $this->belongsTo('App\Professor', 'CDPROFESSOR');
    } 

    public function matdisciplinas(){

    	return $this->hasMany('App\Matdisciplinas')
    	->select(\DB::raw('CDDISCIPLINA'))
    	->groupBy('CDDISCIPLINA')
    	->ordeBy('CDDISCIPLINA');
    }

}
