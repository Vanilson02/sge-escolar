<?php

namespace App\Http\Controllers;
use App\Professor;
use Illuminate\Http\Request;
use DB;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Professor $model)
    {
        return view('professores.index', ['professores' => $model->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $prof = DB::table('professor')->where('NOME','=',$request->nome)->get();

        if($prof->isEmpty()){

            $professor = new Professor;
            $professor->nome = $request->nome;
            $professor->save();
            return redirect()->route('Professor.index')->withStatus(('Professor Cadastrado Com Sucesso.'));
        }else{

            return redirect()->route('Professor.create')->withStatus(('Erro: professor já está cadastrado!'));

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
        $professor=Professor::findOrFail($id);
        return view('professores.edit', compact('professor'));
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
        $professor=Professor::findOrFail($id);
        $professor->nome = $request->nome;
        $professor->save();


        return redirect()->route('Professor.index')->withStatus(__('Professor Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor=Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('Professor.index')->withStatus(__('Professor excluido com sucesso.'));
    }
}
