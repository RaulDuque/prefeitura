    <x-app-layout>
        <x-slot name="header">
            {{ __('Prefeituras') }}
        </x-slot>

            <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
                <div class="overflow-x-auto w-full">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-black-500 uppercase bg-blue-500 border-b">

                                <th class="px-4 py-3">Nomes</th>
                                <th class="px-4 py-3">Cidades</th>
                                <th class="px-4 py-3">Telefones</th>
                                <th class="px-4 py-3">Habitantes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">

                            @foreach ($cityHalls as $cityHall)
                                <tr class="text-black-700">
                                    <td class="px-4 py-3 text-sm">
                                        {{  $cityHall->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $cityHall->city->name }}
                                    <td class="px-4 py-3 text-sm">
                                        {{  $cityHall->phone }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{  $cityHall->population }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </x-app-layout>

