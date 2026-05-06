<!-- Title -->
<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $testimonial->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $testimonial->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('admin.image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $testimonial->image)" />
    @if ($testimonial && $testimonial->image)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($testimonial->image) }}"
            alt="testimonial image">
    @endif
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<!-- Position & rate,review -->
<!-- Review -->
<div class="mt-4">
    <x-input-label for="review" :value="__('admin.review')" />
    <x-text-input id="review" class="block mt-1 w-full" type="text" name="review"
        placeholder="talk any thing man" :value="old('review', $testimonial->review)" />
    <x-input-error :messages="$errors->get('review')" class="mt-2" />
</div>
<div class="grid grid-cols-2 gap-4">
    <!-- Position -->
    <div class="mt-4">
        <x-input-label for="position" :value="__('admin.position')" />
        <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position', $testimonial->position)" />
        <x-input-error :messages="$errors->get('position')" class="mt-2" />
    </div>
    <!-- Rate -->
    <div class="mt-4">
        <x-input-label for="rate" :value="__('admin.rate')" />
        <x-text-input id="rate" class="block mt-1 w-full" type="number" name="rate" :value="old('rate', $testimonial->rate)" />
        <x-input-error :messages="$errors->get('rate')" class="mt-2" />
    </div>
</div>
