@extends('adminlte::page')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Disciplina.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="box ">
              <div class="box-header box-header-primary">
                <h4 class="box-title">{{ __('Adicionar Disciplinas') }}</h4>
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
                        <button type="button" class="close btn btn-default" data-dismiss="alert" aria-label="Close">
                          <i class="fas fa-window-close"></i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Disciplina') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input class="form-control" name="nome" id="input-name" type="text" placeholder="{{ __('Disciplina') }}" value="{{ old('nome') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Professor') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <select class="form-control" name="cdprofessor">
                          <option value="">---Professores---</option>
                        @foreach ($professores as $professor => $value)
                          <option value="{{ $professor }}">{{ $value }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="valor" min="0.00" step="0.01" id="input-name" type="number" placeholder="{{ __('Valor') }}" value="{{ old('nome') }}" required="true" aria-required="true"/>
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