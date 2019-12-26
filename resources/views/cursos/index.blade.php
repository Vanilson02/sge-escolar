@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header box-header-primary">
                <h4 class="box-title ">{{ __('Cursos') }}</h4>
                <p class="box-category"> {{ __('Cursos atualmente cadastrados') }}</p>
                
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="consulta" id="txt_consulta" placeholder="Consultar por curso ou valor..." type="text" class="form-control">
                </div>
              </div>
              <div class="box-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-info">
                        <button type="button" class="close btn btn-default" data-dismiss="alert" aria-label="Close">
                          <i class="fas fa-window-close"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="box">
                  <div class="box-header">
                    <a href="{{ route('Curso.create') }}" class="box-title btn btn-sm btn-primary">{{ __('Novo Curso') }}</a>
                  </div>

                  <div class="box-body">
                    <table id="tabela" class="table table-hover">
                      <thead class=" text-primary">
                      
                        <th>
                            {{ __('Curso') }}
                        </th>
                        <th>
                          {{ __('Valor') }}
                        </th>
                        <th class="text-right">
                          {{ __('Ações') }}
                        </th>
                      </thead>
                      <tbody>
                        @foreach($cursos as $curso)
                          <tr>
                            
                            <td>
                              {{ $curso->NOMECURSO}}
                            </td>
                            <td>
                              {{ $curso->VALORCURSO}}
                            </td>
                            <td class="td-actions text-right">
                            
                                <form action="{{ route('Curso.destroy', $curso->CDCURSO) }}" method="post">
                                    @csrf
                                    @method('delete')
                                
                                    <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('Curso.edit', $curso->CDCURSO) }}" data-original-title="" title="">
                                      <i class="fa fa-edit"></i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-default btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o Curso de $curso->NOMECURSO?") }}') ? this.parentElement.submit() : ''">
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
                          {{$cursos->links()}}
                        </nav>
                    </div> 
                  </div>
                </div>
                <!-- /.box -->     
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
  </div>

@endsection