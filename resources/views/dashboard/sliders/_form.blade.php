<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $slider->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $slider->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('admin.image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $slider->image)" />
    @if ($slider && $slider->image)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($slider->image->path) }}"
            alt="slider image">
    @endif
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<div class="grid grid-cols-2 gap-4">
    <!-- English Content -->
    <div class="mt-4">
        <x-input-label for="content_en" :value="__('admin.english content')" />
        <x-textarea id="content_en" class="block mt-1 w-full" name="content_en"
            rows=5>{{ old('content_en', $slider->content['en'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
    </div>
    <!-- Arabic Content -->
    <div class="mt-4">
        <x-input-label for="content_ar" :value="__('admin.arabic content')" />
        <x-textarea id="content_ar" class="block mt-1 w-full" name="content_ar"
            rows=5>{{ old('content_ar', $slider->content['ar'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
    </div>
</div>
<div class="grid grid-cols-3 gap-4">
    <!-- English Button 1 Text  -->
    <div class="mt-4">
        <x-input-label for="btn1_text_en" :value="__('admin.english button 1 text')" />
        <x-text-input id="btn1_text_en" class="block mt-1 w-full" type="text" name="btn1_text_en"
            :value="old('btn1_text_en', $slider->btn1_text['en'] ?? 'Donate Now')" />
        <x-input-error :messages="$errors->get('btn1_text_en')" class="mt-2" />
    </div>
    <!-- Arabic Button 1 Text  -->
    <div class="mt-4">
        <x-input-label for="btn1_text_ar" :value="__('admin.arabic button 1 text')" />
        <x-text-input id="btn1_text_ar" class="block mt-1 w-full" type="text" name="btn1_text_ar"
            :value="old('btn1_text_ar', $slider->btn1_text['ar'] ?? 'تبرع الان')" />
        <x-input-error :messages="$errors->get('btn1_text_ar')" class="mt-2" />
    </div>
    <!-- Button 1 Link  -->
    <div class="mt-4">
        <x-input-label for="btn1_link" :value="__('admin.button 1 link')" />
        <x-text-input id="btn1_link" class="block mt-1 w-full" type="url" name="btn1_link" :value="old('btn1_link', $slider->btn1_link ?? route('front.donations'))" />
        <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
    </div>
</div>
<div class="grid grid-cols-3 gap-4">
    <!-- English Button 2 Text  -->
    <div class="mt-4">
        <x-input-label for="btn2_text_en" :value="__('admin.english button 2 text')" />
        <x-text-input id="btn2_text_en" class="block mt-1 w-full" type="text" name="btn2_text_en" :value="old('btn2_text_en', $slider->btn2_text['en'] ?? 'Join Us Now')"
            required />
        <x-input-error :messages="$errors->get('btn2_text_en')" class="mt-2" />
    </div>
    <!-- Arabic Button 2 Text  -->
    <div class="mt-4">
        <x-input-label for="btn2_text_ar" :value="__('admin.arabic button 2 text')" />
        <x-text-input id="btn2_text_ar" class="block mt-1 w-full" type="text" name="btn2_text_ar"
            :value="old('btn2_text_ar', $slider->btn2_text['ar'] ?? 'انضم الينا')" />
        <x-input-error :messages="$errors->get('btn2_text_ar')" class="mt-2" />
    </div>
    <!-- Button 2 Link  -->
    <div class="mt-4">
        <x-input-label for="btn2_link" :value="__('admin.button 2 link')" />
        <x-text-input id="btn2_link" class="block mt-1 w-full" type="url" name="btn2_link" :value="old('btn2_link', $slider->btn2_link ?? route('front.donations'))" />
        <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
    </div>
</div>
