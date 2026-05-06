<!-- Title -->
<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $service->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $service->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Icon -->
<div class="mt-4">
    <x-input-label for="icon" :value="__('admin.icon')" />
    <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" :value="old('icon', $service->icon)" />
    @if ($service && $service->icon)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($service->icon) }}"
            alt="service image">
    @endif
    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
</div>
<!-- Icon -->
{{-- <div class="mt-4">
        <x-input-label for="image" :value="__('admin.image')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $service->image)" />
        @if ($service && $service->image)
            <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($service->image->path) }}"
                alt="service image">
        @endif
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div> --}}
<!-- Content -->
<div class="grid grid-cols-2 gap-4">
    <!-- English Content -->
    <div class="mt-4">
        <x-input-label for="content_en" :value="__('admin.english content')" />
        <x-textarea id="content_en" class="block mt-1 w-full" name="content_en"
            rows=5>{{ old('content_en', $service->content['en'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
    </div>
    <!-- Arabic Content -->
    <div class="mt-4">
        <x-input-label for="content_ar" :value="__('admin.arabic content')" />
        <x-textarea id="content_ar" class="block mt-1 w-full" name="content_ar"
            rows=5>{{ old('content_ar', $service->content['ar'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
    </div>
</div>
