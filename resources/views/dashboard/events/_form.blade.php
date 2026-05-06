<!-- Title -->
<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $event->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $event->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('admin.image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $event->image)" />
    @if ($event && $event->image)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($event->image) }}" alt="event image">
    @endif
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<!-- Content -->
<div class="grid grid-cols-2 gap-4">
    <!-- English Content -->
    <div class="mt-4">
        <x-input-label for="content_en" :value="__('admin.english content')" />
        <x-textarea id="content_en" class="block mt-1 w-full" name="content_en"
            rows=5>{{ old('content_en', $event->content['en'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
    </div>
    <!-- Arabic Content -->
    <div class="mt-4">
        <x-input-label for="content_ar" :value="__('admin.arabic content')" />
        <x-textarea id="content_ar" class="block mt-1 w-full" name="content_ar"
            rows=5>{{ old('content_ar', $event->content['ar'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
    </div>
</div>
<!-- Hour & date,location -->
<div class="grid grid-cols-3 gap-4">
    <!-- Hour -->
    <div class="mt-4">
        <x-input-label for="hour" :value="__('admin.hour')" />
        <x-text-input id="hour" class="block mt-1 w-full" type="time" name="hour" :value="old('hour', $event->hour)" />
        <x-input-error :messages="$errors->get('hour')" class="mt-2" />
    </div>
    <!-- Date -->
    <div class="mt-4">
        <x-input-label for="date" :value="__('admin.date')" />
        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $event->date)" />
        <x-input-error :messages="$errors->get('date')" class="mt-2" />
    </div>
    <!-- Location -->
    <div class="mt-4">
        <x-input-label for="location" :value="__('admin.location')" />
        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
            placeholder="Gaza - Al Remal" :value="old('location', $event->location)" />
        <x-input-error :messages="$errors->get('location')" class="mt-2" />
    </div>
</div>
