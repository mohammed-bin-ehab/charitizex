<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.subscriptions') }}
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
                                    <th scope="col" class="px-6 py-3 font-medium text-center ">
                                        {{ __('admin.email') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center ">
                                        {{ __('admin.subscribe_at') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subscriptions as $subscription)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-heading whitespace-nowrap px-6 py-4 text-center">
                                            {{ $subscription->id }}
                                        </th>
                                        <td class="px-6 py-4 text-center font-medium">
                                            {{ $subscription->email }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $subscription->created_at->format('m/d/y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <td colspan="3" class="px-6 py-4">
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
