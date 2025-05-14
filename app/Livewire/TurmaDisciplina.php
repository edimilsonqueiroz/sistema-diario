<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Turma;
use Livewire\Attributes\Title;
use App\Livewire\Forms\DisciplinaForm;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\Discipline;
use App\Models\DisciplineStudent;


class TurmaDisciplina extends Component
{
    use LivewireAlert;
    use WithPagination;

    public Disciplinaform $form;

    public $query = '';
    public $teachers = '';
    public $student_class_search = "";
    public $student_discipline_search = "";
    public $discipline_name = "";
    public $discipline_id = "";
    public $students_discipline_list = [];
    

    public Turma $turma;
    public Discipline $discipline;
    
    public $students_discipline = [];
    public $student_class = [];
    
    public function mount(Turma $turma)
    {
        $this->turma = $turma;
    }

    #[On('close-modal')] 
    public function resetForm()
    {
        $this->form->reset();
        $this->discipline_name = "";
        $this->discipline_id = "";
        $this->students_discipline = [];
        $this->student_class = [];
        $this->students_discipline_list = [];
    }

    public function openEditDiscipline(Discipline $discipline)
    {
        $this->form->setDiscipline($discipline);

        $this->dispatch('open-modal', name: 'editar-disciplina');
    }

    public function update()
    {
        if($this->form->updateForm() != false){
            $this->alert('success', 'Disciplina alterada com sucesso!',[
                'position' => 'top',
                'toast' => true,
                'width' => 400
            ]);

            $this->dispatch('close-modal', name: 'editar-disciplina');
        }else{
            $this->alert('error', 'Erro ao alterar a disciplina!',[
                'position' => 'top',
                'toast' => true,
                'width' => 380
            ]);
        }
        
    }

    public function save()
    {
        $this->form->setTurma($this->turma);
        if($this->form->store()){
            $this->alert('success', 'Disciplina cadastrada com sucesso!',[
                'position' => 'top',
                'toast' => true,
                'width' => 400
            ]);
        }else{
            $this->alert('error', 'Erro ao cadastrar!',[
                'position' => 'top',
                'toast' => true,
                'width' => 380
            ]);
        }
        
    }

    public function studentsDiscipline(Discipline $discipline)
    {
        $this->discipline = $discipline;
        $this->students_discipline_list = $this->discipline->students()->where('name','like','%'.$this->student_discipline_search.'%')->get();
        $this->discipline_id = $discipline->id;
        $this->discipline_name = $discipline->name;
        $this->dispatch('open-modal', name: 'students-discipline');
        
    }

    public function addStudentDiscipline()
    {
        
        if($this->student_class){
            foreach($this->student_class as $student){
                $student_discipline = DisciplineStudent::where('discipline_id', intval($this->discipline->id))->where('student_id', intval($student))->first();
                if($student_discipline){
                    return $this->alert('warning', 'Aluno(s) já vinculado(s) à disciplina!',[
                        'position' => 'top',
                        'toast' => true,
                        'width' => 460
                    ]);
                }else{
                    DisciplineStudent::create([
                        'discipline_id' => intval($this->discipline->id),
                        'student_id' => intval($student)
                    ]);
                    $this->searchStudent();
                    $this->student_class = [];
                    $this->alert('success', 'Aluno(s) adicionado(s) na disciplina com sucesso!',[
                        'position' => 'top',
                        'toast' => true,
                        'width' => 500
                    ]);
                }
            }
        }else{
            $this->alert('warning', 'Você precisa selecionar um(a) aluno(a)',[
                'position' => 'top',
                'toast' => true,
                'width' => 500
            ]);
        }
       
    }

    public function removeStudentDiscipline()
    {

        if($this->students_discipline){
            foreach($this->students_discipline as $student_discipline){
                DisciplineStudent::where('discipline_id', intval($this->discipline->id))->where('student_id', intval($student_discipline))->delete();
            }
            $this->alert('success', 'Aluno(s) removidos(s) da disciplina com sucesso!',[
                'position' => 'top',
                'toast' => true,
                'width' => 500
            ]);
            $this->students_discipline = [];
            $this->searchStudent();
        }else{
            $this->alert('warning', 'Você precisa selecionar um(a) aluno(a) para remover',[
                'position' => 'top',
                'toast' => true,
                'width' => 550
            ]);
        }
    }

    public function searchStudent(){
        $this->students_discipline_list = Discipline::find($this->discipline->id)->students()->where('name','like','%'.$this->student_discipline_search.'%')->get();
    }

    #[Title('SISEDU-DIÁRIO - Turma Disciplinas')]
    public function render()
    {
        $page = "Disciplines";
        $disciplines = Discipline::where('turma_id', $this->turma->id)->get();
        $students_turma = Turma::find(intval($this->turma->id))->students()->where('name','like','%'.$this->student_class_search.'%')->get();  
        $users = User::where('school_id',$this->turma->school_id)
        ->where('name','like','%'.$this->teachers.'%')->get();

        return view('livewire.turma-disciplina',[
            'page' => $page,
            'users' => $users,
            'disciplines' => $disciplines,
            'students_turma' => $students_turma
        ]);
    }
}
