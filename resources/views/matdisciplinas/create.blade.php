@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Matdisciplina.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="box">

              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Nova Matricula Disciplinas') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('Disciplina.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>

              <div class="box-body">
                 @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="fas fa-window-close"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">

                  <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <select class="form-control" id="curso" name="cdcurso" required="true" aria-required="true">
                        <option value=""></option>
                      @foreach ($cursos as $curso) 
                        <option value="{{ $curso->CDCURSO }}">{{ $curso->NOMECURSO }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <label class="col-sm-2 col-form-label">{{ __('Turma') }}</label>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control"  id="turma" name="cdturma" required="true" aria-required="true">
                        <option value=""></option>
                      @foreach ($turmas as $turma) 
                        <option value="{{ $turma->CDTURMA }}">{{ $turma->NOMETURMA }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                </br>
                </br>         
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Disciplinas') }}</label>     
                  <div class="col-sm-3">
                    <div class="form-group" id="disciplina">  
                                                

                    </div>    
                  </div>
                </div>
                
                </br>
                </br>
                
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Matricula') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdmatricula"required="true" aria-required="true">
                        <option value=""></option>
                      @foreach ($matriculas as $matricula) 
                        <option value="{{ $matricula->CDMATRICULA }}">{{$matricula->NOME}}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select class="form-control" name="status"required="true" aria-required="true">
                        <option value="MT">{{'Matriculado'}}</option>
                        <option value="AT">{{'Trancado'}}</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="valor" id="input-name" min="0.00" step="0.01" type="number" placeholder="{{ __('Valor') }}" value="{{ old('nome') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

              </div> 
                
                
              <div class="box-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Adicionar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  
@endsection