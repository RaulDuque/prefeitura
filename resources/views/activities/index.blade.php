<x-app-layout>
    <x-slot name="header">
            {{ __('Atividades') }}
    </x-slot>
    <div class="section">
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase bg-blue-500 border-b">
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Prefeitura</th>
                                <th class="px-4 py-3">Cidade</th>
                                <th class="px-4 py-3">Telefones</th>
                                <th class="px-4 py-3">Tipo</th>
                                <th class="px">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



