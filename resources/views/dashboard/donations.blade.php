<x-app-layout>

    @push('css')
        <style>
            .completed {
                background-color: #1ff551;
                color: white;
            }

            .processing {
                background-color: #fdc61f;
                color: black;
            }

            .canceled {
                background-color: #fc485a;
                color: white;
            }

            .paypal {
                background-color: #0290ee;
                color: white;
            }

            .stripe {
                background-color: #272c5c;
                color: white;
            }
        </style>
    @endpush

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.donations') }}
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
                                        {{ __('admin.donor') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.campaign') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.amount') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.status') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-left ">
                                        {{ __('admin.payed with') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium text-center">
                                        {{ __('admin.donate_at') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donations as $donation)
                                    <tr
                                        class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-heading whitespace-nowrap px-6 py-4 text-center">
                                            {{ $donation->id }}
                                        </th>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $donation->donor->name }}
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            {{ $donation->campaign->title_trans }}
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            ${{ $donation->amount }}
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            <span
                                                class="capitalize
                                            {{ $donation->status }} px-1 py-0.5 rounded">
                                                {{ $donation->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-left font-medium">
                                            <span
                                                class="capitalize
                                           {{ $donation->payment_gateway }}
                                             px-1 py-0.5 rounded">
                                                {{ $donation->payment_gateway }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $donation->created_at->diffForHumans() }}
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
