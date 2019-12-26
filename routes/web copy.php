<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('Aluno', 'AlunoController', ['except' => ['show']]);
	Route::resource('Matricula', 'MatriculaController', ['except' => ['show']]);
	Route::resource('Professor', 'ProfessorController', ['except' => ['show']]);
	Route::resource('Curso', 'CursoController', ['except' => ['show']]);
	Route::resource('Disciplina', 'DisciplinaController', ['except' => ['show']]);
	Route::resource('Semestre', 'SemestreController', ['except' => ['show']]);
	Route::resource('Turma', 'TurmaController', ['except' => ['show']]);
	Route::resource('Matdisciplina', 'MatdisciplinaController', ['except' => ['show']]);
	Route::resource('Nota', 'NotaController', ['except' => ['show']]);
	Route::get('Disciplina/autocomplete','DisciplinaController@autocomplete',['except' => ['show']])->name('autocomplete');

	Route::get('Matdisciplina/turma/{id}','MatdisciplinaController@getTurma');
	Route::get('Matdisciplina/curso/{id}','MatdisciplinaController@getCurso');
	Route::get('Matdisciplina/disciplina/{id}','MatdisciplinaController@getDisciplina');

	//Route::post('Aluno/search','AlunoController@search',['except' => ['show']])->name('Aluno.search');
});
