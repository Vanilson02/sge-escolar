@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Curso.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="box ">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Adicionar Cursos') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Curso.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
                  </div>
                </div>
              </div>
              <div class="box-body ">
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
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nomecurso" id="input-name" type="text" placeholder="{{ __('Cuso') }}" value="{{ old('nomecurso') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
              <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('statuss') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" min="0.00" step="0.01" name="valorcurso" id="input-name" type="number" placeholder="{{ __('Valor') }}" value="{{ old('nome') }}" required="true" aria-required="true"/>
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