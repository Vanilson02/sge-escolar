<?php

namespace App\Http\Controllers;
use App\Nota;
use App\Curso;
use App\Aluno;
use App\Turma;
use App\Disciplina;
use App\Matricula;
use App\Matdisciplina;
use DB;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Nota $model)
    {   
        $matriculas = DB::table('MATDISCIPLINA')->join('DISCIPLINA','MATDISCIPLINA.CDDISCIPLINA' ,'=', 'DISCIPLINA.CDDISCIPLINA')
          ->join('MATRICULA','MATDISCIPLINA.CDMATRICULA','=','MATRICULA.CDMATRICULA')
          ->join('ALUNO','MATRICULA.CDALUNO','=','ALUNO.CDALUNO')
          ->get();
        return view('notas.index', ['notas' => $model->paginate(10)],compact('matriculas'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $cursos = Curso::All();
        $disciplinas = Disciplina::All();
        $turmas = Turma::All();
        $alunos = Aluno::All();

        $matriculas = DB::table('MATDISCIPLINA')->join('DISCIPLINA','MATDISCIPLINA.CDDISCIPLINA' ,'=', 'DISCIPLINA.CDDISCIPLINA')
          ->join('MATRICULA','MATDISCIPLINA.CDMATRICULA','=','MATRICULA.CDMATRICULA')
          ->join('ALUNO','MATRICULA.CDALUNO','=','ALUNO.CDALUNO')
          ->get();
        return view('notas.create',compact('matriculas','cursos','disciplinas','turmas','alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas = new Nota;
        $notas->cdmatdisciplina = $request->cdmatdisciplina;
        $notas->nota = $request->nota;
        $notas->referencia = $request->referencia;
        $notas->save();
         return redirect()->route('Nota.index')->withStatus(('Nota lançada Com Sucesso.'));
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
        $notas=Nota::findOrFail($id);
        $matriculas = DB::table('MATDISCIPLINA')->join('DISCIPLINA','MATDISCIPLINA.CDDISCIPLINA' ,'=', 'DISCIPLINA.CDDISCIPLINA')
          ->join('MATRICULA','MATDISCIPLINA.CDMATRICULA','=','MATRICULA.CDMATRICULA')
          ->join('ALUNO','MATRICULA.CDALUNO','=','ALUNO.CDALUNO')
          ->join('NOTA','NOTA.CDMATDISCIPLINA','=','MATDISCIPLINA.CDMATDISCIPLINA')
          ->get();

        return view('notas.edit',compact('notas','matriculas'));
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
        $notas=Nota::findOrFail($id);
        $notas->cdmatdisciplina = $request->cdmatdisciplina;
        $notas->nota = $request->nota;
        $notas->referencia = $request->referencia;
        $notas->save();
        return redirect()->route('Nota.index')->withStatus(('Nota Editada Com Sucesso.'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notas=Nota::findOrFail($id);
        $notas->delete();
         return redirect()->route('Nota.index')->withStatus(('Nota Excluida Com Sucesso.'));
    }
    
    // funcoes para obter turma, disciplina, aluno
    public function getTurma(Request $request, $id){
        if($request->ajax()){
            $turmas = Turma::where('CDCURSO','=',$id)->get();
            return response()->json($turmas);
        }
    
    }

    public function getCurso(Request $request, $id){
        if($request->ajax()){
            
            $turma = Turma::findOrFail($id);

            $cursos = Curso::where('CDCURSO' ,'=', $turma->CDCURSO)->get();
            
            return response()->json($cursos);
        }
    
    }

    public function getDisciplina(Request $request, $id){
        if($request->ajax()){
            
            $disciplinas = Disciplina::where('CDTURMA' ,'=', $id)->get();
            
            return response()->json($disciplinas);
        }
    
    }

    public function getAluno(Request $request, $id){
        
        if($request->ajax()){
        
            $alunos = DB::select('select aluno.CDALUNO, aluno.NOME, disciplina.NOMEDISCIPLINA  from aluno,matricula,matdisciplina,disciplina where aluno.CDALUNO = matricula.CDALUNO AND
            matricula.CDMATRICULA = matdisciplina.CDMATRICULA and disciplina.CDDISCIPLINA = matdisciplina.CDDISCIPLINA AND
            disciplina.CDDISCIPLINA = ?',[$id]);
            
            return response()->json($alunos);
        }
    
    }
}
