<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Nota extends Model
{
    protected $table = 'NOTA';
    protected $fillable = ['cdmatdisciplina', 'nota','referencia'];
    protected $guarded =['CDNOTA','CDMATDISCIPLINA'];
    public $timestamps = false;
    protected $primaryKey = 'CDNOTA';

    public function alunodisciplina(){
    	$matriculas = DB::table('MATDISCIPLINA')->join('DISCIPLINA','MATDISCIPLINA.CDDISCIPLINA' ,'=', 'DISCIPLINA.CDDISCIPLINA')
          ->join('MATRICULA','MATDISCIPLINA.CDMATRICULA','=','MATRICULA.CDMATRICULA')
          ->join('ALUNO','MATRICULA.CDALUNO','=','ALUNO.CDALUNO')
          ->get();
          return('matriculas');
    }
}
