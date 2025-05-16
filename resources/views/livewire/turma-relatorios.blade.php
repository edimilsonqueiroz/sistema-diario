<div class="w-full h-full overflow-x-hidden">
@include('components/header-turma')
    <div class="p-3 w-full overflow-y-auto">
        <div class="flex justify-between rounded-md px-2 mb-5 bg-slate-50 py-5">
            <h1><b>TURMA: </b>{{$turma->name}}</h1>
            @foreach($turma->school()->get() as $school)
            <div><b>ESCOLA: </b>{{$school->name}}</div>
            @endforeach
        </div>
        
        <div class="grid grid-cols-3 gap-5 bg-white rounded-md p-2">
            <div class="flex flex-col col-span-1">
                <label for="">Relatório:</label>
                <select class="border-2 border-gray-300 p-2 outline-none rounded-md">
                    <option value="">Selecione um Relatório</option>
                    <option value="1">Diário conteúdo</option>
                    <option value="2">Diário Frequência</option>
                    <option value="3">Boletim</option>
                </select>
            </div>
            <div class="flex flex-col col-span-1">
                <label for="">Bimestre:</label>
                <select class="border-2 border-gray-300 p-2 outline-none rounded-md">
                    <option value="">Selecione o Bimestre</option>
                    <option value="1">1º BIMESTRE</option>
                    <option value="2">2º BIMESTRE</option>
                    <option value="3">3º BIMESTRE</option>
                    <option value="4">3º BIMESTRE</option>
                </select>
            </div>
            <div class="flex flex-col col-span-1">
                <label for="">Ano:</label>
                <select class="border-2 border-gray-300 p-2 outline-none rounded-md">
                    <option value="">Selecione o ano</option>
                    @for($ano = 2025; $ano >=1990; $ano--)
                    <option value="{{$ano}}">{{$ano}}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-3">
                <fieldset class="border-2 p-5 border-gray-300 rounded-md">
                    <legend class="p-2">Selecione um aluno</legend>
                    <input class="border-2 border-gray-300 p-2 mb-4 w-[50%] outline-none rounded-md" placeholder="Pesquisar pelo nome" type="text">
                    @foreach($turma->students()->get() as $student)
                    <div class="bg-slate-300 my-2 flex items-center p-5 rounded-md">
                        <input class="w-4 h-4 mr-2" type="checkbox">
                        <div>{{$student->name}}</div>
                    </div>
                    @endforeach
                </fieldset>
                
            </div>
            <div class="flex justify-end items-end col-span-3">
                <button type="submit" class="bg-teal-600 border-2 border-teal-600 ml-2 text-xl rounded-md px-3 py-2"><i class="bi bi-check2-circle"></i> Imprimir relatório</button>
            </div>
        </div>
    </div>
@include('components/footer')
</div>
