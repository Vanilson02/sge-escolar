<?php

namespace App\Http\Controllers;
use App\Turma;
use App\Curso;
use App\Semestre;
use Illuminate\Http\Request;
use DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Turma $model)
    {   
        $cursos = Curso::All();
        $semestres = Semestre::All();
        return view('turmas.index', ['turmas' => $model->paginate(10)] ,compact('cursos','semestres')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cursos = DB::table('curso')->pluck("NOMECURSO","CDCURSO");
        $semestres = DB::table('semestre')->pluck("ANO","CDSEMESTRE");
        return view('turmas.create',compact('cursos','semestres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = DB::table('turma')->where('NOMETURMA','=',$request->nometurma)->get();

        if($t->isEmpty()){
            $turma = new Turma;
            $turma->nometurma = $request->nometurma;
            $turma->cdsemestre = $request->cdsemestre;
            $turma->cdcurso = $request->cdcurso;
            $turma->save();
            return redirect()->route('Turma.index')->withStatus(('Turma Cadastrada Com Sucesso.'));

        }else{
            return redirect()->route('Turma.create')->withStatus(('Erro: turma já está cadastrada!'));

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
         
        $cursos = DB::table('CURSO')->pluck("NOMECURSO","CDCURSO");
        $semestres = DB::table('SEMESTRE')->pluck("ANO","CDSEMESTRE");

        $turma =Turma::findOrFail($id);
        return view('turmas.edit',compact('turma', 'cursos','semestres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turma=Turma::findOrFail($id);
        $turma->nometurma = $request->nometurma;
        $turma->cdsemestre = $request->cdsemestre;
        $turma->cdcurso = $request->cdcurso;
        $turma->save();


        return redirect()->route('Turma.index')->withStatus(__('Turma Alterada Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma=Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('Turma.index')->withStatus(__('Turma excluida com sucesso.'));
    }
}
