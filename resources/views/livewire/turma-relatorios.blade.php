<div class="w-full h-full overflow-x-hidden">
@include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div class="flex justify-between rounded-md px-2 mb-5 bg-slate-50 py-5">
            <h1><b>TURMA: </b>{{$turma->name}}</h1>
            @foreach($turma->school()->get() as $school)
            <div><b>ESCOLA: </b>{{$school->name}}</div>
            @endforeach
        </div>
        
        <div class="grid grid-cols-1 text-center md:grid-cols-4 gap-3 items-center justify-center bg-white rounded-md p-2">
            <button x-data x-on:click="$dispatch('open-modal', { name: 'imprimir-diarios' })" class="col-span-1 md:w-64 h-20 rounded-md bg-slate-300 flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                </svg>
                <h1>Imprimir Diários</h1>
            </button>
            <button class="col-span-1 md:w-64 h-20 rounded-md bg-slate-300 flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>

                <h1>Imprimir Boletim</h1>
            </button>
            <button class="col-span-1 md:w-64 h-20 rounded-md bg-slate-300 flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>

                <h1>Histórico Escolar</h1>
            </button>
            <button class="col-span-1 md:w-64 h-20 rounded-md bg-slate-300 flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
                </svg>

                <h1>Declaração de Matricula</h1>
            </button>
        </div>
    </div>

    <x-modal.modal-md name="imprimir-diarios" title="Diários">
        <x-slot:body>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                <div class="col-span-1 flex flex-col">
                    <label for="">Diário:</label>
                    <select class="border-2 border-gray-300 rounded-md px-2 py-3 outline-none">
                        <option value="">Selecione uma diário</option>
                        <option value="frequencia">Diário de frequência</option>
                        <option value="conteudo">Diário de conteudo</option>
                    </select>
                </div>
                <div class="col-span-1 flex flex-col">
                    <label for="">Disciplina:</label>
                    <select class="border-2 border-gray-300 rounded-md px-2 py-3 outline-none">
                        <option value="">Selecione uma disciplina</option>
                        @foreach($turma->disciplines()->get() as $discipline)
                        <option value="{{$discipline->id}}">{{$discipline->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
        <x-slot:footer>
                <div x-on:click="$dispatch('close-modal')" class="bg-slate-400 rounded-md px-3 py-1 cursor-pointer border-2 border-slate-400"><i class="bi bi-x-circle"></i> Fechar</div>
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 rounded-md px-3 py-1"><i class="bi bi-check2-circle"></i> Imprimir</button>
        </x-slot:footer>
     </x-modal.modal-md>
@include('components/footer')
</div>
