<x-app-layout>
    <div x-data="{ tab: 'general' }" class="relative">

        <x-slot name="header">
            <div
                class="flex items-center justify-between sticky top-0 z-50 bg-white/95 backdrop-blur-sm py-2 px-4 shadow-sm rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('admin.settings') }}
                </h2>

                <div class="flex items-center gap-4">
                    {{-- زر الحفظ ثابت فوق --}}
                    <x-primary-button onclick="document.getElementById('settings-form').submit()">
                        {{ __('admin.save_all_settings') }}
                    </x-primary-button>
                </div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- نظام التبويبات الاحترافي --}}
                <div class="flex bg-white p-2 rounded-t-lg shadow-sm border-b overflow-x-auto space-x-2">
                    <button @click="tab = 'general'"
                        :class="tab === 'general' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300">General</button>
                    <button @click="tab = 'social'"
                        :class="tab === 'social' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300">Social Links</button>
                    <button @click="tab = 'about'"
                        :class="tab === 'about' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300">Identity & About</button>
                    <button @click="tab = 'donations'"
                        :class="tab === 'donations' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300">Donations Settings</button>
                    <button @click="tab = 'sections'"
                        :class="tab === 'sections' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-500 hover:bg-gray-100'"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300">Site Content</button>
                </div>

                <div class="bg-white shadow-lg rounded-b-lg">
                    <div class="p-8 text-gray-900">
                        <form action="{{ route('dashboard.settings') }}" method="POST" id="settings-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            {{-- 1. General Settings --}}
                            <div x-show="tab === 'general'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-95">
                                <h3 class="text-xl font-bold mb-6 text-blue-700 border-r-4 border-blue-600 pr-3 italic">
                                    General Information</h3>
                                <div class="grid gap-6">
                                    {{-- Logo --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="site_logo" :value="__('admin.site_logo')" />
                                        <div class="col-span-3">
                                            <x-text-input id="site_logo" class="block w-full border-dashed"
                                                type="file" name="site_logo" />
                                            @if (isset($settings['site_logo']))
                                                <img class="mt-2 w-32 h-20 object-contain rounded-lg border shadow-sm"
                                                    src="{{ asset('storage/custom/' . $settings['site_logo']) }}"
                                                    alt="logo">
                                            @endif
                                        </div>
                                    </div>
                                    {{-- Call Us --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="call_us" :value="__('admin.call_us')" />
                                        <x-text-input id="call_us" name="call_us" class="col-span-3 block w-full"
                                            type="text" :value="$settings['call_us'] ?? ''" />
                                    </div>
                                    {{-- Email --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="email" :value="__('admin.email')" />
                                        <x-text-input id="email" name="email" class="col-span-3 block w-full"
                                            type="email" :value="$settings['email'] ?? ''" />
                                    </div>
                                    {{-- Address --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="address" :value="__('admin.address')" />
                                        <x-text-input id="address" name="address" class="col-span-3 block w-full"
                                            type="text" :value="$settings['address'] ?? ''" />
                                    </div>
                                </div>
                            </div>

                            {{-- 2. Social Links --}}
                            <div x-show="tab === 'social'" x-transition:enter="transition ease-out duration-300">
                                <h3 class="text-xl font-bold mb-6 text-blue-700 border-r-4 border-blue-600 pr-3 italic">
                                    Social Media Accounts</h3>
                                <div class="grid gap-6">
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="facebook" :value="__('admin.facebook')" />
                                        <x-text-input id="facebook" name="facebook" class="col-span-3 block w-full"
                                            type="url" :value="$settings['facebook'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="twitter" :value="__('admin.twitter_x')" />
                                        <x-text-input id="twitter" name="twitter" class="col-span-3 block w-full"
                                            type="url" :value="$settings['twitter'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="instagram" :value="__('admin.instagram')" />
                                        <x-text-input id="instagram" name="instagram" class="col-span-3 block w-full"
                                            type="url" :value="$settings['instagram'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="youtube" :value="__('admin.youtube')" />
                                        <x-text-input id="youtube" name="youtube" class="col-span-3 block w-full"
                                            type="url" :value="$settings['youtube'] ?? ''" />
                                    </div>
                                </div>
                            </div>

                            {{-- 3. Identity & About --}}
                            <div x-show="tab === 'about'" x-transition:enter="transition ease-out duration-300">
                                <h3 class="text-xl font-bold mb-6 text-blue-700 border-r-4 border-blue-600 pr-3 italic">
                                    Site Identity & Mission</h3>
                                <div class="grid gap-6">
                                    {{-- About Image --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="about_image" :value="__('admin.about_image')" />
                                        <div class="col-span-3">
                                            <x-text-input id="about_image" type="file" name="about_image"
                                                class="block w-full" />
                                            @if (isset($settings['about_image']))
                                                <img class="mt-2 w-32 h-20 object-cover rounded shadow"
                                                    src="{{ asset('storage/custom/' . $settings['about_image']) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="about_title" :value="__('admin.about_title')" />
                                        <x-text-input id="about_title" name="about_title"
                                            class="col-span-3 block w-full" type="text" :value="$settings['about_title'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4">
                                        <x-input-label for="about_description" :value="__('admin.about_description')" />
                                        <textarea id="about_description" name="about_description"
                                            class="col-span-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            rows="4">{{ $settings['about_description'] ?? '' }}</textarea>
                                    </div>
                                    <hr class="my-4">
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="mission_title" :value="__('admin.mission_title')" />
                                        <x-text-input id="mission_title" name="mission_title"
                                            class="col-span-3 block w-full" type="text" :value="$settings['mission_title'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4">
                                        <x-input-label for="mission_content" :value="__('admin.mission_content')" />
                                        <textarea id="mission_content" name="mission_content"
                                            class="col-span-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            rows="4">{{ $settings['mission_content'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- 4. Donations Settings --}}
                            <div x-show="tab === 'donations'" x-transition:enter="transition ease-out duration-300">
                                <h3
                                    class="text-xl font-bold mb-6 text-blue-700 border-r-4 border-blue-600 pr-3 italic">
                                    Donations & Crowdfunding</h3>
                                <div class="grid gap-6">
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="donation_title" :value="__('admin.donation_title')" />
                                        <x-text-input id="donation_title" name="donation_title"
                                            class="col-span-3 block w-full" type="text" :value="$settings['donation_title'] ?? ''" />
                                    </div>
                                    <div class="grid grid-cols-4 gap-4">
                                        <x-input-label for="donation_description" :value="__('admin.donation_description')" />
                                        <textarea id="donation_description" name="donation_description"
                                            class="col-span-3 block w-full border-gray-300 rounded-md shadow-sm rows-3">{{ $settings['donation_description'] ?? '' }}</textarea>
                                    </div>
                                    {{-- Payment Gateway placeholders --}}
                                    <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200 col-span-4">
                                        <p class="text-yellow-700 text-sm">💡 <strong>Note:</strong> Payment API
                                            credentials will be handled via the Logic you provide next.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- 5. Site Content (Sections) --}}
                            <div x-show="tab === 'sections'" x-transition:enter="transition ease-out duration-300">
                                <h3
                                    class="text-xl font-bold mb-6 text-blue-700 border-r-4 border-blue-600 pr-3 italic">
                                    Homepage Sections Control</h3>
                                <div class="grid gap-6">
                                    {{-- Banner Section --}}
                                    <div class="p-4 border rounded-lg">
                                        <h4 class="font-bold mb-4">Hero Banner</h4>
                                        <div class="grid gap-4">
                                            <div class="grid grid-cols-4 gap-4 items-center">
                                                <x-input-label for="banner_title" :value="__('admin.banner_title')" />
                                                <x-text-input id="banner_title" name="banner_title"
                                                    class="col-span-3 block w-full" type="text"
                                                    :value="$settings['banner_title'] ?? ''" />
                                            </div>
                                            <div class="grid grid-cols-4 gap-4 items-center">
                                                <x-input-label for="banner_subtitle" :value="__('admin.banner_subtitle')" />
                                                <x-text-input id="banner_subtitle" name="banner_subtitle"
                                                    class="col-span-3 block w-full" type="text"
                                                    :value="$settings['banner_subtitle'] ?? ''" />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Features Section --}}
                                    <div class="grid grid-cols-4 gap-4 items-center">
                                        <x-input-label for="features_section_title" :value="__('admin.features_title')" />
                                        <x-text-input id="features_section_title" name="features_section_title"
                                            class="col-span-3 block w-full" type="text" :value="$settings['features_section_title'] ?? ''" />
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
