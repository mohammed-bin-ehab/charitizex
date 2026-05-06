<!-- Title -->
<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $statistic->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $statistic->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Icon -->
<div class="mt-4">
    <x-input-label for="icon" :value="__('admin.icon')" />
    <x-text-input id="icon" class="block mt-1 w-full" type="file" name="icon" :value="old('icon', $statistic->icon)" />
    @if ($statistic && $statistic->icon)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($statistic->icon) }}"
            alt="statistic image">
    @endif
    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
</div>
<!-- Content -->
<div class="mt-4">
    <x-input-label for="number" :value="__('admin.number')" />
    <x-text-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number', $statistic->number)" required
        autofocus />
    <x-input-error :messages="$errors->get('number')" class="mt-2" />
</div>
