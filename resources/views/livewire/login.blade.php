<div class="w-full h-full overflow-hidden max-h-full bg-white">
   <div class="w-full overflow-hidden flex h-full">
        <div class="w-[50%] md:flex hidden items-center justify-center h-full bg-cyan-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-60">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
        </div>
        <div class="md:w-[50%] w-full flex flex-col overflow-hidden items-center justify-center">
            <div class="flex items-center mb-5 justify-center flex-col">
                <x-icones.icone-school/>
                <h1 class="md:text-5xl text-2xl font-semibold">SISEDU-DIÁRIO</h1>
                <span class="md:text-2xl text-xl">Acesso de Usuário</span>
            </div>
            <div class="w-full md:px-20 md:my-5">
                @if (session('login'))
                <div class="bg-red-400 rounded text-lg text-center p-5">
                    {{ session('login') }}
                </div>
                @endif
            </div>
            <form wire:submit.prevent="authenticate" class="flex flex-col md:w-full px-5 md:px-20">
                <label class="text-xl">Login</label>
                <input placeholder="Informe um e-mail válido" required wire:model="form.email" class="border-2 @error('form.email') border-red-400 @enderror px-2 py-3 text-xl outline-none rounded-md border-gray-300" type="email">
                @error('form.email') <span class="text-red-400">{{ $message }}</span> @enderror
                <label class="mt-5 text-xl">Senha</label>
                <div class="border-2 pr-2 flex items-center @error('form.password') border-red-400 @enderror  rounded-md border-gray-300">
                    <input placeholder="Informe sua senha" class="px-2 py-3 text-xl outline-none flex-1" required wire:model="form.password"  type="password" id="senha">
                    <i class="bi bi-eye text-3xl mr-3" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
                @error('form.password') <span class="text-red-400">{{ $message }}</span> @enderror
                <div class="w-full flex flex-col-reverse md:flex-row items-center justify-between">
                    <a wire:navigate class="text-xl" href="{{route('reset-password')}}">Esqueceu a senha?</a>
                    <button class="bg-cyan-500 mt-8 py-3 mb-5 w-full md:w-[50%] text-xl text-white rounded-md border-0">Entrar</button>
                </div>
                
            </form>
        </div>
   </div>
</div>
