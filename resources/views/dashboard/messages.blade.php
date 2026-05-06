<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.messages') }}
            </h2>
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
                                        {{ __('admin.name') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.email') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.subject') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.received_at') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($messages as $message)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-heading whitespace-nowrap px-6 py-4 text-center">
                                            {{ $message->id }}
                                        </th>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $message->name }}
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $message->email }}
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $message->subject }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $message->created_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'show-message-{{ $message->id }}')">{{ __('Show Message') }}</x-primary-button>

                                            <x-modal name="show-message-{{ $message->id }}" focusable>
                                                <form method="post"
                                                    action="{{ route('dashboard.messages.delete', $message->id) }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __(" The Message it's ") }}
                                                    </h2>

                                                    <p class="mt-1 text-lg text-gray-600">
                                                        {{ $message->message }}
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Delete Message') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
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
