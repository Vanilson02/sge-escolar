@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header box-header-primary">
                <h4 class="box-title ">{{ __('Turmas') }}</h4>
                <p class="box-category"> {{ __('Turmas cadastradas atualmente') }}</p>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="consulta" id="txt_consulta" placeholder="Consultar por nome da turma..." type="text" class="form-control">
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
                    <a href="{{ route('Turma.create') }}" class="box-title btn btn-sm btn-primary">{{ __('Nova Turma') }}</a>
                  </div>
                  <div class="box-body">
                    <table id="tabela" class="table table-hover">
                      <thead class=" text-primary">
                      
                        <th>
                          {{ __('Turma') }}
                        </th>
                        
                        <th>
                          {{ __('Curso') }}
                        </th>

                        <th>
                          {{ __('Semestre') }}
                        </th>

                        <th class="text-right">
                          {{ __('Ações') }}
                        </th>

                      </thead>

                      <tbody>

                        @foreach($turmas as $turma)
                          <tr>
                            
                            <td>
                              {{ $turma->NOMETURMA}}
                            </td>

                            @foreach($cursos as $curso)
                              @if($curso->CDCURSO == $turma->CDCURSO)
                                <td>
                                  {{$curso->NOMECURSO}}
                                </td>
                              @endif
                            @endforeach
                            

                            @foreach($semestres as $semestre)
                              @if($semestre->CDSEMESTRE == $turma->CDSEMESTRE)
                                <td>
                                  {{$semestre->ANO}}
                                </td>
                              @endif
                            @endforeach
                            <input type="hidden" value="{{$turma->CDCURSO}}" name="cdcurso"/>
                            <input type="hidden" value="{{$turma->CDSEMESTRE}}" name="cdsemestre"/>

                            <td class="td-actions text-right">
                            
                                <form action="{{ route('Turma.destroy', $turma->CDTURMA) }}" method="post">
                                    @csrf
                                    @method('delete')
                                
                                    <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('Turma.edit', $turma->CDTURMA) }}" data-original-title="" title="">
                                      <i class="fa fa-edit"></i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-default btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir a Turma $turma->NOMETURMA?") }}') ? this.parentElement.submit() : ''">
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
                          {{$turmas->links()}}
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