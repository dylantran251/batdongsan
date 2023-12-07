<div class="block mb-4">
    <div class="p-6 rounded-lg shadow-lg bg-white ">
        <h1 class="text-[24px] font-bold mb-10">Thông tin cơ bản</h1>
        <div class="flex justify-between items-center w-full rounded-full mb-10 border">
            @forelse ($categories as $key => $category)
                <button type="button" data-category-id="{{ $category->id }}" data-url="{{ route('get-real-estate-types-by-category') }}"
                    class="choose-category w-full text-base whitespace-nowrap hover:bg-black hover:text-gray-100 hover:bg-opacity-50 font-bold py-3 text-center
                    dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 {{ (isset($post) && $post->category_id === $category->id) ? 'bg-red-500 text-white' : '' }}
                    {{ $key === 0 ? 'rounded-s-full border-e bg-gray-500 text-white' : 'text-gray-500 bg-white' }} {{ $key === 2 ? 'rounded-e-full border-s' : '' }}">
                {{ $category->name }}
                </button>
            @empty
                <div class="text-base text-red-500 w-full text-center">Trống</div>
            @endforelse    
        </div>
            <div class="w-full mb-8">
                <label for="real-estate-types" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Chọn loại nhà đất</label>
                <select id="real-estate-types" name="real-estate-types"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Loại bất động sản</option>
                            @foreach ($realEstateTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                </select>
                <span class="text-red-500 text-base" id="real-estate-types-error"></span>
            </div>

        <div class="flex justify-beween items-center gap-8 mb-4 ">
            <div class="w-full">
                <label for="provinces" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Chọn Tỉnh/Thành phố</label>
                <select id="provinces" name="province" data-province="{{ isset($post) ? $post->province->name : '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Tỉnh/Thành phố</option>
                </select>
                <span class="text-red-500 text-base" id="provinces-error"></span>
            </div>
            <div class="w-full">
                <label for="districts" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Chọn Quận/Huyện</label>
                <select id="districts" name="district" data-district="{{ isset($post) ? $post->district()->name : '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Quận/Huyện</option>
                </select>
                <span class="text-red-500 text-base" id="districts-error"></span>
            </div>
            <div class="w-full">
                <label for="wards" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Chọn Xã/Phường</label>
                <select id="wards" name="ward" data-ward="{{ isset($post) ? $post->ward->name : '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Xã/Phường</option>
                </select>
                <span class="text-red-500 text-base" id="wards-error"></span>
            </div>
        </div>
        <div class="flex justify-between items-center gap-4">
            <div class="w-full">
                <label for="location_info" class="block mb-2 text-base font-bold font-bold text-gray-900 dark:text-white">Địa chỉ cụ thể</label>
                <input type="text" id="location_info" name="location_info"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên đường, số nhà, ngõ, nghách...">
            </div>
            <div class="w-full">
                <label for="location" class="block mb-2 text-base font-bold font-bold text-gray-900 dark:text-white">Địa chỉ hiển thị</label>
                <input type="text" id="location" name="location" value="{{ isset($post) ? $post->location : '' }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên đường, số nhà, ngõ, nghách...">
            </div>
        </div>
    </div>
</div>