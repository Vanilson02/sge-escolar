<?php

namespace App\Http\Controllers;
use App\Matdisciplinas;
use App\Matricula;
use App\Professor;
use App\Curso;
use App\Turma;
use App\Aluno;
use App\Disciplina;
use DB;
use Illuminate\Http\Request;

class MatdisciplinaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Matdisciplinas $model)
    {
        $alunos = Aluno::All();
        $matriculas = Matricula::All();
         return view('matdisciplinas.index', ['matdisciplinas' => $model->paginate(10)],compact('alunos','matriculas'));     
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
        $alunos= Aluno::all();
        $professores = DB::table('PROFESSOR')->pluck("NOME","CDPROFESSOR");
        $cursos = Curso::all();
        $turmas = Turma::all();
    	$disciplinas = DB::table('DISCIPLINA')->pluck("NOMEDISCIPLINA","CDDISCIPLINA");
    	$matriculas = DB::table('MATRICULA')->join('ALUNO','MATRICULA.CDALUNO' ,'=', 'ALUNO.CDALUNO')->get();
        return view('matdisciplinas.create',compact('professores','cursos','turmas','disciplinas','matriculas','alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $disciplinas=$request->get('cddisciplina');
       
       if (!empty($disciplinas)) {
           # code...
      
            foreach ($request->cddisciplina as $disciplina) {   
                $matdisciplinas = new Matdisciplinas;
                $matdisciplinas->cddisciplina = $disciplina;
                $matdisciplinas->cdmatricula = $request->cdmatricula;
                $matdisciplinas->status = $request->status;
                $matdisciplinas->valor = $request->valor;
                $matdisciplinas->save();
            }

            return redirect()->route('Matdisciplina.index')->withStatus(('Matricula na Disciplina Realizada Com Sucesso.'));
        }

        return redirect()->route('Matdisciplina.create')->withStatus(('Matricula na Disciplina ocorreu um erro.'));
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
        $matdisciplina =Matdisciplinas::findOrFail($id);
        $professores = DB::table('PROFESSOR')->pluck("NOME","CDPROFESSOR");
        $disciplinas = DB::table('DISCIPLINA')->pluck("NOMEDISCIPLINA","CDDISCIPLINA");
        $matriculas = DB::table('MATRICULA')->join('ALUNO','MATRICULA.CDALUNO' ,'=', 'ALUNO.CDALUNO')->get();
        return view('matdisciplinas.edit',compact('matdisciplina','professores','disciplinas','matriculas'));
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
        $matdisciplinas=Matdisciplinas::findOrFail($id);
        $matdisciplinas->cddisciplina = $request->cddisciplina;
        $matdisciplinas->cdmatricula = $request->cdmatricula;
        $matdisciplinas->status = $request->status;
        $matdisciplinas->valor = $request->valor;
        $matdisciplinas->save();


        return redirect()->route('Matdisciplina.index')->withStatus(__('Curso Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matdisciplinas=Matdisciplinas::findOrFail($id);
        $matdisciplinas->delete();

        return redirect()->route('Matdisciplina.index')->withStatus(__('Matricula na disciplina excluida com sucesso.'));
    }

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

    

}
