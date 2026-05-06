<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.teams') }}
            </h2>
            <a class="font-semibold text-m text-gray-400 leading-tight bg-green-600 p-2 px-8 rounded text-white hover:bg-green-700 duration-200"
                href="{{ route('dashboard.teams.create') }}">{{ __('admin.add teams') }}</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div
                        class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead
                                class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.id') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.image') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.title') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.created_at') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.updated_at') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teams as $team)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-heading whitespace-nowrap px-6 py-4 text-center">
                                            {{ $team->id }}
                                        </th>
                                        <td class="px-6 py-4 text-center">
                                            <img class="w-24 h-16 object-cover rounded-md border"
                                                src="{{ asset($team->image) }}" alt="team image">

                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $team->title_trans }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $team->created_at->format('d/m/y') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $team->updated_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('dashboard.teams.edit', $team->id) }}"
                                                    class="w-9 h-9 flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-md shadow hover:scale-105 transition {{ app()->getLocale() == 'ar' ? 'me-2' : '' }}">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('dashboard.teams.destroy', $team->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure!?')"
                                                        class="w-9 h-9 flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700 text-white rounded-md shadow hover:scale-105 transition">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <td colspan="6" class="px-6 py-4">
                                            Nooooooooo Data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
