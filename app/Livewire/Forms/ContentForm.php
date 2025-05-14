<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Turma;
use App\Models\Content;
use App\Models\Discipline;

class ContentForm extends Form
{

    public Content $content;
    
    public $school_id = "";
    public $turma_id = "";
    public $discipline_id = "";

    #[Validate('required', message:'O campo bimestre é obrigatório')]
    public $bimonthly = "";

    #[Validate('required', message:'O campo data é obrigatório')]
    public $date = "";

    #[Validate('required', message:'O campo conteúdo é obrigatório')]
    public $conteudo = "";

    public function setTurmaDiscipline(Turma $turma, Discipline $discipline)
    {
        $this->school_id =  $turma->school_id;
        $this->turma_id = $turma->id;
        $this->discipline_id = $discipline->id;
    }

    public function setContent(Content $content)
    {
        $this->content = $content;
        $this->school_id =  $this->content->school_id;
        $this->turma_id = $this->content->turma->id;
        $this->discipline_id = $this->content->discipline_id;
        $this->bimonthly = $this->content->bimonthly;
        $this->date = date('Y-m-d', strtotime($this->content->date));
        $this->conteudo = $this->content->content;
    }

    public function store()
    {
        $this->validate();
        Content::create([
            'school_id' => $this->school_id,
            'turma_id' => $this->turma_id,
            'discipline_id' => $this->discipline_id,
            'bimonthly' => intval($this->bimonthly),
            'date' => $this->date,
            'content' => $this->conteudo
        ]);

        $this->reset();
    }
}
