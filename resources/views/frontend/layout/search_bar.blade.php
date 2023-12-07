<div id="search-bar" class="w-full border-t shadow-lg mb-10 py-3">
    <div class="mx-5 xl:container xl:mx-auto xl:px-20 md:grid md:grid-cols-1 xl:flex xl:justify-between items-center gap-4">
        <div class="md:grid md:grid-cols-4 xl:flex xl:w-2/5 items-center gap-4">
            <div class="md:col-span-1 mb-2 md:mb-0 xl:w-2/5">
                <select class="choose-category rounded shadow border p-2 w-full" id="choose-category">
                    @foreach ($categoryPosts as $category)
                        <option class="" value="{{ $category['id'] }}" data-url = "{{ route('search', ['category_name' => $category->name]) }}"
                        {{ ((request('category_name') && $category->name == request('category_name'))) ||
                        (isset($post) && $category->name === $post->category->name) ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-3 mb-2 md:mb-0 xl:w-3/5 relative flex items-center rounded" style="background: #EEEEEE;">
                <div class="flex items-center px-4 rounded-l">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="6" fill="#7E869E" fill-opacity="0.25" stroke="white" stroke-width="1.2"/>
                        <path d="M11 8C10.606 8 10.2159 8.0776 9.85195 8.22836C9.48797 8.37913 9.15726 8.6001 8.87868 8.87868C8.6001 9.15726 8.37913 9.48797 8.22836 9.85195C8.0776 10.2159 8 10.606 8 11" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                        <path d="M20 20L17 17" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                </div>
                <input type="text" name="keyword" class="enter-keyword p-2 w-full rounded-r text-base" value="{{ request('keyword') ? request('keyword') : '' }}" style="background: #EEEEEE;" placeholder="Nhà đất Mỹ Đình">
            </div>
        </div>
        @include('frontend.search_attributes.index', ['style' => 1])
    </div>
</div>





