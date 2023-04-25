<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Registrar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <form action="{{ route('vehicles.store') }}" method="POST">
                    @csrf
                    <div class="text-white grid lg:grid-cols-2 gap-3">
                        <div>
                            <label class="text-black dark:text-white">Tipo de Vehículo</label>
                            <span class="ml-3 text-red-400">
                                @error('type')
                                    *{{ $message }}
                                @enderror
                            </span>
                            @if ($types->count() == 0)
                                <select class="text-black rounded border-gray-200 w-full mb-4" disabled>
                                    <option>DEBES CREAR UNA TARIFA PRIMERO</option>
                                </select>
                            @else
                                <select name="type" class="text-black rounded border-gray-200 w-full mb-4">
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Placa</label>
                            <span class="ml-3 text-red-400">
                                @error('plate')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="plate"
                                class="text-black rounded border-gray-200 w-full mb-4 uppercase" maxlength="10">
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Fecha de Entrada</label>
                            <span class="ml-3 text-red-400">
                                @error('start_date')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="date" name="start_date"
                                class="text-black rounded border-gray-200 w-full mb-4"
                                value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly>
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Hora de Entrada</label>
                            <span class="ml-3 text-red-400">
                                @error('start_time')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="time" name="start_time"
                                class="text-black rounded border-gray-200 w-full mb-4" step="1"
                                value="{{ \Carbon\Carbon::now()->format('H:i:s') }}" readonly>
                        </div>

                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="mt-4 mb-4 flex items-center justify-between">
                        <a href="{{ route('vehicles.index') }}"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 
                            font-medium rounded-lg py-3 font-bold text-sm px-5 dark:bg-red-600 dark:hover:bg-red-700
                            focus:outline-none dark:focus:ring-red-800">VOLVER</a>

                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 
                            font-medium rounded-lg py-3 font-bold text-sm px-5 dark:bg-green-600 dark:hover:bg-green-700
                            focus:outline-none dark:focus:ring-green-800">ENVIAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
