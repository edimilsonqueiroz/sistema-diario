@props(['name','title'])
<div
 x-data = "{ show: false, name: '{{ $name }}' }"
 x-show = "show"
 x-on:open-modal.window = "show = ($event.detail.name === name)"
 x-on:close-modal.window = "show = false"
 x-on:keydown.escape.window = "show = false"
 style="display:none;"
 x-transition.scale.origin.top.right
 x-transition.opacity
 x-transition.duration.200ms
 class="fixed z-40 flex items-center justify-center inset-0">
    <div x-on:click="$dispatch('close-modal')" class="fixed inset-0 bg-gray-800 opacity-20"></div>
    <div class="bg-white shadow-md rounded m-auto absolute z-50 md:max-w-[900px] md:w-[900px] w-[95%]  max-w-[95%]">
        <div class="flex h-auto flex-col">
            <div class="h-12 max-h-12 p-3 flex items-center bg-slate-100 rounded-tl rounded-tr">
                @if(isset($title))
                <div class="py-3 flex items-center font-semibold uppercase justify-center">{{ $title}}</div>
                @endif
            </div>
            <div class="flex-1">
                <div class="p-3 h-full max-h-[500px] overflow-y-auto flex flex-col">
                    {{ $body }}
                </div>
            </div>
            <div class="h-16  max-h-16 px-3 flex items-center text-xl justify-end rounded-bl rounded-br bg-slate-100">{{ $footer }}</div>
        </div>
    </div>
</div>