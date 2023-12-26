<div id="filter-container" class="grid grid-cols-1 sm:grid-cols-2 xl:col-span-3 md:flex justify-between xl:justify-start xl:flex-col w-full gap-2" data-category-id = {{ $category->id }}>
    <div class=" flex flex-col gap-4 border rounded text-black py-4 w-full mb-4 text-[14px]">
        <p class="font-bold px-6">Lọc theo khoảng giá</p>
        <ul class="s" >
            @foreach(config('filter_params.price') as $index => $param)
                <li class="choose-price-range hover:bg-gray-100 w-full py-1.5 px-6 mb-1.5 cursor-pointer hover:text-[#DC2D27]
                    {{ request('price-range') && (request('price-range') === $param['text']) ? 'text-[#DC2D27]' : 'text-gray-900' }}
                    {{ $index === 0 ? 'hidden' : 'block' }}">
                    {{ $param['text'] }}
                </li>
            @endforeach
        
        </ul>
    </div>
    <div class=" flex flex-col gap-4 border rounded text-black py-4 w-full mb-4 text-[14px]">
        <p class="font-bold px-6">Lọc theo diện tích</p>
        <ul class=" ">
            @foreach (config('filter_params.area') as $index => $param)
                <li class="choose-area-range hover:bg-gray-100 px-5 hover:text-[#DC2D27] w-full py-1.5 mb-1.5 cursor-pointer
                {{ request('area-range') && (request('area-range') === $param['text']) ? 'text-[#DC2D27]' : 'text-gray-900' }}
                {{ $index === 0 ? 'hidden' : 'block' }}">
                {{ $param['text'] }}
                </li>
            @endforeach
        </ul>
    </div>
    <div class=" flex flex-col gap-4 border rounded text-black py-4 w-full mb-4 text-[14px]">
        <p class="font-bold px-6">Mua bán nhà đất</p>
        <ul class="location-filter">
            @foreach ($dataPostsByProvince as $item)
                <li class="li-province-current choose-province px-6 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-1.5 mb-0.5 cursor-pointer     
                {{ (request('location') && request('location') === $item['province_full_name']) ? 'text-[#DC2D27]' : '' }}"
                data-province-name = "{{ $item['province_full_name'] }}">
                    {{ $item['province_name'] }} <span>{{"(". $item['quantity_posts'] . ")" }}</span>
                </li>
            @endforeach
        </ul>
        <button type="button" class="load-more-provinces flex items-center mx-6 gap-2 text-[#DC2D27] font-bold" data-status="true"  data-url="{{ route('load-more-provinces', ['category_id' => $category->id]) }}">
            Xem thêm
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>