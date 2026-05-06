<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline justify-between">
                {{ __('admin.edit sliders') }}
            </h2>
            <a class="font-semibold text-m text-gray-400 leading-tight bg-green-600 p-2 px-8 rounded text-white hover:bg-green-700 duration-200"
                href="{{ route('dashboard.sliders.index') }}">{{ __('admin.all sliders') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.sliders.update', $slider->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.sliders._form')
                        {{-- <!-- Title  -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('admin.title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title', $slider->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <!-- Image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('admin.image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                                :value="old('image', $slider->image)" />
                            @if ($slider && $slider->image)
                                <img class="rounded mt-1 border border-gray-300 p-0.5" width="100px"
                                    src="{{ asset($slider->image->path) }}"alt="">
                            @endif
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('admin.content')" />
                            <x-textarea id="content" class="block mt-1 w-full" name="content"
                                rows=5>{{ old('content', $slider->content) }}</x-textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Button 1 Text  -->
                            <div class="mt-4">
                                <x-input-label for="btn1_text" :value="__('admin.button 1 Text')" />
                                <x-text-input id="btn1_text" class="block mt-1 w-full" type="text" name="btn1_text"
                                    :value="old('btn1_text', $slider->btn1_text)" required />
                                <x-input-error :messages="$errors->get('btn1_text')" class="mt-2" />
                            </div>
                            <!-- Button 1 Link  -->
                            <div class="mt-4">
                                <x-input-label for="btn1_link" :value="__('admin.button 1 Link')" />
                                <x-text-input id="btn1_link" class="block mt-1 w-full" type="text" name="btn1_link"
                                    :value="old('btn1_link', $slider->btn1_link)" required />
                                <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Button 2 Text  -->
                            <div class="mt-4">
                                <x-input-label for="btn2_text" :value="__('admin.button 2 Text')" />
                                <x-text-input id="btn2_text" class="block mt-1 w-full" type="text" name="btn2_text"
                                    :value="old('btn2_text', $slider->btn2_text)" required />
                                <x-input-error :messages="$errors->get('btn2_text')" class="mt-2" />
                            </div>
                            <!-- Button 2 Link  -->
                            <div class="mt-4">
                                <x-input-label for="btn2_link" :value="__('admin.button 2 Link')" />
                                <x-text-input id="btn2_link" class="block mt-1 w-full" type="text" name="btn2_link"
                                    :value="old('btn2_link', $slider->btn2_link)" required />
                                <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
                            </div>
                        </div> --}}
                        <x-primary-button class=" px-8 mt-4">
                            {{ __('edit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
