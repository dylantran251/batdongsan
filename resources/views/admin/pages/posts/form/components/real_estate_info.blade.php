<div class="mb-4">
    <div class="shadow-lg p-6 rounded-lg bg-white">
        <h1 class="text-black text-[24px] font-bold mb-10">Thông tin bất động sản</h1>
        <div class="mb-4">
            <label for="price" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Giá</label>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-3 w-full">
                    <input name="price" id="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="{{ isset($post) ? $post->price : '' }}" data-type="currency" placeholder="Nhập giá VD: 1.000.000.000" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                <div class="col-span-1 w-full">
                    <select id="price-style" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="1">VND</option>
                        <option value="0" >Thỏa thuận</option>
                    </select>
                </div>
            </div>
            <span class="show-price-text-format text-base text-black" id="price-error"></span>
        </div>
        <div class="mb-4">
            <label for="area" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Diện tích</label>
            <input type="number" id="area" name="area" value="{{ isset($post) ? $post->area : '' }}" placeholder="Nhập diện tích VD: 90"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            <span class="text-red-500 text-base" id="area-error"></span>
        </div>
        <div class="mb-4 flex flex-col w-full">
            <div class="w-full flex justify-between items-center mb-4">
                <label for="floors" class="font-bold text-base font-bold text-gray-900 dark:text-white w-2/3">Số tầng</label>
                <div class="w-1/4">
                    <div class="flex gap-4 ">
                        <button type="button" class="decrease-floors flex items-center justify-center text-white bg-gray-300 hover:text-white hover:bg-opacity-70 rounded-lg text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                        <input type="number" id="floors" name="floors" value="{{ isset($post) ? $post->floors : 0 }}" placeholder="Nhập số tầng VD: 3"
                        class="bg-gray-50 border flex items-center justify-center text-center border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button type="button" class="increase-floors text-white hover:text-white hover:bg-opacity-70 rounded-lg bg-gray-500 text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                    <span class="col-span-2 w-full text-red-500 text-base text-end" id="floors-error"></span>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mb-4">
                <label for="bedroom" class="font-bold text-base font-bold text-gray-900 dark:text-white w-2/3">Số phòng ngủ</label>
                <div class="w-1/4">
                    <div class="flex gap-4">
                        <button type="button" class="decrease-bedroom flex items-center bg-gray-300 justify-center text-white hover:text-white hover:bg-opacity-70 rounded-lg text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                        <input type="number" id="bedroom" name="bedroom" value="{{ isset($post) ? $post->bedroom : 0 }}" placeholder="Nhập phòng ngủ VD: 3"
                        class="bg-gray-50 border flex items-center justify-center text-center border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button type="button" class="increase-bedroom text-white bg-gray-500 hover:text-white hover:bg-opacity-70 rounded-lg text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                    <span class="col-span-2 w-full text-red-500 text-base text-end" id="bedroom-error"></span>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mb-4">
                <label for="toilet" class="font-bold text-base font-bold text-gray-900 dark:text-white w-2/3">Số nhà tắm, nhà vệ sinh</label>
                <div class="w-1/4">
                    <div class="flex gap-4">
                        <button type="button" class="decrease-toilet flex items-center justify-center bg-gray-300 text-white hover:text-white hover:bg-opacity-70 rounded-lg text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                        <input type="number" id="toilet" name="toilet" value="{{ isset($post) ? $post->toilet : 0 }}" placeholder="Nhập số tầng VD: 3"
                        class="bg-gray-50 border flex items-center justify-center text-center border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button type="button" class="increase-toilet text-white hover:text-white hover:bg-opacity-70 bg-gray-500 rounded-lg text-base px-4 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                    <span class="col-span-2 w-full text-red-500 text-base text-end" id="toilet-error"></span>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="legal_documents" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Giấy tờ pháp lý</label>
            <div id="chooseLegalDocumentsContainer" class="flex items-center flex-wrap gap-2">
                @foreach (config('filter_params.legal_documents') as $value)
                    <button type="button" class="button-choose-legal-documents text-red-500 whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white font-bold rounded-full text-base px-5 py-2.5 text-center dark:border-red-500 
                    dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 {{ (isset($post) && $post->legal_documents === $value) ? 'bg-red-500 text-white' : '' }}">
                        {{ $value }}
                    </button>  
                @endforeach
                <button type="button" id="buttonToggleModalLegalDocuments"
                class="flex justify-center text-red-500 hover:text-white border border-red-400 hover:bg-red-500 focus:outline-none font-bold rounded-full text-base p-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>                    
            </div>
            <input type="hidden" name="legal_documents" id="legal_documents" value="{{ isset($post) ? $post->legal_documents : '' }}">
        </div>

        <div class="mb-4">
            <label for="interior" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Nội thất</label>
            <div class="flex items-center flex-wrap gap-2">
                @foreach (config('filter_params.interior') as $value)
                    <button type="button" class="button-choose-interior text-red-500 whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white font-bold rounded-full text-base px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        {{ $value }}
                    </button>   
                @endforeach
                <button type="button" id="buttonToggleModalInterior"
                class="flex justify-center text-red-500 hover:text-white border border-red-400 hover:bg-red-500 focus:outline-none font-bold rounded-full text-base p-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>                    
            </div>
            <input type="hidden" id="interior" name="interior">
        </div>
        <div class="mb-4">
            <div class="flex justify-between gap-4">
                <div class="w-full mb-4">
                    <label for="house_direction" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Hướng nhà</label>
                    <select id="house_direction" name="house direction"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Chọn hướng nhà</option>
                        @foreach (config('filter_params.directions') as $key=>$direction)
                            <option value="{{ $direction }}">{{ $direction }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="balcony_orientation" class="block mb-2 font-bold text-base font-bold text-gray-900 dark:text-white">Hướng ban công</label>
                    <select id="balcony_orientation" name="balcony_orientation" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    class="font-bold mr-4 text-base font-bold text-gray-900 dark:text-white">Thông tin khác</label>
                    <button type="button" id="button-add-other-properties" class="flex items-center justify-center text-blue-500 hover:opacity-60 hover:bg-opacity-60 focus:outline-none rounded-full text-base text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Thêm
                    </button> 
                </div>   
                <input type="text" id="other_properties" name="other_properties[]" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >          
            </div>
        </div>
    </div>
</div>