<div class="flex flex-col  {{ $style == 0 ? 'w-auto gap-2' : 'w-full'}}">
    <div class="relative inline-block text-left">
        <div class="">
            <button onclick="isActiveDropdown('dropdownContentTypesRealEstate')" type="button" 
            class="flex {{ ($style == 0) ? 'text-base gap-3 p-3' : 'flex-col justify-start text-sm px-3' }} w-full ">
            @if ($style == 0)
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12.7596C5 11.4019 5 10.723 5.27446 10.1262C5.54892 9.52949 6.06437 9.08769 7.09525 8.20407L8.09525 7.34693C9.95857 5.7498 10.8902 4.95123 12 4.95123C13.1098 4.95123 14.0414 5.7498 15.9047 7.34693L16.9047 8.20407C17.9356 9.08769 18.4511 9.52949 18.7255 10.1262C19 10.723 19 11.4019 19 12.7596V17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21H9C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17V12.7596Z" stroke="#4F4F4F"/>
                    <path d="M14.5 21V16C14.5 15.4477 14.0523 15 13.5 15H10.5C9.94772 15 9.5 15.4477 9.5 16V21" stroke="#4F4F4F" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            @endif    
                <span class="flex items-center whitespace-nowrap  {{ $style == 0  ? 'gap-3' : 'justify-between w-full'}}">
                    Loại nhà đất
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 9L12 15L6 9" stroke="#828282" stroke-linecap="round"/>
                    </svg>
                </span>
                @if ($style != 0)
                    <span class="show-real-estate-types text-base">
                        Tất cả
                    </span>
                @endif
            </button>
        </div>
        <div id="dropdownContentTypesRealEstate" class="hidden w-80 {{ $style === 0 ? 'mt-3' : 'mt-4' }} absolute z-[100] bg-white rounded shadow-lg">
            <div id="list-real-estate-type-checkbox" class="my-4 px-6 py-2 space-y-2 text-base text-black h-64 overflow-y-auto overflow-hidden">
                @isset($realEstateTypes)
                    <div class="flex items-center justify-between">
                        <label for="all-real-estate-type" class="text-black w-full">Tất cả loại nhà đất</label>
                        <input type="checkbox" id="all-real-estate-type" value="Tất cả lại nhà đất" class="checked-item-all form-checkbox w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    @foreach ($realEstateTypes as $key => $item)
                        <div class="flex items-center justify-between">
                            <label for="real-estate-type-{{ $item->id }}" class="text-black w-full">{{ $item->name }}</label>
                            <input type="checkbox" id="real-estate-type-{{ $item->id }}" name="real-estate-type[]" value="{{ $item->id }}"
                                class="item-checkbox form-checkbox w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                @if(request('real-estate-type') && in_array($item->id, request('real-estate-type')))
                                    checked
                                @endif>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        <span class="font-medium">Trống!</span> Không có dữ liệu.
                    </div>   
                @endisset      
            </div>
            <div class="flex justify-between items-center border-t w-full p-4">
                <button type="{{ $style === 0 ? 'button' : 'submit' }}"
                class="reset-item-checkbox flex items-center justify-center text-base gap-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 {{ ($style == 0) ? 'w-full' : '' }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 20L17.6464 20.3536L18 20.7071L18.3536 20.3536L18 20ZM13 4.5C12.7239 4.5 12.5 4.72386 12.5 5C12.5 5.27614 12.7239 5.5 13 5.5L13 4.5ZM13.6464 16.3536L17.6464 20.3536L18.3536 19.6464L14.3536 15.6464L13.6464 16.3536ZM18.3536 20.3536L22.3536 16.3536L21.6464 15.6464L17.6464 19.6464L18.3536 20.3536ZM18.5 20L18.5 9L17.5 9L17.5 20L18.5 20ZM14 4.5L13 4.5L13 5.5L14 5.5L14 4.5ZM18.5 9C18.5 6.51472 16.4853 4.5 14 4.5L14 5.5C15.933 5.5 17.5 7.067 17.5 9L18.5 9Z" fill="#333333"/>
                        <path d="M6 4L6.35355 3.64645L6 3.29289L5.64645 3.64645L6 4ZM11 19.5C11.2761 19.5 11.5 19.2761 11.5 19C11.5 18.7239 11.2761 18.5 11 18.5L11 19.5ZM10.3536 7.64645L6.35355 3.64645L5.64645 4.35355L9.64645 8.35355L10.3536 7.64645ZM5.64645 3.64645L1.64645 7.64645L2.35355 8.35355L6.35355 4.35355L5.64645 3.64645ZM5.5 4L5.5 15L6.5 15L6.5 4L5.5 4ZM10 19.5L11 19.5L11 18.5L10 18.5L10 19.5ZM5.5 15C5.5 17.4853 7.51472 19.5 10 19.5L10 18.5C8.067 18.5 6.5 16.933 6.5 15L5.5 15Z" fill="#333333"/>
                    </svg>
                    Đặt lại
                </button>
                @if($style != 0)
                    <button type="submit" class="flex items-center bg-[#EB5757] text-white focus:outline-none text-white hover:bg-red-800 text-base focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="6" fill="#7E869E" fill-opacity="0.25" stroke="white" stroke-width="1.2"/>
                            <path d="M11 8C10.606 8 10.2159 8.0776 9.85195 8.22836C9.48797 8.37913 9.15726 8.6001 8.87868 8.87868C8.6001 9.15726 8.37913 9.48797 8.22836 9.85195C8.0776 10.2159 8 10.606 8 11" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                            <path d="M20 20L17 17" stroke="white" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                        Tìm kiếm
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>



