<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Criar Contato ") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Nome') }}
                                    <input id="name" type="text" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="name" autocomplete="name" autofocus>
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="data" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Data de termino do mandato') }}
                                    <input id="data" type="date" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="data" autocomplete="data" autofocus>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="contact_type_id" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Tipo de contato') }}
                                    <select id="contact_type_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="contact_type_id" autocomplete="contact_type_id" autofocus>
                                        <option value="contact_type_id->name">Selecione</option>
                                            @foreach ($contactTypes as $contactType)
                                                <option value="{{ $contactType->id }}">{{ $contactType->name }}</option>
                                            @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-span-6">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
