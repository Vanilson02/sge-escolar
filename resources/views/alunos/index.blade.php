@extends('adminlte::page')

@section('content')

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header box-header-primary">
              <h4 class="box-title ">{{ __('Alunos') }}</h4>
              <p class="box-category"> {{ __('Alunos atualmente cadastrados') }}</p>

              <div class="form-group input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input name="consulta" id="txt_consulta" placeholder="Consultar por nome, matricula ou status..." type="text" class="form-control">
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
                <!-- /.row -->
                <div class="box">
                  <div class="box-header">
                    <a href="{{ route('Aluno.create') }}" class="box-title btn btn-sm btn-primary">{{ __('Novo Aluno') }}</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    
                      <table id="tabela" class="table table-hover">
                        <thead class=" text-primary">
                        
                          <th>
                              {{ __('Nome') }}
                          </th>
                          <th>
                            {{ __('Matricula') }}
                          </th>
                          <th>
                            {{ __('Status') }}
                          </th>
                          <th class="text-right">
                            {{ __('Ações') }}
                          </th>
                        </thead>
                        <tbody>
                          @foreach($alunos as $aluno)
                            <tr>
                              
                              <td>
                                {{ $aluno->NOME}}
                              </td>
                              <td>
                                {{ $aluno->NMATRICULA }}
                              </td>
                              <td>
                                @if($aluno->STATUSS==0){{{'Inativo'}}}@else{{{'Ativo'}}}@endif
                              </td>
                              <td class="td-actions text-right">
                              
                                  <form action="{{ route('Aluno.destroy', $aluno->CDALUNO) }}" method="post">
                                      @csrf
                                      @method('delete')
                                  
                                      <a rel="tooltip" class="btn btn-default btn-link" href="{{ route('Aluno.edit', $aluno->CDALUNO) }}" data-original-title="" title="">
                                        <span class="fa fa-edit"></span>
                                        <div class="ripple-container"></div>
                                      </a>
                                      <button type="button" class="btn btn-default btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o Aluno(a) $aluno->NOME?") }}') ? this.parentElement.submit() : ''">
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
                          {{$alunos->links()}}
                        </nav>
                      </div>
                    
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-12  -->
      </div>
      <!-- /.row -->
    </div>
  </section>
@endsection


