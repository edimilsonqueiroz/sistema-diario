<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;
use App\Models\Turma;
use App\Models\Note;

class ImprimirRelatorios extends Controller
{
    public function boletim(Request $request)
    {
        $student = Student::where('id',$request->student)->first();
        $turma = Turma::where('id', $request->turma)->first();
        $notas = Note::where('student_id', $student->id)->where('turma_id', $turma->id)->get();

        $pdf = Pdf::loadView('relatorios.boletim',[
            'student' => $student,
            'turma' => $turma,
            'notas' => $notas
        ]);

        
        
        return $pdf->download('SISEDU-DIARIO - Boletim '.$student->name.'.pdf');
    }

    public function historico()
    {
        $historico = Pdf::loadView('relatorios.historico');
        return $historico->stream();
    }

    public function declaracao()
    {
        $declaracao = Pdf::loadView('relatorios.declaracao');
        return $declaracao->stream();
    }
}
