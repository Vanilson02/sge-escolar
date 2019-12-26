@extends('adminlte::page')

@section('content')
   
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header box-header-primary">
                <h4 class="box-title ">{{ __('Professores') }}</h4>
                <p class="box-category"> {{ __('Professores atualmente cadastrados') }}</p>

                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                  <input name="consulta" id="txt_consulta" placeholder="Consultar por nome..." type="text" class="form-control">
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
                    <a href="{{ route('Professor.create') }}" class="box-title btn btn-sm btn-primary">{{ __('Novo Professor') }}</a>
                  </div>

                  <div class="box-body">
                    <table id="tabela" class="table table-hover">
                      <thead class=" text-primary">
                      
                        <th>
                            {{ __('Nome') }}
                        </th>
                        <th class="text-right">
                          {{ __('Ações') }}
                        </th>
                      </thead>
                      <tbody>
                        @foreach($professores as $professor)
                          <tr>
                            
                            <td>
                              {{ $professor->NOME}}
                            </td>
                            <td class="td-actions text-right">
                            
                                <form action="{{ route('Professor.destroy', $professor->CDPROFESSOR) }}" method="post">
                                    @csrf
                                    @method('delete')
                                
                                    <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('Professor.edit', $professor->CDPROFESSOR) }}" data-original-title="" title="">
                                      <i class="fa fa-edit"></i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-default btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o Professor(a) $professor->NOME?") }}') ? this.parentElement.submit() : ''">
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
                          {{$professores->links()}}
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