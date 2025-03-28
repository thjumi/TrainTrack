<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-900 dark:text-gray-100 text-center mb-6">
                    Bienvenido, <strong>{{ $user->name }}</strong>.
                </p>
                <div class="list-group">
                    <a href="{{ route('rutinas.index') }}" class="list-group-item list-group-item-action list-group-item-primary">
                        <i class="fas fa-dumbbell"></i> Mis Rutinas
                    </a>
                    <a href="{{ route('reservas.index') }}" class="list-group-item list-group-item-action list-group-item-success">
                        <i class="fas fa-calendar-check"></i> Mis Reservas
                    </a>
                    <a href="{{ route('seguimientos.index') }}" class="list-group-item list-group-item-action list-group-item-info">
                        <i class="fas fa-chart-line"></i> Mis Seguimientos y Progreso
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
