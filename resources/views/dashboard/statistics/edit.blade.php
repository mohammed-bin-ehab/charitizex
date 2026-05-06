<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.edit statistics') }}
            </h2>
            <a class="font-semibold text-m text-gray-400 leading-tight bg-green-600 p-2 px-8 rounded text-white hover:bg-green-700 duration-200"
                href="{{ route('dashboard.statistics.index') }}">{{ __('admin.all statistics') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.statistics.update', $statistic->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.statistics._form')
                        <x-primary-button class=" px-8 mt-4">
                            {{ __('admin.update') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
