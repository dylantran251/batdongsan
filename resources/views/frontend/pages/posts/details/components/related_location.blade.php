<div class=" flex flex-col gap-4 border rounded text-black py-6" style="font-size: 14px; background: #dedede;">
    <p class="font-bold px-8 ">{{ $post->realEstateType->name }} tại {{ $post->district->name }}</p>
    <ul class="">
        @foreach ($allWarData as $item)
            <li class="li-ward-current choose-ward px-8 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-3 cursor-pointer
            {{ $post->ward->name === $item['ward_name'] ? 'text-[#DC2D27]' : '' }}" data-district-name = "{{ $post->district->name }}" 
            data-province-name = "{{ $post->province->name }}" data-ward-name="{{ $item['ward_name'] }}" data-real-estate-type = "{{ $post->real_estate_type }}">
                {{ $item['ward_name'] }}<span>{{" (". $item['quantity_posts'] .")" }}</span>
            </li>
        @endforeach
    </ul>
</div>
{{-- sub_price_average --}}
<div class=" flex flex-col gap-4 border rounded text-black  py-6 w-full" style="font-size: 14px;">
    <p class="font-bold px-8">Mua bán {{ $post->category->name }}</p>
    <ul class="">
        @foreach ($dataPostsByProvince as $item)
            <li class="li-province-current choose-province px-8 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-3 cursor-pointer" data-province-name = "{{ $item['province_full_name'] }}"
            data-real-estate-type = "{{ $post->real_estate_type }}">
                {{ $item['province_name'] }} <span> {{" (". $item['quantity_posts'] .")" }}</span>
            </li>
        @endforeach
    </ul>
    <button type="button" class="load-more-provinces px-8 flex items-center gap-2  text-[#DC2D27]" 
    data-status = "true" data-url="{{route('load-more-provinces', ['category_id' => $post->category_id, 'real_estate_type' => $post->real_estate_type])}}" >
        Xem thêm
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</div>  