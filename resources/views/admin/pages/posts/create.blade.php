@extends('admin/layout/main')

@section('subhead')
    <title>Tạo bài đăng mới</title>
@endsection
@section('subcontent')
    <form id="postFormAdmin" data-type="{{ request('type') }}" role="admin" data-ajax = "{{ (isset($post)) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" 
    data-method = {{ (isset($post)) ? 'PUT' : 'POST' }}>
        <div class="py-10 relative">
            @if(request('type') == 1)
                <div class="block mb-4">
                    <div class="p-6 rounded-lg shadow-lg bg-white ">
                        <h1 class="text-black text-[24px] font-bold mb-10">Thông tin cơ bản</h1>
                        <div class="flex justify-between items-center w-full rounded-lg mb-10">
                            @forelse ($categories as $category)
                            <button type="button" data-id="{{ $category->id }}"
                                class="button-choose-category border text-black w-full whitespace-nowrap hover:text-white hover:bg-red-500 focus:outline-none focus:bg-red-500 focus:text-white font-bold text-xl py-3 text-center
                                dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 {{ (isset($post) && $post->category_id === $category->id) ? 'bg-red-500 text-white' : '' }}">
                            {{ $category->name }}
                            </button>
                            @empty
                                <div class="text-[18px] text-red-500 w-full text-center">Trống</div>
                            @endforelse    
                            <input type="hidden" value="{{ (isset($post)) ? $post->category_id : '' }}" name="category" id="category">
                        </div>
                        @if(request('type') == 1)
                            <div class="w-full mb-8">
                                <label for="real-estate-types" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Chọn loại nhà đất</label>
                                <select id="real-estate-types" name="real-estate-types" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Loại bất động sản</option>
                                </select>
                                <span class="text-red-500 text-base" id="real-estate-types-error"></span>
                            </div>
                        @endif
                        <div class="flex justify-beween items-center gap-8 mb-4 ">
                            <div class="w-full">
                                <label for="provinces" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Chọn Tỉnh/Thành phố</label>
                                <select id="provinces" name="provinces" data-province="{{ isset($post) ? $post->province->name : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Tỉnh/Thành phố</option>
                                </select>
                                <span class="text-red-500 text-base" id="provinces-error"></span>
                            </div>
                            <div class="w-full">
                                <label for="districts" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Chọn Quận/Huyện</label>
                                <select id="districts" name="districts" data-district="{{ isset($post) ? $post->district()->name : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Quận/Huyện</option>
                                </select>
                                <span class="text-red-500 text-base" id="districts-error"></span>
                            </div>
                            <div class="w-full">
                                <label for="wards" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Chọn Xã/Phường</label>
                                <select id="wards" name="wards" data-ward="{{ isset($post) ? $post->ward->name : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Xã/Phường</option>
                                </select>
                                <span class="text-red-500 text-base" id="wards-error"></span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center gap-4">
                            <div class="w-full">
                                <label for="location_info" class="block mb-2 text-[18px] font-bold font-medium text-gray-900 dark:text-white">Địa chỉ cụ thể</label>
                                <input type="text" id="location_info" name="location_info"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên đường, số nhà, ngõ, nghách...">
                            </div>
                            <div class="w-full">
                                <label for="location" class="block mb-2 text-[18px] font-bold font-medium text-gray-900 dark:text-white">Địa chỉ hiển thị</label>
                                <input type="text" id="location" name="location" value="{{ isset($post) ? $post->location : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên đường, số nhà, ngõ, nghách...">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mb-4">
                <div class="p-6 rounded-lg shadow-lg bg-white">
                    <h1 class="text-black text-[24px] font-bold mb-10">Thông tin bài viết</h1>
                    <div class="mb-4">
                        <label for="title" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Tiêu đề</label>
                        <input type="text" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}" placeholder="Nhập tiêu đề VD: Cần bán gấp căn hộ chính chủ tại Nma Từ Liên" required
                        class="block bg-gray-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span class="text-red-500 text-base" id="title-error"></span>
                    </div>
                    @if(request('type') == 0)
                        <div class="mb-4">
                            <label for="short_description" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Mô tả ngắn</label>
                            <textarea type="text" id="short_description" name="short_description" cols="6"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nhập mô tả ngắn VD: nhà tôi đang hết tiền cần bán nhà gấp" >{{ isset($post) ? $post->short_description : '' }}</textarea>
                            <span class="text-red-500 text-base" id="short_description-error"></span>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label for="WYSIWYG" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Nội dung</label>
                        <textarea type="text" id="WYSIWYG" name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Nhận nội dung mô tả VD: nhà chính chủ gần trường học, chợ..." >{{ isset($post) ? $post->description : '' }}</textarea>
                        <span class="text-red-500 text-base" id="description-error"></span>
                    </div>
                </div>
            </div>
            @if(request('type') == 1)
                <div class="mb-4">
                    <div class="shadow-lg p-6 rounded-lg bg-white">
                        <h1 class="text-black text-[24px] font-bold mb-10">Thông tin bất động sản</h1>
                        <div class="mb-4">
                            <label for="price" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Giá</label>
                            <input name="price" id="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="{{ isset($post) ? $post->price : '' }}" data-type="currency" placeholder="$1,000,000.00"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <span class="show-price-text-format text-base text-black" id="price-error"></span>
                        </div>
                        <div class="mb-4">
                            <label for="area" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Diện tích</label>
                            <input type="number" id="area" name="area" value="{{ isset($post) ? $post->area : '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <span class="text-red-500 text-base" id="area-error"></span>
                        </div>
                        <div class="mb-4">
                            <label for="legal_documents" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Giấy tờ pháp lý</label>
                            <div id="chooseLegalDocumentsContainer" class="flex items-center flex-wrap gap-2">
                                @foreach (config('filter_params.legal_documents') as $value)
                                    <button type="button" class="button-choose-legal-documents text-red-500 whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white font-medium rounded-full text-[18px] px-5 py-2.5 text-center dark:border-red-500 
                                    dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 {{ (isset($post) && $post->legal_documents === $value) ? 'bg-red-500 text-white' : '' }}">
                                        {{ $value }}
                                    </button>  
                                @endforeach
                                <button type="button" id="buttonToggleModalLegalDocuments"
                                class="flex justify-center text-red-500 hover:text-white border border-red-400 hover:bg-red-500 focus:outline-none font-medium rounded-full text-[18px] p-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>                    
                            </div>
                            <input type="hidden" name="legal_documents" id="legal_documents" value="{{ isset($post) ? $post->legal_documents : '' }}">
                        </div>
                        <div class="mb-4">
                            <label for="interior" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Nội thất</label>
                            <div class="flex items-center flex-wrap gap-2">
                                @foreach (config('filter_params.interior') as $value)
                                    <button type="button" class="button-choose-interior text-red-500 whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white font-medium rounded-full text-[18px] px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        {{ $value }}
                                    </button>   
                                @endforeach
                                <button type="button" id="buttonToggleModalInterior"
                                class="flex justify-center text-red-500 hover:text-white border border-red-400 hover:bg-red-500 focus:outline-none font-medium rounded-full text-[18px] p-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>                    
                            </div>
                            <input type="hidden" id="interior" name="interior">
                        </div>
                        <div class="mb-4 flex justify-between w-full gap-4">
                            <div class="w-full">
                                <label for="floors" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Số tầng</label>
                                <input type="text" id="floors" name="floors" value="{{ isset($post) ? $post->floors : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <span class="col-span-2 w-full text-red-500 text-base text-end" id="floors-error"></span>
                            </div>
                            <div class="w-full">
                                <label for="bedroom" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Số phòng ngủ</label>
                                <input type="text" id="bedroom" name="bedroom"  value="{{ isset($post) ? $post->bedroom : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <span class="col-span-2 text-red-500 text-base w-full text-end" id="bedroom-error"></span>
                            </div>
                            <div class="w-full">
                                <label for="toilet" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Số phòng tắm, vệ sinh</label>
                                <input type="text" id="toilet" name="toilet"  value="{{ isset($post) ? $post->toilet : '' }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <span class="col-span-2 text-red-500 text-base w-full text-end" id="toilet-error"></span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between gap-4">
                                <div class="w-full mb-4">
                                    <label for="house_direction" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Hướng nhà</label>
                                    <select id="house_direction" name="house direction"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option disabled selected>Chọn hướng nhà</option>
                                        @foreach (config('filter_params.directions') as $key=>$direction)
                                            <option value="{{ $key }}">{{ $direction }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="balcony_orientation" class="block mb-2 font-bold text-[18px] font-medium text-gray-900 dark:text-white">Hướng ban công</label>
                                    <select id="balcony_orientation" name="balcony_orientation" class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option disabled selected>Chọn hướng ban công</option>
                                        @foreach (config('filter_params.directions') as $key=>$direction)
                                            <option value="{{ $key }}">{{ $direction }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="flex items-center w-full mb-2">
                                    <label for="other_properties" 
                                    class="font-bold mr-4 text-[18px] font-medium text-gray-900 dark:text-white">Thông tin khác</label>
                                    <button type="button" id="button-add-other-properties" class="flex justify-center text-red-500 hover:text-white hover:bg-red-500 focus:outline-none font-medium rounded-full text-[18px] text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button> 
                                </div>   
                                <input type="text" id="other_properties" name="other_properties[]" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >          
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            <div class="mb-4">
                <div class="shadow-lg p-6 rounded-lg bg-white">
                    <h1 class="text-black text-[24px] font-bold mb-10">Tags và SEO</h1>
                    <div>
                        <label for="tags" class="block mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Tags</label>
                        <select name="tags" id="tags" data-url="{{ route('admin.tags.getItems') }}" 
                            class="tom-select-ajax w-full border rounded" multiple>
                        </select>
                        <span class="text-red-500 text-base" id="tags-error"></span>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="image-container p-6 rounded-lg shadow-lg bg-white">
                    <h1 class="text-black text-[24px] font-bold mb-10">Album ảnh bài đăng</h1>
                    <div class="rounded-lg">
                        <div class="dropzone-custom" data-method="POST" data-url="{{ route('file.upload') }}" enctype="multipart/form-data">
                            <div class="fallback"><input name="file[]" type="file" multiple/></div>
                            <div class="dz-message flex flex-col justify-center items-center rounded-lg" data-dz-message>
                                <svg width="80" height="80" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M118.42 75.84C118.43 83.2392 116.894 90.5589 113.91 97.33H16.09C12.8944 90.0546 11.3622 82.1579 11.6049 74.2154C11.8477 66.2728 13.8593 58.4844 17.4932 51.4177C21.1271 44.3511 26.2918 38.1841 32.6109 33.3662C38.93 28.5483 46.2443 25.2008 54.0209 23.5676C61.7976 21.9345 69.8406 22.0568 77.564 23.9257C85.2873 25.7946 92.4965 29.363 98.6661 34.3709C104.836 39.3787 109.81 45.6999 113.228 52.8739C116.645 60.0478 118.419 67.8937 118.42 75.84Z" fill="#F2F2F2"></path>
                                    <path d="M5.54 97.33H126.37" stroke="#63666A" stroke-width="1" stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path d="M97 97.33H49.91V34.65C49.91 34.3848 50.0154 34.1305 50.2029 33.9429C50.3904 33.7554 50.6448 33.65 50.91 33.65H84.18C84.6167 33.6541 85.0483 33.7445 85.4499 33.9162C85.8515 34.0878 86.2152 34.3372 86.52 34.65L96.02 44.15C96.3321 44.4533 96.5811 44.8153 96.7527 45.2151C96.9243 45.615 97.0152 46.0449 97.02 46.48L97 97.33Z" fill="#D7D7D7" stroke="#63666A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M59.09 105.64H42.09C41.8248 105.64 41.5704 105.535 41.3829 105.347C41.1954 105.16 41.09 104.905 41.09 104.64V41.79C41.09 41.5248 41.1954 41.2705 41.3829 41.0829C41.5704 40.8954 41.8248 40.79 42.09 40.79H77.33L89 52.42V104.62C89 104.885 88.8946 105.14 88.7071 105.327C88.5196 105.515 88.2652 105.62 88 105.62H74.86" fill="white"></path>
                                    <path d="M59.09 105.64H42.09C41.8248 105.64 41.5704 105.535 41.3829 105.347C41.1954 105.16 41.09 104.905 41.09 104.64V41.79C41.09 41.5248 41.1954 41.2705 41.3829 41.0829C41.5704 40.8954 41.8248 40.79 42.09 40.79H77.33L89 52.42V104.62C89 104.885 88.8946 105.14 88.7071 105.327C88.5196 105.515 88.2652 105.62 88 105.62H74.86" stroke="#63666A" stroke-width="1" stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path d="M88.97 52.42H77.33V40.77L88.97 52.42Z" fill="#D7D7D7" stroke="#63666A" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M27.32 65.49V70.6" stroke="#D7D7D7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M29.88 68.04H24.76" stroke="#D7D7D7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M110.49 32.5601V39.9901" stroke="#D7D7D7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M114.2 36.27H106.77" stroke="#D7D7D7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M34.07 14.58V25.59" stroke="#D7D7D7" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M39.57 20.08H28.57" stroke="#D7D7D7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M67 115.86V67.12" stroke="#63666A" stroke-width="1" stroke-miterlimit="10" stroke-linecap="round"></path>
                                    <path d="M55.5 78.61L67 67.12L78.5 78.61" fill="white"></path>
                                    <path d="M55.5 78.61L67 67.12L78.5 78.61" stroke="#63666A" stroke-width="1" stroke-miterlimit="10"></path>
                                </svg>
                                <p class="text-center w-full text-[18px] mt-4">Nhấn để chọn ảnh hoặc<br><span class="text-gray-500"> kéo thả ảnh vào đây</span></p>     
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500 text-base" id="images-error"></span>
                </div>
            </div>
            <div class="mb-4">
                <div class="shadow-lg p-6 rounded-lg bg-white">
                    <h1 class="text-black text-[24px] font-bold mb-10">Thông tin liên hệ</h1>
                    <div class="mb-4">
                        <label for="name" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Tên liên hệ <span>*</span></label>
                        <input type="text" id="name" name="name"  value="{{ isset($post) ? $post->user->name : Auth::user()->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Số điện thoại <span>*</span></label>
                        <input type="text" id="phone" name="phone"  value="{{ isset($post) ? $post->user->phone : Auth::user()->phone }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email"  value="{{ isset($post) ? $post->user->email : Auth::user()->email }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                    </div>
                </div>
            </div>
            <div class="flex p-4 shadow-lg rounded-lg bg-white w-full sticky bottom-0 right-0 left-0 z-[999]">
                <div class="flex w-full flex-col items-start justify-center">
                    <div class="flex items-center gap-2">
                        <label for="location" class="block font-bold text-[18px] leading-6 text-black whitespace-nowrap">Trạng thái:</label>
                        <input type="text" name="" id="status" value="Đang khởi tạo" class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400" disabled>
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="location" class="block font-bold text-[18px] leading-6 text-black whitespace-nowrap">Loại tin:</label>
                        <input type="text" name="vip" id="vip" value="Tin thường" class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400 " disabled>
                    </div>
                </div>
                <div class="w-full flex justify-end items-center gap-4">
                    <button type="button" class="px-10 py-3 text-lg font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Nháp
                    </button>
                    <button type="button" id="buttonSubmitPostFormAdmin" 
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-lg px-10 py-3 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Đăng tin
                    </button>
                </div>
            </div>
        </div>
    </form>
    {{-- Modal --}}
    <div id="modalAddChoose" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50">
        <div class="bg-white rounded-lg w-[315px] px-10">
            <div class="flex justify-between py-6 border-b">
                <h1 id="titleModal" class="font-bold"></h1>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="mt-4">
                <label for="inputModal" class="block font-bold mb-2 text-[18px] font-medium text-gray-900 dark:text-white"></label>
                <input type="text" id="inputModal" placeholder="Nhập thông tin"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-[18px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="my-4 flex justify-end w-full">
                <button type="button" id="buttonSubmitModal" data-option-type=""
                    class="text-white bg-blue-600 hover:bg-blue-800  focus:ring-blue-300 font-medium rounded-lg text-[18px] px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Thêm
                </button>
            </div>
        </div>
    </div>
@endsection