<?php

namespace App\Livewire;

use App\Models\Turma;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ConteudoForm;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use App\Models\Discipline;
use App\Models\Content;

class TurmaConteudo extends Component
{
    use LivewireAlert;
    use WithPagination;

    public Turma $turma;
    

    public $query = '';

    public function mount(Turma $turma)
    {
        $this->turma =  $turma;
    }

    #[On('close-modal')] 
    public function resetForm()
    {
        $this->form->reset();
    }

    

    
    #[Title('SISEDU-DIÁRIO - Conteudo')]
    public function render()
    {
        $page = "TurmaConteudo";
        $disciplines = Turma::find(intval($this->turma->id))->disciplines()->where('name','like','%'.$this->query.'%')->get();

        return view('livewire.turma-conteudo',[
            "page"=>$page,
            "disciplines" => $disciplines
        ]);
    }
}
