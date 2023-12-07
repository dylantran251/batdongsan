<div class="mb-4">
    <div class="shadow-lg p-6 rounded-lg bg-white">
        <h1 class="text-black text-[24px] font-bold mb-10">Tags và SEO</h1>
        <div>
            <label for="tags" class="block mb-2 text-base font-bold text-gray-900 dark:text-white">Tags</label>
            <select name="tags" id="tags" data-url="{{ route('tags.all-tags') }}" 
                class="tom-select-ajax w-full border rounded" multiple>
            </select>
            <span class="text-red-500 text-base" id="tags-error"></span>
        </div>
    </div>
</div>