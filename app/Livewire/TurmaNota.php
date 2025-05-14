<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Turma;


class TurmaNota extends Component
{
    use LivewireAlert;
    use WithPagination;
    
    public Turma $turma;
    public $query = "";
    

    public function mount(Turma $turma)
    {
        $this->turma = $turma;
    }

    

    #[Title('SISEDU-DIÁRIO - Turma Notas')]
    public function render()
    {

        
        
        $disciplines = Turma::find(intval($this->turma->id))->disciplines()->where('name','like','%'.$this->query.'%')->get();
        
        $page = "TurmaNota";
        return view('livewire.turma-nota',[
            "page" => $page,
            "disciplines" => $disciplines
        ]);
    }
}
