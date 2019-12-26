<?php

namespace App\Http\Controllers;
use App\Matricula;
use App\Aluno;
use App\Semestre;
use App\Turma;
use App\Curso;
use Illuminate\Http\Request;
use DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Matricula $model)
    {
        return view('matriculas.index', ['matriculas' => $model->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alunos = DB::table('ALUNO')->pluck("NOME","CDALUNO");
        $semestres = DB::table('SEMESTRE')->pluck("ANO","CDSEMESTRE");
        $cursos = DB::table('CURSO')->pluck("NOMECURSO","CDCURSO");
        return view('matriculas.create',compact('alunos','semestres','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $aluno = DB::table('matricula')->where('CDALUNO','=',$request->cdaluno)->get();
        $curso = DB::table('matricula')->where('CDCURSO','=',$request->cdcurso)->get();


        if($aluno->isEmpty() || $curso->isEmpty()){
            $matricula = new Matricula;
            $matricula->cdaluno = $request->cdaluno;
            $matricula->cdcurso = $request->cdcurso;
            $matricula->cdsemestre = $request->cdsemestre;
            $matricula->valor = $request->valor;
            $matricula->save();
            return redirect()->route('Matricula.index')->withStatus(('Matricula Cadastrada Com Sucesso.'));
        }else{
            return redirect()->route('Matricula.create')->withStatus(('Erro: Aluno já matriculado neste curso!'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $matricula=Matricula::findOrFail($id);
        $alunos = DB::table('ALUNO')->pluck("NOME","CDALUNO");
        $semestres = DB::table('SEMESTRE')->pluck("ANO","CDSEMESTRE");
        $cursos = DB::table('CURSO')->pluck("NOMECURSO","CDCURSO");
        return view('matriculas.edit',compact('matricula','alunos','semestres','cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $matricula=Matricula::findOrFail($id);
        $matricula->cdaluno = $request->cdaluno;
        $matricula->cdcurso = $request->cdcurso;
        $matricula->cdsemestre = $request->cdsemestre;
        $matricula->valor = $request->valor;
        $matricula->save();
         return redirect()->route('Matricula.index')->withStatus(('Matricula Atualizada Com Sucesso.'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->delete();
        return redirect()->route('Matricula.index')->withStatus(('Matricula Deletada Com Sucesso.')); 
    }

    
}
