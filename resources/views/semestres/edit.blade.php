@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Semestre.update', $semestre) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="box">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Editar Semestre') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Semestre.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>
              <div class="box-body">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Ano') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ano" id="input-name" step="0.1" min="2000" type="number" placeholder="{{ __('Nome') }}" value="{{ old('ANO', $semestre->ANO) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
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