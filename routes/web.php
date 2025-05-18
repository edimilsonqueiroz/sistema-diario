<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\LoginController;
use App\Livewire\Dashboard;
use App\Livewire\UserController;
use App\Livewire\EscolaController;
use App\Livewire\TurmaController;
use App\Livewire\DisciplinaController;
use App\Livewire\MatriculaController;
use App\Livewire\MovimentoTurmas;
use App\Livewire\Profile;
use App\Livewire\ResetPassword;
use App\Livewire\TurmaAluno;
use App\Livewire\TurmaProfessor;
use App\Livewire\TurmaRegistro;
use App\Livewire\TurmaConteudo;
use App\Livewire\TurmaDisciplina;
use App\Livewire\TurmaFrequencia;
use App\Livewire\TurmaNota;
use App\Livewire\DisciplineNote;
use App\Livewire\DisciplineContent;
use App\Livewire\TurmaRelatorios;
use App\Livewire\ValidateCode;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ImprimirDiarios;
use App\Http\Controllers\ImprimirRelatorios;


Route::get('/', LoginController::class)->name('login');
Route::get('/reset-password',ResetPassword::class)->name('reset-password');
Route::get('/{cpf}/validate-code',ValidateCode::class)->name('validate-code');
Route::get('/gerar-pdf',[PdfController::class, 'index'])->name('gerar-pdf');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');
    Route::get('/users', UserController::class)->name('users');
    Route::get('/schools', EscolaController::class)->name('escolas');
    Route::get('/classes', TurmaController::class)->name('turmas');
    
    
    Route::get('/moviment', MovimentoTurmas::class)->name('movimento-turmas');
    Route::get('/moviment/class/{turma}', TurmaRegistro::class)->name('turma-registro');
    Route::get('/moviment/class/{turma}/content', TurmaConteudo::class)->name('turma-content');
    Route::get('/moviment/class/{turma}/frequency', TurmaFrequencia::class)->name('turma-frequency');
    Route::get('/moviment/class/{turma}/student', TurmaAluno::class)->name('turma-student');
    Route::get('/moviment/class/{turma}/teacher', TurmaProfessor::class)->name('turma-teacher');
    Route::get('/moviment/class/{turma}/notes', TurmaNota::class)->name('turma-note');
    Route::get('/moviment/class/{turma}/discipline/{discipline}/notes', DisciplineNote::class)->name('discipline-notes');
    Route::get('/moviment/class/{turma}/discipline/{discipline}/content', DisciplineContent::class)->name('discipline-contents');
    Route::get('/moviment/class/{turma}/reports', TurmaRelatorios::class)->name('turma-relatorios');
    Route::get('/moviment/class/{turma}/disciplines', TurmaDisciplina::class)->name('turma-disciplines');
    Route::get('/registration', MatriculaController::class)->name('matriculas');
    Route::get('/reports/contents',[ImprimirDiarios::class, 'conteudos'])->name('diario-conteudos');
    Route::get('/reports/frequency',[ImprimirDiarios::class, 'frequencia'])->name('diario-frequencia');
    Route::get('/reports/boletim', [ImprimirRelatorios::class, 'boletim'])->name('relatorio-boletim');
    Route::get('/reports/historico', [ImprimirRelatorios::class, 'historico'])->name('relatorio-historico');

});
