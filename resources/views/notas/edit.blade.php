@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Nota.update', $notas) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="box ">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Editar Notas') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Nota.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>
              <div class="box-body ">
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Aluno/Disciplina') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <select class="form-control" name="cdmatdisciplina" readonly="readonly" required="true" aria-required="true">
                      @foreach ($matriculas as $matricula) 
                        @foreach ($notas as $nota)
                          if($matricula->CDMATDISCIPLINA == $nota->CDMATDISCIPLINA){
                            <option readonly="readonly" selected value="{{ $matricula->CDMATDISCIPLINA}}">{{$matricula->NOME}},{{$matricula->NOMEDISCIPLINA,}}</option>
                            
                          }
                        @endforeach
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('nota') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="nota" id="input-name" step="0.01" min="0" type="number" placeholder="{{ __('nota') }}" value="{{ old('nota', $notas->NOTA) }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Referencia') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input class="form-control" name="referencia" id="input-name" type="text" placeholder="{{ __('referencia') }}" value="{{ old('referencia', $notas->REFERENCIA) }}" required="true" aria-required="true"/>
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