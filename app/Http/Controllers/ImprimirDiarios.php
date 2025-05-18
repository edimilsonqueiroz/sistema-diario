<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ImprimirDiarios extends Controller
{
    public function conteudos()
    {
        $conteudos = Pdf::loadView('relatorios.conteudo');
        return $conteudos->stream();
    }

    public function frequencia()
    {
        $frequencia = Pdf::loadView('relatorios.frequencia');
        return $frequencia->stream();
    }

}
