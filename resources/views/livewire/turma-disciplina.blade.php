<div class="w-full h-full overflow-x-hidden">
@include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div>{{$turma->name}}</div>
        <div class="bg-white grid md:grid-cols-3 grid-cols-1 gap-4 p-2 rounded-md shadow-md">
            <input placeholder="Pesquisa por descrição" class="col-span-1 py-2 outline-0 border-2 rounded-md border-gray-300 px-2" type="text"/>
            <input class="col-span-1 py-2 outline-0 border-2 rounded-md border-gray-300 px-2" type="date"/>
            <div class="col-span-1 flex justify-center items-center">
                <button x-data x-on:click="$dispatch('open-modal', { name: 'cadastro-disciplina' })" class="bg-teal-600 text-white py-2 px-3 rounded-md shadow-md border-0"><i class="bi bi-plus-circle"></i> Adicionar disciplina</button>
            </div>
        </div>
        <div class="bg-white h-96 mt-2 rounded-md shadow-md">

            <div class="flex items-center justify-between flex-col h-full w-full">
                    <div class="bg-slate-100 px-3 rounded-tl-md rounded-tr-md flex items-center h-10 w-full">
                        <p class="text-xl font-semibold">DISCIPLINAS DA TURMA</p>
                    </div>
                    <div class="flex-1 w-full overflow-y-auto p-2">
                        @foreach($disciplines as $discipline)
                            <div  @key="{{$discipline->id}}" class="bg-slate-200 hover:bg-slate-400 my-1 flex items-center justify-between rounded-md p-2">
                                <div class="flex-1 flex-col">
                                    <h3 class="uppercase font-semibold">{{$discipline->name}}</h3>
                                </div>
                                <div class="p-1 flex gap-3">
                                    <button class="text-xl font-semibold" wire:click="openEditDiscipline({{$discipline->id}})"><i class="bi bi-pencil-square"></i></button>
                                    <button wire:click="studentsDiscipline({{$discipline->id}})" class="text-xl font-semibold"><i class="bi bi-people-fill"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="bg-slate-100 px-3 py-4 rounded-bl-md rounded-br-md flex items-center justify-end h-10 w-full">
                        
                    </div>
            </div>
        </div>
    </div>

<!-- MODAIS -->
    <form wire:submit.prevent="save">
        <x-modal.modal-lg name="cadastro-disciplina" title="Cadastrar Disciplina">
            <x-slot:body>
                <div class="grid md:grid-cols-3 grid-cols-1 gap-2">
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <label for="disciplina">Disciplina</label>
                        <input wire:model="form.name" id="disciplina" type="text" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.name') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="aulas_previstas">Total de aulas previstas</label>
                        <input wire:model="form.school_days" id="aulas_previstas" min="0" type="number" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.school_days') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="hora_inicio">Hora início</label>
                        <input wire:model="form.start_time" id="hora_inicio" type="time" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.start_time') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="hora_fim">Hora fim</label>
                        <input wire:model="form.end_time" id="hora_fim" type="time" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.end_time') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <fieldset class="border-2 overflow-auto px-2 border-gray-300 w-full rounded-md">
                            <legend class="px-2 font-semibold">Dias da semana</legend>
                            <div class="grid grid-cols-1 p-2 md:grid-cols-3 gap-1">
                                <div class="flex col-span-1 text-left">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="segunda-feira" value="Segunda-Feira" class="mr-2">
                                    <label for="segunda-feira">Segunda-feira</label>
                                </div>
                                <div class="flex col-span-1 text-left">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="terca-feira" value="Terça-Feira" class="mr-2">
                                    <label for="terca-feira">Terça-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="quarta-feira" value="Quarta-Feira" class="mr-2">
                                    <label for="quarta-feira">Quarta-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="quinta-feira" value="Quinta-Feira" class="mr-2">
                                    <label for="quinta-feira">Quinta-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week"  type="checkbox" name="days_week[]" id="sexta-feira" value="Sexta-Feira" class="mr-2">
                                    <label for="sexta-feira">Sexta-feira</label>
                                </div>
                            </div>
                        </fieldset>
                        @error('form.days_week') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <fieldset class="border-2 p-3 border-gray-300 w-full rounded-md">
                            <legend class="px-2 font-semibold">Selecione um professor(a)</legend>
                            <input wire:model.live="teachers" id="search_teacher" placeholder="Pesquisar pelo nome do professor(a)" type="text" class="border-2 mb-2 px-2 py-1 w-full outline-0 border-gray-200 rounded-md">
                            <div class="overflow-auto p-2 h-40">
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                    @foreach($users as $user)
                                    <div class="bg-slate-200  flex col-span-3 rounded-md py-1 px-2">
                                        <input wire:model="form.user_id" type="radio" value="{{$user->id}}">
                                        <div class="w-full ml-2">
                                            <p class="uppercase font-semibold">{{$user->name}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                        @error('form.user_id') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-lg>
    </form>

    <form wire:submit.prevent="update">
        <x-modal.modal-lg name="editar-disciplina" title="Editar Disciplina">
            <x-slot:body>
                <div class="grid md:grid-cols-3 grid-cols-1 gap-2">
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <label for="disciplina">Disciplina</label>
                        <input wire:model="form.name" id="disciplina" value="{{$this->form->name}}" type="text" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.name') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="aulas_previstas">Total de aulas previstas</label>
                        <input wire:model="form.school_days" id="aulas_previstas" min="0" type="number" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.school_days') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="hora_inicio">Hora início</label>
                        <input wire:model="form.start_time" id="hora_inicio" type="time" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.start_time') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex col-span-1 flex-col p-1">
                        <label for="hora_fim">Hora fim</label>
                        <input wire:model="form.end_time" id="hora_fim" type="time" class="border-2 p-2 outline-0 border-gray-200 rounded-md">
                        @error('form.end_time') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <fieldset class="border-2 overflow-auto px-2 border-gray-300 w-full rounded-md">
                            <legend class="px-2 font-semibold">Dias da semana</legend>
                            <div class="grid grid-cols-1 p-2 md:grid-cols-3 gap-1">
                                <div class="flex col-span-1 text-left">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="segunda-feira" value="Segunda-Feira" class="mr-2">
                                    <label for="segunda-feira">Segunda-feira</label>
                                </div>
                                <div class="flex col-span-1 text-left">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="terca-feira" value="Terça-Feira" class="mr-2">
                                    <label for="terca-feira">Terça-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="quarta-feira" value="Quarta-Feira" class="mr-2">
                                    <label for="quarta-feira">Quarta-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week" type="checkbox" name="days_week[]" id="quinta-feira" value="Quinta-Feira" class="mr-2">
                                    <label for="quinta-feira">Quinta-feira</label>
                                </div>
                                <div class="flex col-span-1">
                                    <input wire:model.live="form.days_week"  type="checkbox" name="days_week[]" id="sexta-feira" value="Sexta-Feira" class="mr-2">
                                    <label for="sexta-feira">Sexta-feira</label>
                                </div>
                            </div>
                        </fieldset>
                        @error('form.days_week') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex md:col-span-3 col-span-1 flex-col p-1">
                        <fieldset class="px-2 border-2 mb-2 rounded-md border-gray-300">
                            <legend class="px-2 font-semibold">Professor atual da disciplina</legend>
                            <div class="flex col-span-3 rounded-md py-1 px-2">
                                <div class="w-full ml-2">
                                    <p wire:model.live="form.teacher_name" class="uppercase">{{$this->form->teacher_name}}</p>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border-2 p-3 border-gray-300 w-full rounded-md">
                            <legend class="px-2 font-semibold">Selecione um professor(a)</legend>
                            <input wire:model.live="teachers" id="search_teacher" placeholder="Pesquisar pelo nome do professor(a)" type="text" class="border-2 mb-2 px-2 py-1 w-full outline-0 border-gray-200 rounded-md">
                            <div class="overflow-auto p-2 h-40">
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                    @foreach($users as $user)
                                        @if($user->id != $this->form->user_id)
                                        <div class="bg-slate-200  flex col-span-3 rounded-md py-1 px-2">
                                            <input wire:model="form.user_id" name="user_id" type="radio" value="{{$user->id}}">
                                            <div class="w-full ml-2">
                                                <p class="uppercase font-semibold">{{$user->name}}</p>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                
                                </div>
                            </div>
                        </fieldset>
                        @error('form.user_id') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-lg>
    </form>

    <!-- MODAL ALUNOS DA DISCIPLINA -->
    <x-modal.modal-lg name="students-discipline" title="Adicionar alunos na disciplina">
        <x-slot:body>
            <div wire:model="discipline_name" class="p-2 bg-slate-300 rounded-md">DISCIPLINA: <span class="font-semibold">{{$discipline_name}}</span></div>
            <div class="grid grid-cols-1 md:grid-cols-5">
                
                <div class="col-span-2 border px-1 py-2 m-1 border-gray-300 rounded-md">
                    <div class="bg-gray-300 border-2 border-gray-300 rounded-md font-semibold text-sm mb-2 p-2"><i class="bi bi-brush"></i> ALUNOS DA TURMA</div>
                    <input wire:model.live="student_class_search" placeholder="Pesquisar aluno por nome" type="text" class="border-2 w-full mb-2 border-gray-300 outline-0 rounded-md p-1">
                    <div class="flex flex-col px-1 gap-1 h-auto md:h-60 overflow-auto">
                        @foreach($students_turma as $student_turma)
                            <div class="bg-gray-200 font-semibold text-sm rounded-md p-2"><input wire:model="student_class" name="student_class[]" value="{{$student_turma->id}}" class="mr-1" type="checkbox">{{$student_turma->name}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="flex bg-slate-200 border-2 border-slate-200 rounded-md col-span-1 m-1 px-1 py-2 gap-2 md:gap-5 flex-col justify-center items-center">
                    <button wire:click="addStudentDiscipline" class="bg-teal-600 border-2 border-teal-600 rounded-md font-semibold text-sm w-[130px] text-white px-3 py-1"><span>ADICIONAR</span> <i class="bi bi-arrow-right-circle"></i></button>
                    <button wire:click="removeStudentDiscipline" class="bg-teal-600 border-2 border-teal-600 rounded-md font-semibold text-sm w-[130px] text-white px-3 py-1"><i class="bi bi-arrow-left-circle"></i> <span>REMOVER</span></button>
                </div>
                <div class="col-span-2 border px-1 py-2 m-1 border-gray-300 rounded-md">
                    <div class="bg-gray-300 border-2 border-gray-300 rounded-md font-semibold text-sm mb-2 p-2"><i class="bi bi-brush"></i> ALUNOS DA DISCIPLINA</div>
                    <input wire:model.live="student_discipline_search" wire:keyup="searchStudent" placeholder="Pesquisar aluno por nome" type="text" class="border-2 w-full mb-2 border-gray-300 outline-0 rounded-md p-1">
                    <div class="flex flex-col px-1 gap-1 h-auto md:h-60 overflow-auto">
                        @foreach($students_discipline_list as $student_list)
                            <div class="bg-gray-200 font-semibold text-sm rounded-md p-2"><input wire:model="students_discipline" name="students_discipline[]" value="{{$student_list->id}}" class="mr-1" type="checkbox">{{$student_list->name}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot:footer></x-slot>
    </x-modal.modal-lg>
    

@include('components/footer')
</div>
