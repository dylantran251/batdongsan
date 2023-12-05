<div class="w-full mx-auto mb-16">
    <table class="w-full border text-[14px] text-[#2c2c2c] ">
        <thead>
            <tr class="">
                <th class="py-3 px-4 text-left ">
                    So sánh giá khu vực lân cận <br>
                    <span class="text-[#868686]">(Trong {{ $post->district->name }})</span>
                </th>
                <th class="py-3 px-4 text-left ">Giá phổ biến nhất</th>
                <th class="py-3 px-4 text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($firstEightWardData as $item)
                <tr class="border-t border-b data-ward-current choose-ward hover:bg-[#FFD8C2] hover:text-[#74150F] cursor-pointer  
                {{ $post->ward->name === $item['ward_name'] ? 'bg-[#FFD8C2] text-[#74150F]' : '' }}" data-district-name = "{{ $post->district->name }}" 
                    data-province-name = "{{ $post->province->name }}" data-ward-name="{{ $item['ward_name'] }}" data-real-estate-type = "{{ $post->real_estate_type }}">
                    <td class="py-3 px-4">{{ $item['ward_name'] }}</td>
                    <td class="py-3 px-4">
                        {!! $item['sub_price_average'] === 'Chưa có dữ liệu' ? $item['sub_price_average'] : $item['sub_price_average'] . '/m&sup2;' !!}
                    </td>
                    <td class="py-3 px-4 text-end">
                        <a href="#" class="flex items-center justify-end">
                            {{ $item['quantity_posts'] }} tin bán 
                            <span class="pl-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 6L15 12L9 18" stroke="#828282"/>
                                </svg>  
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center border p-4 {{ ($isCheckWardData === false) ? 'hidden' : '' }}" style="margin-top: -1px;">
        <button type="button" data-url = "{{ route('load-more-wards', ['category_id' => $post->category_id,'district_id'=>$post->district_id,  'real_estate_type' => $post->real_estate_type]) }}"
            data-district-name="{{ $post->district->name }}" data-province-name="{{ $post->province->name }}"
        class="load-more-wards hover:underline text-[#FF0000] font-bold text-[14px]" data-status="true">Xem thêm</a>
    </div>
</div>