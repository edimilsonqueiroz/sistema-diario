<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;

class ImprimirRelatorios extends Controller
{
    public function boletim(Request $request)
    {
        $student = Student::find($request->student)->get();

        $boletim = Pdf::loadView('relatorios.boletim',[
            'student' => $student
        ]);
        return $boletim->stream();
        
        
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
