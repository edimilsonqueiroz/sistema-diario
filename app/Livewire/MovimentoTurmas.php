<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Turma;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MovimentoTurmas extends Component
{
    use WithPagination;

    public $school = '';
    public $year = '';
    
    #[Title('SISEDU-DIARIO - Movimento Turmas')] 
    public function render()
    {
        $user = Auth::user();
        
        $page = "MovimentoTurmas";
        
        if($user->isCoordenador || $user->isProfessor){
            $turmas = User::find($user->id)->turmas()->where('school_id','like','%'.$this->school.'%')->where('year','like','%'.$this->year.'%')->get();
        }else{
            $turmas = Turma::query()->when($this->school || $this->year, function($query){
                $query->where('school_id','like','%'.$this->school.'%')->where('year','like','%'.$this->year.'%');
            })->paginate(4);
        }
        

        return view('livewire.movimento-turmas',[
            'page'=>$page,
            'schools'=>School::all(),
            'turmas' => $turmas
        ]);
    }
}
