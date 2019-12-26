@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Matdisciplina.update', $matdisciplina) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="box ">

              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Editar Matdisciplina') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('Matdisciplina.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>

              <div class="box-body ">
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Disciplina') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <select class="form-control" name="cddisciplina">                     
                        <option value="{{$matdisciplina->CDDISCIPLINA}}">{{$matdisciplina->disciplinas->NOMEDISCIPLINA}}</option>
                      @foreach ($disciplinas as $disciplina => $value)
                        <option value="{{ $disciplina }}">{{ $value }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Matricula') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <select class="form-control" readonly="readonly" name="cdmatricula"required="true" aria-required="true">
                      @foreach ($matriculas as $matricula) 
                        if($matricula->CDMATRICULA == $matdisciplina->CDMATRICULA){
                          <option selected value="{{ $matdisciplina->CDMATRICULA }}">{{$matricula->NOME}}</option>
                        }
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control" name="status"    required="true" aria-required="true">
                        <option selected value="{{ old('STATUS', $matdisciplina->STATUS) }}">@if($matdisciplina->STATUS=='MT'){{{'Matriculado'}}}@else{{{'Trancado'}}}@endif</option>
                        <option value="MT">Matriculado</option>
                        <option value="AT">Trancado</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="valor" id="input-name" min="0.00" step="0.01" type="number" placeholder="{{ __('Valor') }}" value="{{ old('Valor', $matdisciplina->VALOR) }}" required="true" aria-required="true"/>
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