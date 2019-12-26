@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header box-header-primary">
                <h4 class="box-title ">{{ __('Matriculas / Disciplinas') }}</h4>
                <p class="box-category"> {{ __('Matriculas nas Disciplinas') }}</p>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="consulta" id="txt_consulta" placeholder="Consultar por disciplina, aluno, status ou valor..." type="text" class="form-control">
                </div>
              </div>
              <div class="box-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="fas fa-window-close"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="box">
                  <div class="box-header">
                    <a href="{{ route('Matdisciplina.create') }}" class="box-title btn btn-sm btn-primary">{{ __('Nova Matricula') }}</a>
                  </div>

                  <div class="box-body">
                    <table id="tabela" class="table table-hover">
                      <thead class=" text-primary">
                      
                        <th>
                            {{ __('Disciplina') }}
                        </th>
                        
                        <th>
                          {{ __('Aluno') }}
                        </th>
                      
                        <th>
                          {{ __('Status') }}
                        </th>

                        <th>
                          {{ __('Média') }}
                        </th>

                        <th>
                          {{ __('Valor') }}
                        </th>

                        <th>
                          {{ __('Situação') }}
                        </th>
                        <th class="text-right">
                          {{ __('Ações') }}
                        </th>
                      </thead>
                      <tbody>
                        @foreach($matdisciplinas as $matdisciplina)
                          <tr>
                            
                            <td>
                              {{ $matdisciplina->disciplinas->NOMEDISCIPLINA}}
                            </td>
                            
                            @foreach($matriculas as $matricula)

                              @if($matricula->CDMATRICULA == $matdisciplina->alunos->CDMATRICULA)

                                @foreach($alunos as $aluno)
                                
                                  @if($aluno->CDALUNO == $matricula->CDALUNO)

                                    <td>
                                      {{$aluno->NOME}}
                                    </td>
                                  @endif

                                @endforeach
                              @endif
                            @endforeach
                            
                            <td>
                              @if($matdisciplina->STATUS=='MT'){{{'Matriculado'}}}@else{{{'Trancado'}}}@endif
                            </td>

                            <td>
                              {{ $matdisciplina->CDMATRICULA}}
                            </td>

                            <td>
                              {{ $matdisciplina->VALOR}}
                            </td>
                            
                            <td>
                              {{ $matdisciplina->SITUACAO}}
                            </td>
                            <td class="td-actions text-right">
                            
                                <form action="{{ route('Matdisciplina.destroy', $matdisciplina->CDMATDISCIPLINA) }}" method="post">
                                    @csrf
                                    @method('delete')
                                
                                    <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('Matdisciplina.edit', $matdisciplina->CDMATDISCIPLINA) }}" data-original-title="" title="">
                                      <i class="fa fa-edit"></i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-default btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o Disciplina $matdisciplina->disciplinas?") }}') ? this.parentElement.submit() : ''">
                                        <i class="fa fa-trash-alt"></i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </form>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                      <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" arial-label="teste">
                          {{$matdisciplinas->links()}}
                        </nav>
                      </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection