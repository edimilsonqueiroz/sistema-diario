<div class="w-full h-full overflow-x-hidden">
@include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div class="bg-white grid md:grid-cols-4 grid-cols-1 my-1 gap-4 p-2 rounded-md shadow-md">
            <input wire:model.live="query" type="text" placeholder="Pesquisa pelo nome" class="col-span-2 py-2 outline-0 border-2 rounded-md border-gray-300 px-2">
        </div>
        <div class="bg-white h-96 rounded-md shadow-md">
            <div class="flex items-center justify-between flex-col h-full w-full">
                <div class="bg-slate-100 px-3 rounded-tl-md rounded-tr-md flex items-center h-10 w-full">
                    <h1 class="text-xl">Registro de notas disciplina: <b>{{$discipline->name}}</b></h1>
                </div>
                <div class="flex-1 w-full overflow-y-auto p-2">
                    
                    @foreach($students as $students_discipline)
                    <div class="bg-slate-200 hover:bg-slate-300 my-1 flex items-center justify-between rounded-md p-2">
                        <div class="flex-1 flex-col">
                            <h3 class="uppercase font-semibold">{{$students_discipline->name}}</h3>
                        </div>
                        <div class="grid grid-cols-5">
                                
                                <div class="flex justify-center items-center mx-1 flex-col">
                                        @foreach($students_discipline->notes()->where('discipline_id',$discipline->id)->where('student_id', $students_discipline->id)->get() as $note)
                                            <label for="1_bimestre">1º Bimestre</label>
                                            <p>{{$note->bimonthly_1}}</p>
                                        @endforeach
                                </div>
                                
                                <div class="flex justify-center items-center mx-2 flex-col">
                                        @foreach($students_discipline->notes()->where('discipline_id',$discipline->id)->where('student_id', $students_discipline->id)->get() as $note)
                                            <label for="2_bimestre">2º Bimestre</label>
                                            <p>{{$note->bimonthly_2}}</p>
                                        @endforeach
                                </div>
                                <div class="flex justify-center items-center mx-2 flex-col">
                                   
                                        @foreach($students_discipline->notes()->where('discipline_id',$discipline->id)->where('student_id', $students_discipline->id)->get() as $note)
                                            <label for="3_bimestre">3º Bimestre</label>
                                            <p>{{$note->bimonthly_3}}</p>
                                        @endforeach
                                    
                                </div>
                                <div class="flex justify-center items-center mx-2 flex-col">
                                    
                                        @foreach($students_discipline->notes()->where('discipline_id',$discipline->id)->where('student_id', $students_discipline->id)->get() as $note)
                                            <label for="4_bimestre">4º Bimestre</label>
                                            <p>{{$note->bimonthly_4}}</p>
                                        @endforeach
                                    
                                </div>
                            
                                <div class="flex justify-center items-center mx-2 flex-col">
                                @foreach($students_discipline->notes()->where('discipline_id',$discipline->id)->where('student_id', $students_discipline->id)->get() as $note)
                                        <label for="media_final">Média Final</label>
                                        <p>{{$note->average}}</p>
                                @endforeach  
                                </div>
                        </div>
                        <div class="p-2 text-2xl">
                            <button wire:click="editNotes({{$students_discipline->id}})"><i class="bi bi-pencil-square"></i></button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="bg-slate-100 px-3 py-4 rounded-bl-md rounded-br-md flex items-center justify-end h-10 w-full">
                
                </div>
            </div>
        </div>
    </div>

    <form wire:submit.preven="updateNotes">
        <x-modal.modal-lg name="cadastro-notas" title="Cadastro de notas">
            <x-slot:body>
                <div class="bg-gray-200 flex justify-start rounded-md m-2 font-semibold p-3">
                    <div class="flex items-center justify-center">
                        <i class="bi text-2xl mr-1 bi-mortarboard-fill"></i> 
                        <p>{{$student_name}}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-4 grid-cols-1 gap-2">
                    <div class="flex flex-col items-center justify-center">
                        <label>1º BIMESTRE:</label>
                        <input 
"                           wire:model="bimestre_1" 
                            type="text" 
                            class="text-center border-2 border-gray-300 rounded-md p-1 outline-none" 
                        />
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <label>2º BIMESTRE:</label>
                        <input 
                            wire:model="bimestre_2" 
                            type="text" 
                            class="text-center border-2 border-gray-300 rounded-md p-1 outline-none" 
                        />
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <label>3º BIMESTRE:</label>
                        <input 
                            wire:model="bimestre_3" 
                            type="text" 
                            class="text-center border-2 border-gray-300 rounded-md p-1 outline-none" 
                        />
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <label>4º BIMESTRE:</label>
                        <input 
                            wire:model="bimestre_4" 
                            type="text" 
                            class="text-center border-2 border-gray-300 rounded-md p-1 outline-none" 
                        />
                    </div>
                </div>
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 mb-2 border-2 cursor-pointer border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button class="bg-teal-600 border-2 border-teal-600 ml-2 mb-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-lg>
    </form>

@include('components/footer')
</div>
