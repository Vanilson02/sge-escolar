@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Turma.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="box ">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Adicionar Turmas') }}</h4>
                <p class="box-category"></p>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Turma.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar a Lista') }}</a>
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
                  <label class="col-sm-2 col-form-label">{{ __('Turma') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nometurma" id="input-name" type="text" placeholder="{{ __('Turma') }}" value="{{ old('nometurma') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Curso') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdcurso">
                          <option value="">---Curso---</option>
                        @foreach ($cursos as $curso => $value)
                          <option value="{{ $curso }}">{{ $value }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Semestre') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdsemestre">
                          <option value="">---Semestre---</option>
                        @foreach ($semestres as $semestre => $value)
                          <option value="{{ $semestre }}">{{ $value }}</option>
                        @endforeach
                      </select>
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