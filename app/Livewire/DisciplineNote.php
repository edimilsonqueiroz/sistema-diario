<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use App\Models\Turma;
use App\Models\Discipline;
use App\Models\Student;
use App\Models\Note;

class DisciplineNote extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $query = "";

    public Turma $turma;
    public Discipline $discipline;
    public Student $student;

    public int $student_id = 0;
    public $student_name = "";
    public $bimestre_1 = "";
    public $bimestre_2 = "";
    public $bimestre_3 = "";
    public $bimestre_4 = "";
    


    #[On('close-modal')] 
    public function resetForm()
    {
        $this->student_name = "";
        $this->student_id = 0;
        $this->bimestre_1 = "";
        $this->bimestre_2 = "";
        $this->bimestre_3 = "";
        $this->bimestre_4 = "";
    }


    public function mount(Turma $turma, Discipline $discipline)
    {
        $this->turma = $turma;
        $this->discipline = $discipline;
    }

    public function editNotes(Student $student)
    {
        $this->student = $student;
        $notas = Note::where('student_id',$this->student->id)->where('discipline_id', $this->discipline->id)->first();
        if($notas){
            $this->bimestre_1 = $notas->bimonthly_1;
            $this->bimestre_2 = $notas->bimonthly_2;
            $this->bimestre_3 = $notas->bimonthly_3;
            $this->bimestre_4 = $notas->bimonthly_4;
        }
        $this->dispatch('open-modal', name: "cadastro-notas");
    }

    public function updateNotes()
    {
           $notes = Note::where('student_id',$this->student->id)->where('discipline_id', $this->discipline->id)->first();
           if($notes){

                Note::where('student_id',$this->student->id)
                ->where('discipline_id', $this->discipline->id)
                ->update([
                    'bimonthly_1'=>$this->bimestre_1 ? $this->bimestre_1 : "0",
                    'bimonthly_2'=>$this->bimestre_2 ? $this->bimestre_2 : "0",
                    'bimonthly_3'=>$this->bimestre_3 ? $this->bimestre_3 : "0",
                    'bimonthly_4'=>$this->bimestre_4 ? $this->bimestre_4 : "0"
                ]);
            
                $this->alert('success', 'Alterar notas do aluno!',[
                    'position' => 'top',
                    'toast' => true,
                    'width' => 380
                ]);

                $this->calculaMedia();

                $this->dispatch('close-modal', name:"cadastro-notas");
            
                
           }else{
                Note::create([
                    'school_id'=>$this->student->school_id,
                    'turma_id'=>$this->discipline->turma_id,
                    'discipline_id'=>$this->discipline->id,
                    'student_id'=>$this->student->id ? $this->student->id: "0",
                    'bimonthly_1'=>$this->bimestre_1 ? $this->bimestre_1 : "0",
                    'bimonthly_2'=>$this->bimestre_2 ? $this->bimestre_2 : "0",
                    'bimonthly_3'=>$this->bimestre_3 ? $this->bimestre_3 : "0",
                    'bimonthly_4'=>$this->bimestre_4 ? $this->bimestre_4 : "0",
                    'average'=>"0",

                ]);

                $this->alert('success', 'Notas cadastrada com sucesso!',[
                    'position' => 'top',
                    'toast' => true,
                    'width' => 380
                ]);

                $this->calculaMedia();

                $this->dispatch('close-modal', name:"cadastro-notas");
           }
    }

    public function calculaMedia()
    {
            $notas_student = Note::where('student_id',$this->student->id)->where('discipline_id', $this->discipline->id)->first();

            if($notas_student){

                $media_student = (floatval($notas_student->bimonthly_1) + floatval($notas_student->bimonthly_2) + floatval($notas_student->bimonthly_3) + floatval($notas_student->bimonthly_4)) / 4;
                $media_student = round($media_student, 1);
                
                Note::where('discipline_id', $this->discipline->id)
                    ->where('student_id', $this->student->id)
                    ->update([
                        'average' => str_replace(".",",",strval($media_student))
                    ]);
            }
        
    }

    #[Title('SISEDU-DIÁRIO - Disciplina Notas')] 
    public function render()
    {
        $students  = Discipline::find(intval($this->discipline->id))->students()->where('name','like','%'.$this->query.'%')->get();
        
        $page = "TurmaNota";
        return view('livewire.discipline-note',[
            "page" => $page,
            "students" => $students
        ]);
    }
}
