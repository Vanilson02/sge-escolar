@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle fa5" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ __('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> {{ __('adminlte::adminlte.log_out') }}
                            </a>
                            <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if(config('adminlte.right_sidebar') and (config('adminlte.layout') != 'top-nav'))
                        <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar" @if(!config('adminlte.right_sidebar_slide')) data-controlsidebar-slide="false" @endif>
                                    <i class="{{config('adminlte.right_sidebar_icon')}}"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>

        <!-- busca -->
            <script>
                $('input#txt_consulta').quicksearch('table#tabela tbody tr');
            </script>
        <!-- / busca -->

        <script>
            $("#curso").change(function(event){
                $.get("turma/"+event.target.value+"",function(turmas, cdcurso){
                    
                    $("#turma").empty();

                    if(turmas.length == 0){
                        $("#turma").append("<option value=''>{{ __('não existe turma') }}</option>");

                    }else{
                        $("#turma").append("<option value=''>{{ __('Selecione a turma') }}</option>");

                    }

                   for(i=0; i<turmas.length; i++){
                        $("#turma").append("<option value='"+turmas[i].CDTURMA+"'>"+turmas[i].NOMETURMA+"</option>");
                    }
                });
                    
            }); 

            $("#turma").change(function(event){
                $.get("curso/"+event.target.value+"",function(curso, cdturma){
                    $("#curso").empty();
                   for(i=0; i<curso.length; i++){
                        $("#curso").append("<option value='"+curso[i].CDCURSO+"'>"+curso[i].NOMECURSO+"</option>");
                    }
                });
                    
            });  

            $("#turma").change(function(event){
                $.get("disciplina/"+event.target.value+"",function(disciplinas, cdturma){
                    $("#disciplina").empty();
                   for(i=0; i<disciplinas.length; i++){
                        $("#disciplina").append("<input type='checkbox'  id='"+disciplinas[i].CDDISCIPLINA+"' name='cddisciplina[]' value='"+disciplinas[i].CDDISCIPLINA+"' />"+disciplinas[i].NOMEDISCIPLINA+"</br>");

                    }
                });
                    
            }); 

            // aqui eu nem sei pra que serve - mentira é pra nota 

            $("#curson").change(function(event){
                $.get("turma/"+event.target.value+"",function(turmas, cdcurso){
                    
                    $("#turman").empty();

                    if(turmas.length == 0){
                        $("#turman").append("<option value=''>{{ __('não existe turma') }}</option>");

                    }else{
                        $("#turman").append("<option value=''>{{ __('Selecione a turma') }}</option>");

                    }

                   for(i=0; i<turmas.length; i++){
                        $("#turman").append("<option value='"+turmas[i].CDTURMA+"'>"+turmas[i].NOMETURMA+"</option>");
                    }
                });
                    
            }); 
  

            $("#turman").change(function(event){
                $.get("disciplina/"+event.target.value+"",function(disciplinas, cdturma){
                    $("#disciplinan").empty();

                   if(disciplinas.length == 0){
                        $("#disciplinan").append("<option value=''>{{ __('não existe disciplina') }}</option>");

                    }else{
                        $("#disciplinan").append("<option value=''>{{ __('Selecione a disciplina') }}</option>");

                    }

                   for(i=0; i<disciplinas.length; i++){
                        $("#disciplinan").append("<option value='"+disciplinas[i].CDDISCIPLINA+"'>"+disciplinas[i].NOMEDISCIPLINA+"</option>");
                    }
                });
                    
            }); 

            $("#disciplinan").change(function(event){
                
               $.get("aluno/"+event.target.value+"",function(alunos, cddisciplina){
                   
                    
                    $("#alunon").empty();

                   if(alunos.length == 0){
                        $("#alunon").append("<option value=''>{{ __('não existe aluno') }}</option>");

                    }else{
                        $("#alunon").append("<option value=''>{{ __('Selecione o aluno') }}</option>");

                    }

                   for(i=0; i<alunos.length; i++){
                        $("#alunon").append("<option value='"+alunos[i].CDMATDISCIPLINA+"'>"+alunos[i].NOME+"</option>");
                    }
                });
                    
            }); 

        </script>

        <!-- /.content-wrapper -->
        
        @hasSection('footer')
        <footer class="main-footer">
            @yield('footer')
        </footer>
        @endif

        @if(config('adminlte.right_sidebar') and (config('adminlte.layout') != 'top-nav'))
            <aside class="control-sidebar control-sidebar-{{config('adminlte.right_sidebar_theme')}}">
                @yield('right-sidebar')
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        @endif

    </div>
    
    <!-- ./wrapper -->
@stop


@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
