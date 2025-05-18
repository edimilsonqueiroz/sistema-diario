<?php

namespace App\Livewire;

use App\Models\Turma;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TurmaRelatorios extends Component
{
    public Turma $turma;

     use LivewireAlert;
     use WithPagination;
     
     public $query = "";
     public $student_boletim = "";
     public $student_historico = "";
     public $student_declaracao = "";

     #[On('close-modal')] 
    public function resetForm()
    {
        $this->query = "";
        $this->student_boletim = "";
        $this->student_historico = "";
        $this->student_declaracao = "";
    }

    public function mount(Turma $turma)
    {
        $this->turma = $turma;
    }

    public function printReports()
    {
        $this->redirectRoute('diario-conteudos');
    }

    public function reportBoletim()
    {
        
        $this->redirectRoute('relatorio-boletim', ["student" => $this->student_boletim]);
        $this->student_boletim = "";
    }

    #[Title('SISEDU-DIÁRIO - Relatórios da turma')] 
    public function render()
    {
        $page = 'TurmaRelatorios';
        $students = Turma::find($this->turma->id)->students()->where('name','like','%'.$this->query.'%')->get();
        return view('livewire.turma-relatorios',[
            "page" => $page,
            "students" => $students
        ]);
    }
}
