<div class="w-full h-full overflow-x-hidden">
@include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div class="bg-white mb-5 w-full rounded-md justify-between items-center flex flex-col md:flex-row p-4 shadow-md">
            <div class="flex flex-col md:w-[50%] px-2 w-full">
                <input wire:model.live="query" type="text" class="outline-none text-xl border-2 rounded-md p-3 border-gray-400" placeholder="Pesquisar por nome da disciplina">
            </div>
            
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            
            @foreach($disciplines as $discipline)
            <a href="{{route('discipline-contents', [$turma->id, $discipline->id])}}">
                <div class="bg-slate-100 flex shadow-md rounded-md col-span-1">
                    <div class="rounded-l-md px-2 flex justify-center items-center bg-cyan-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <div class="flex-1 p-2">
                        <label for="">Disciplina:</label>
                        <h1 class="text-xl font-semibold">{{$discipline->name}}</h1>
                        
                        <label for="">Turma:</label>
                        
                        <h2 class="font-semibold">{{$turma->name}}</h2>
                        
                        <label for="">Total de alunos: {{count($discipline->students()->get())}}</label>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@include('components/footer')
</div>