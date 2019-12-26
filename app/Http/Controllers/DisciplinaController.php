<?php

namespace App\Http\Controllers;
use App\Disciplina;
use App\Professor;
use Illuminate\Http\Request;
use DB;
class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Disciplina $model)
    {
      return view('disciplinas.index', ['disciplinas' => $model->paginate(10)]);   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $professores = DB::table('PROFESSOR')->pluck("NOME","CDPROFESSOR");
        return view('disciplinas.create',compact('professores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $d = DB::table('disciplina')->where('NOMEDISCIPLINA','=',$request->nome)->get();

        if($d->isEmpty()){
            $disciplina = new Disciplina;
            $disciplina->nomedisciplina = $request->nome;
            $disciplina->cdprofessor = $request->cdprofessor;
            $disciplina->valor = $request->valor;
            $disciplina->save();
            return redirect()->route('Disciplina.index')->withStatus(('Disciplina Cadastrada Com Sucesso.'));

        }else{

            return redirect()->route('Disciplina.create')->withStatus(('Erro: Disciplina já cadastrada !'));

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
        $disciplina=Disciplina::findOrFail($id);
         $professores = DB::table('PROFESSOR')->pluck("NOME","CDPROFESSOR");
        return view('disciplinas.edit',compact('disciplina','professores'));
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
        $disciplina=Disciplina::findOrFail($id);
        $disciplina->nomedisciplina = $request->nomedisciplina;
        $disciplina->cdprofessor= $request->cdprofessor;
        $disciplina->valor = $request->valor;
        $disciplina->save();


        return redirect()->route('Disciplina.index')->withStatus(__('Disciplina Alterada Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplina=Disciplina::findOrFail($id);
        $disciplina->delete();

        return redirect()->route('Disciplina.index')->withStatus(__('Disciplina excluida com sucesso.'));
    }
}
