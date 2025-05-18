<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Turma;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ContentForm;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use App\Models\Discipline;
use App\Models\Content;

class DisciplineContent extends Component
{
    use LivewireAlert;
    use WithPagination;

    public Turma $turma;
    public Discipline $discipline;
    public ContentForm $form;
    public Content $content;

    public $query = '';

    public function mount(Turma $turma, Discipline $discipline)
    {
        $this->turma =  $turma;
        $this->discipline = $discipline;
    }

    #[On('close-modal')] 
    public function resetForm()
    {
        //$this->form->reset();
    }

    public function openModalEdit(Content $content)
    {
        $this->content = $content;
        $this->dispatch('open-modal', name: 'editar-conteudo');
    }

    public function save()
    {
        $this->form->setTurmaDiscipline($this->turma, $this->discipline);
        $this->form->store();
        $this->dispatch('close-modal', name:'cadastrar-conteudo');
        $this->dispatch('open-modal', name: 'registrar-frequencia');
        $this->alert('success', 'Conteudo cadastrado com sucesso!',[
            'position' => 'top',
            'toast' => true,
            'width' => 380
        ]);
    }

    public function update()
    {
        
    }

    #[Title('SISEDU-DIÁRIO - Disciplina Conteudo')]
    public function render()
    {
        $page = "TurmaConteudo";
        $students =  Discipline::find($this->discipline->id)->students()->get();
        
        return view('livewire.discipline-content',[
            "page"=>$page,
            "contents" => Content::where('turma_id', $this->turma->id)->where('discipline_id', $this->discipline->id)->get(),
            "students" => $students
        ]);
    }
}
