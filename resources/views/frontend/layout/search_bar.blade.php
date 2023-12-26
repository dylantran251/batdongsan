<div id="search-bar" class="w-full border-t shadow-lg py-3">
    <div class="max-w-[1200px] mx-auto grid grid-cols-11 gap-6">
        <div class="col-span-5 flex items-center gap-4">
            <div class="">
                <select class="choose-category rounded shadow border py-2.5 px-4 text-[14px]" id="choose-category">
                    @foreach ($categoriesPost as $category)
                        <option class="" value="{{ $category['id'] }}" data-url = "{{ route('search', ['category_name' => $category->name]) }}"
                        {{ ((request('category_name') && $category->name == request('category_name'))) ||
                        (isset($post) && $category->name === $post->category->name) ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="relative flex items-center rounded bg-[#EEEEEE] w-full">
                <div class="flex items-center px-2 rounded-l">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="6" fill="#FFFFFF" fill-opacity="1" stroke="white" stroke-width="1.2"/>
                        <path d="M11 8C10.606 8 10.2159 8.0776 9.85195 8.22836C9.48797 8.37913 9.15726 8.6001 8.87868 8.87868C8.6001 9.15726 8.37913 9.48797 8.22836 9.85195C8.0776 10.2159 8 10.606 8 11" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                        <path d="M20 20L17 17" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                </div>
                <input type="text" name="keyword" class="enter-keyword p-2 rounded-r w-full text-base bg-[#EEEEEE] text-[#4e4e4e]" value="{{ request('keyword') ? request('keyword') : '' }}" placeholder="Nhà đất Mỹ Đình">
            </div>
        </div>
        @include('frontend.search_attributes.index', ['style' => 1])
    </div>
</div>





