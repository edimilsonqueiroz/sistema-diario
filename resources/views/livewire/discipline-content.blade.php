<div class="w-full h-full overflow-x-hidden">
  @include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div class="p-3 w-full overflow-y-auto">
            <div class="bg-white mb-5 w-full rounded-md justify-between items-center flex flex-col md:flex-row p-4 shadow-md">
                <div class="flex flex-col md:flex-row md:w-[50%] px-2 w-full">
                    <input wire:model.live="query" type="text" class="outline-none text-xl w-full border-2 rounded-md p-3 border-gray-400" placeholder="Pesquisar por nome da disciplina">
                </div>
                <div class="md:p-0 p-5">
                    <button x-data x-on:click="$dispatch('open-modal', { name: 'cadastro-conteudo' })" class="bg-teal-600 text-white py-2 px-3 rounded-md shadow-md border-0"><i class="bi bi-plus-circle"></i> Cadastrar conteudo</button>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-3 bg-slate-50 w-full rounded-md">
                <div class="flex-1 w-full overflow-y-auto p-2">
                    @foreach($contents as $content)
                    <div class="bg-slate-200 hover:bg-slate-400 my-1 flex items-center justify-between rounded-md p-2">
                        <div class="flex flex-col md:flex-row gap-5">
                            <div class="flex flex-col">
                                <label class="font-semibold">Data:</label>
                                <h2>{{date('d/m/Y', strtotime($content->date))}}</h2>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-semibold">Conteudo:</label>
                                <h3>{{$content->content}}</h3>
                            </div>
                        </div>
                        <div class="p-1 flex gap-3">
                            <button wire:click="openModalEdit({{$content->id}})" class="text-xl font-semibold"><i class="bi bi-pencil-square"></i></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- MODAIS -->
    <form wire:submit.prevent="save">
        <x-modal.modal-md name="cadastro-conteudo" title="Cadastrar Conteudo">
            <x-slot:body>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="col-span-1 flex flex-col">
                        <label class="font-semibold">Bimestre:</label>
                        <select required wire:model="form.bimonthly" class="border-2 border-gray-300 rounded-md p-2 outline-none" >
                            <option value="">Selecione o bimestre</option>
                            <option value="1">1º BIMESTRE</option>
                            <option value="2">2º BIMESTRE</option>
                            <option value="3">3º BIMESTRE</option>
                            <option value="4">4º BIMESTRE</option>
                        </select>
                        @error('form.bimonthly') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="cols-span-1 flex flex-col">
                        <label class="font-semibold">Data:</label>
                        <input required wire:model="form.date" type="date" class="border-2 border-gray-300 rounded-md p-2 outline-none" />
                        @error('form.date') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2 flex flex-col">
                        <label class="font-semibold">Conteudo:</label>
                        <textarea required wire:model="form.conteudo" type="text" rows="5" class="border-2 border-gray-300 rounded-md p-2 outline-none" ></textarea>
                        @error('form.coneudo') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-md>
    </form>


    <form>
        <x-modal.modal-md name="editar-conteudo" title="Editar Conteudo">
            <x-slot:body>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="col-span-1 flex flex-col">
                        <label class="font-semibold">Bimestre:</label>
                        <select wire:model="form.bimonthly" class="border-2 border-gray-300 rounded-md p-2 outline-none" >
                            <option value="">Selecione o bimestre</option>
                            <option value="1">1º BIMESTRE</option>
                            <option value="2">2º BIMESTRE</option>
                            <option value="3">3º BIMESTRE</option>
                            <option value="4">4º BIMESTRE</option>
                        </select>
                        @error('form.bimonthly') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="cols-span-1 flex flex-col">
                        <label class="font-semibold">Data:</label>
                        <input wire:model="form.date" type="date" class="border-2 border-gray-300 rounded-md p-2 outline-none" />
                    </div>
                    <div class="col-span-2 flex flex-col">
                        <label class="font-semibold">Conteudo:</label>
                        <textarea wire:model="form.conteudo" type="text" rows="5" class="border-2 border-gray-300 rounded-md p-2 outline-none" ></textarea>
                        @error('form.conteudo') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-md>
    </form>

    <!-- MODAL DE REGISTRO DE FREQUÊNCIA -->
    <form>
        <x-modal.modal-lg name="registrar-frequencia" title="Registrar Frequência">
            <x-slot:body>
                <div class="relative overflow-y-auto">
                    @foreach($students as $student)
                    <div class="flex justify-between items-center my-1 p-5 rounded-md bg-slate-300">
                        <p>{{$student->name}}</p>
                        <input value="{{$student->name}}" name="students[]" class="p-10 border-2 w-5 h-5 outline-0 border-gray-300 rounded-md" type="checkbox">
                    </div>
                    @endforeach
                </div>
                
            </x-slot>
            <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Salvar</button>
            </x-slot>
        </x-modal.modal-lg>
    </form>

   @include('components/footer')
</div>

