<?php

namespace App\Livewire;

use App\Models\Turma;
use Livewire\Component;
use Livewire\Attributes\Title;

class TurmaRelatorios extends Component
{
    public Turma $turma;

    public function mount(Turma $turma)
    {
        $this->turma = $turma;
    }

    #[Title('SISEDU-DIÁRIO - Relatórios da turma')] 
    public function render()
    {
        $page = 'TurmaRelatorios';
        return view('livewire.turma-relatorios',[
            "page" => $page
        ]);
    }
}
