<?php

namespace App\Http\Controllers;
use App\Curso;
use DB;
use Illuminate\Http\Request;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Curso $model)
    {
     return view('cursos.index', ['cursos' => $model->paginate(10)]);     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $c = DB::table('curso')->where('NOMECURSO','=',$request->nomecurso)->get();

        if($c->isEmpty()){
            $curso = new Curso;
            $curso->nomecurso = $request->nomecurso;
            $curso->valorcurso = $request->valorcurso;
            $curso->save();
            return redirect()->route('Curso.index')->withStatus(('Curso Cadastrado Com Sucesso.'));
        }else{
            return redirect()->route('Curso.create')->withStatus(('Erro: curso já possui cadastro !'));

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
        $curso =Curso::findOrFail($id);
        return view('cursos.edit',compact('curso'));
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
        $curso=Curso::findOrFail($id);
        $curso->nomecurso = $request->nome;
        $curso->valorcurso = $request->valorcurso;
        $curso->save();


        return redirect()->route('Curso.index')->withStatus(__('Curso Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $curso=Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('Curso.index')->withStatus(__('Curso excluido com sucesso.'));
    }
}
