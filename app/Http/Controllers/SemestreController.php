<?php

namespace App\Http\Controllers;
use App\Semestre;
use DB;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Semestre $model)
    {
         return view('semestres.index', ['semestres' => $model->paginate(10)]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semestres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $s = DB::table('semestre')->where('ANO','=',$request->ano)->get();

        if($s->isEmpty()){
            $semestre = new Semestre;
            $semestre->ano = $request->ano;
            $semestre->save();
            return redirect()->route('Semestre.index')->withStatus(('Semestre Cadastrado Com Sucesso.'));
        }else{
            return redirect()->route('Semestre.create')->withStatus(('Erro: Semestre já estava cadastrado!'));
           
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
        $semestre =Semestre::findOrFail($id);
        return view('semestres.edit',compact('semestre'));
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
        $semestre=Semestre::findOrFail($id);
        $semestre->ano = $request->ano;
        $semestre->save();


        return redirect()->route('Semestre.index')->withStatus(__('semestre Alterado Com Sucesso.'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semestre=Semestre::findOrFail($id);
        $semestre->delete();

        return redirect()->route('Semestre.index')->withStatus(__('Semestre excluido com sucesso.'));
   
            }
}
