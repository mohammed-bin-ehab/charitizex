<div class="grid grid-cols-2 gap-4">
    <!-- Title English  -->
    <div class="mt-4">
        <x-input-label for="title_en" :value="__('admin.english title')" />
        <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en', $campaign->title['en'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
    </div>
    <!-- Title Arabic  -->
    <div class="mt-4">
        <x-input-label for="title_ar" :value="__('admin.arabic title')" />
        <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar', $campaign->title['ar'] ?? '')" required
            autofocus />
        <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
    </div>
</div>
<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('admin.image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
    @if ($campaign && $campaign->image)
        <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($campaign->image->path) }}"
            alt="slider image">
    @endif
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<!-- Gallery -->
<div class="mt-4">
    <x-input-label for="gallery" :value="__('admin.gallery')" />
    <x-text-input id="gallery" class="block mt-1 w-full" type="file" name="gallery[]" multiple />
    <div class="flex ">
        @if ($campaign && $campaign->gallery)
            @foreach ($campaign->gallery as $item)
                <img class="mt-1 w-24 h-16 object-cover rounded-md border" src="{{ asset($item->path) }}"
                    alt="slider image">
                <a href="{{ route('dashboard.delete_image', [$campaign->id, $item->id]) }}" type="submit"
                    onclick="return confirm('Are you sure!?')"
                    class="w-6 h-6 flex items-center justify-center bg-gradient-to-br from-red-500 to-red-700 text-white rounded-md shadow hover:scale-105 transition del_image">
                    <i class="fas fa-trash"></i>
                </a>
            @endforeach
        @endif
    </div>
    <x-input-error :messages="$errors->get('gallery')" class="mt-2" />
</div>
<div class="grid grid-cols-2 gap-4">
    <!-- English Content -->
    <div class="mt-4">
        <x-input-label for="content_en" :value="__('admin.english content')" />
        <x-textarea id="content_en" class="block mt-1 w-full" name="content_en"
            rows=5>{{ old('content_en', $campaign->content['en'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
    </div>
    <!-- Arabic Content -->
    <div class="mt-4">
        <x-input-label for="content_ar" :value="__('admin.arabic content')" />
        <x-textarea id="content_ar" class="block mt-1 w-full" name="content_ar"
            rows=5>{{ old('content_ar', $campaign->content['ar'] ?? '') }}</x-textarea>
        <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
    </div>
</div>
<!--  Goal & Category id , Status -->
<div class="grid grid-cols-3 gap-4">
    <!--  Goal -->
    <div class="mt-4">
        <x-input-label for="goal" :value="__('admin.goal')" />
        <x-text-input id="goal" class="block mt-1 w-full" type="number" name="goal" :value="old('goal', $campaign->goal)"
            required />
        <x-input-error :messages="$errors->get('goal')" class="mt-2" />
    </div>
    <!--  Category id -->
    <div class="mt-4">
        <x-input-label for="category_id" :value="__('admin.categories')" />
        <x-select id="category_id" class="block mt-1 w-full" name="category_id" :value="old('category_id', $campaign->category_id)" required>
            @foreach ($categories as $category)
                <option @selected(old('category_id', $campaign->category_id) == $category->id) value="{{ $category->id }}">{{ $category->title_trans }}</option>
            @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
    </div>
    <!-- Status  -->
    <div class="mt-4">
        <x-input-label for="status" :value="__('admin.status')" />
        <x-select id="status" class="block mt-1 w-full" name="status" :value="old('status', $campaign->status)" required>
            <option @selected(old('status', $campaign->status) == 'active') value="active">Active</option>
            <option @selected(old('status', $campaign->status) == 'inactive') value="inactive">Inactive</option>
        </x-select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>
</div>
