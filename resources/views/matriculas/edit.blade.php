@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Matricula.update', $matricula) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="box ">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Editar Matricula') }}</h4>
                <div class="col-md-12 text-right">
                  <a href="{{ route('Matricula.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>    
                </div>
                
              </div>
              <div class="box-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdcurso">                     
                        <option value="{{$matricula->CDCURSO}}">{{$matricula->curso->NOMECURSO}}</option>
                      @foreach ($cursos as $curso => $value)
                        <option value="{{ $curso }}">{{ $value }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Aluno') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdaluno">                     
                        <option value="{{$matricula->CDALUNO}}">{{$matricula->aluno->NOME}}</option>
                      @foreach ($alunos as $aluno => $value)
                        <option value="{{ $aluno}}">{{ $value }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Semestre') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control" name="cdsemestre">                     
                        <option value="{{$matricula->CDSEMESTRE}}">{{$matricula->semestre->ANO}}</option>
                      @foreach ($semestres as $semestre => $value)
                        <option value="{{ $semestre}}">{{ $value }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="valor" step="0.01" min="0.00" id="input-name" type="number" placeholder="{{ __('Valor') }}" value="{{ old('Valor', $matricula->VALOR) }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="box-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection