@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Nota.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="box">
              @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close btn btn-default" data-dismiss="alert" aria-label="Close">
                          <i class="fas fa-window-close"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Adicionar Notas') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Nota.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>

              <div class="box-body">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control" id="curson" name="cdcurso" required="true" aria-required="true">
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
                        <select class="form-control"  id="turman" name="cdturman" required="true" aria-required="true">
                          <option value=""></option>
                        @foreach ($turmas as $turma) 
                          <option value="{{ $turma->CDTURMA }}">{{ $turma->NOMETURMA }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                  </div>
                
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Disciplinas') }}</label>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="form-control"  id="disciplinan" name="cddisciplinan" required="true" aria-required="true">
                          <option value=""></option>
                        @foreach ($disciplinas as $disciplina) 
                          <option value="{{ $disciplina->CDDISCIPLINA }}">{{ $disciplina->NOMEDISCIPLINA }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                   
                    
                  
                    <label class="col-sm-2 col-form-label">{{ __('Aluno') }}</label>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <select class="form-control"  id="alunon" name="cdmatdisciplina" required="true" aria-required="true">
                          <option value=""></option>
                        
                          <option value=""></option>
                        
                        </select>
                      </div>
                    </div>
                  
                  </div>

                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nota') }}</label>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input class="form-control" name="nota" id="input-name" min="0.00" step="0.01" type="number" placeholder="{{ __('Nota') }}" value="{{ old('nome') }}" required="true" aria-required="true"/>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Referêrencia') }}</label>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <input class="form-control" name="referencia" id="input-name" type="text" placeholder="{{ __('Referêrencia') }}" value="{{ old('referencia') }}" required="true" aria-required="true"/>
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