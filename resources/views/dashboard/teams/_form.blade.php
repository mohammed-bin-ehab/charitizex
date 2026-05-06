<!-- Title -->
<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $team->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $team->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('admin.image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $team->image)" />
    @if ($team && $team->image)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($team->image) }}" alt="team image">
    @endif
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<!-- Content -->
<div class="grid grid-cols-2 gap-4">
    <!-- English Position -->
    <div class="mt-4">
        <x-input-label for="position_en" :value="__('admin.english position')" />
        <x-text-input id="position_en" class="block mt-1 w-full" type="text" name="position_en" :value="old('position_en', $team->position['en'] ?? '')" />
        <x-input-error :messages="$errors->get('position_en')" class="mt-2" />
    </div>
    <!-- Arabic Position -->
    <div class="mt-4">
        <x-input-label for="position_ar" :value="__('admin.arabic position')" />
        <x-text-input id="position_ar" class="block mt-1 w-full" type="text" name="position_ar" :value="old('position_ar', $team->position['ar'] ?? '')" />
        <x-input-error :messages="$errors->get('position_ar')" class="mt-2" />
    </div>
</div>
<!-- facebook | instagram | x | linkedIn | youTube -->
<div class="grid grid-cols-2 gap-4">
    <!-- Facebook -->
    <div class="mt-4">
        <x-input-label for="facebook" :value="__('admin.facebook')" />
        <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook', $team->facebook)" />
        <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
    </div>
    <!-- Instagram -->
    <div class="mt-4">
        <x-input-label for="instagram" :value="__('admin.instagram')" />
        <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instagram', $team->instagram)" />
        <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
    </div>
</div>
<div class="grid grid-cols-2 gap-4">
    <!-- X -->
    <div class="mt-4">
        <x-input-label for="x" :value="__('admin.x')" />
        <x-text-input id="x" class="block mt-1 w-full" type="text" name="x" :value="old('x', $team->x)" />
        <x-input-error :messages="$errors->get('x')" class="mt-2" />
    </div>
    <!-- LinkedIn -->
    <div class="mt-4">
        <x-input-label for="linkedIn" :value="__('admin.linked in')" />
        <x-text-input id="linkedIn" class="block mt-1 w-full" type="text" name="linkedIn" :value="old('linkedIn', $team->linkedIn)" />
        <x-input-error :messages="$errors->get('linkedIn')" class="mt-2" />
    </div>
</div>
<!-- YouTube -->
<div class="mt-4">
    <x-input-label for="youTube" :value="__('admin.youtube')" />
    <x-text-input id="youTube" class="block mt-1 w-full" type="text" name="youTube" :value="old('youTube', $team->youTube)" />
    <x-input-error :messages="$errors->get('youTube')" class="mt-2" />
</div>
