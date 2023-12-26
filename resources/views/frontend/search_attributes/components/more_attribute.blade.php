<div class="w-full relative">
    <button  type="button" 
    class="dropdown-toggle flex justify-between {{ ($style == 0) ? 'text-base border rounded-lg border-white text-white w-full focus:outline-none hover:bg-gray-100 hover:text-gray-900 p-2' : 'flex-col justify-start text-sm px-4' }} z-[0] w-full text-center inline-flex items-center">
        @if($style == 0)    
            Lọc thêm
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 9L12 15L6 9" stroke="#828282" stroke-linecap="round"/>
            </svg>
        @else
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12L5 4" stroke="#333333" stroke-linecap="round"/>
                <path d="M19 20L19 17" stroke="#333333" stroke-linecap="round"/>
                <path d="M5 20L5 16" stroke="#333333" stroke-linecap="round"/>
                <path d="M19 13L19 4" stroke="#333333" stroke-linecap="round"/>
                <path d="M12 7L12 4" stroke="#333333" stroke-linecap="round"/>
                <path d="M12 20L12 11" stroke="#333333" stroke-linecap="round"/>
                <circle cx="5" cy="14" r="2" stroke="#333333" stroke-linecap="round"/>
                <circle cx="12" cy="9" r="2" stroke="#333333" stroke-linecap="round"/>
                <circle cx="19" cy="15" r="2" stroke="#333333" stroke-linecap="round"/>
            </svg>
        @endif
    </button>
    <div class="dropdown-box hidden w-[400px] {{ $style === 0 ? 'mt-2' : 'mt-6' }} absolute right-0 z-10 text-sm text-black bg-white rounded-lg shadow-lg shadow-lg">
        <div class="p-4">
            <div class="flex flex-col gap-3 mb-5">
                <h3 class="">Số phòng ngủ</h3>
                <ul class="flex space-x-4">
                    @foreach (config('filter_params.room') as $value)
                        <li data-number="{{ $value }}" class="choose-bedroom cursor-pointer p-2 px-4 text-gray-900 bg-gray-200 rounded-full hover:bg-[#FFD8C2] hover:text-[#74150F]
                        {{ (request('bedroom') && in_array($value, request('bedroom'))) ? 'choosed' : '' }}">
                            {{ ($value == 5) ? $value.'+' : $value }} 
                        </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- toilet filter attribute --}}
            <div class="flex flex-col gap-3 mb-5 text-sm">
                <h3 class="">Số nhà vệ sinh</h3>
                <ul class="flex space-x-4">
                    @foreach (config('filter_params.room') as $value)
                        <li data-number = "{{ $value }}" class="choose-toilet cursor-pointer text-gray-900 bg-gray-200 p-2 px-4 rounded-full hover:bg-[#FFD8C2] hover:text-[#74150]
                        {{ (request('toilet') && in_array($value, request('toilet')) ? 'choosed' : '' ) }}">
                            {{ ($value==5) ? $value.'+' : $value }} 
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex flex-col gap-3 mb-5 text-sm">
                <h3 class="font-bold">Hướng nhà</h3>
                <ul class="flex items-center flex-wrap gap-4">
                    @foreach (config('filter_params.directions') as $key => $value)
                        <li data-number = "{{ $key }}" class="choose-house-direction cursor-pointer text-gray-900 bg-gray-200 p-2 px-4 rounded-full hover:bg-[#FFD8C2] hover:text-[#74150F]
                        {{ (request('house-direction') && in_array($key, request('house-direction')) ? 'choosed' : '' ) }}">
                            {{ $value }} 
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex justify-between items-center pt-4 border-t">
                <button type="{{ $style === 0 ? 'button' : 'submit' }}" 
                class="reset-filter-more text-gray-900 flex items-center justify-center gap-3 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-5 py-2.5 {{ ($style == 0) ? 'w-full' : '' }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 20L17.6464 20.3536L18 20.7071L18.3536 20.3536L18 20ZM13 4.5C12.7239 4.5 12.5 4.72386 12.5 5C12.5 5.27614 12.7239 5.5 13 5.5L13 4.5ZM13.6464 16.3536L17.6464 20.3536L18.3536 19.6464L14.3536 15.6464L13.6464 16.3536ZM18.3536 20.3536L22.3536 16.3536L21.6464 15.6464L17.6464 19.6464L18.3536 20.3536ZM18.5 20L18.5 9L17.5 9L17.5 20L18.5 20ZM14 4.5L13 4.5L13 5.5L14 5.5L14 4.5ZM18.5 9C18.5 6.51472 16.4853 4.5 14 4.5L14 5.5C15.933 5.5 17.5 7.067 17.5 9L18.5 9Z" fill="#333333"/>
                        <path d="M6 4L6.35355 3.64645L6 3.29289L5.64645 3.64645L6 4ZM11 19.5C11.2761 19.5 11.5 19.2761 11.5 19C11.5 18.7239 11.2761 18.5 11 18.5L11 19.5ZM10.3536 7.64645L6.35355 3.64645L5.64645 4.35355L9.64645 8.35355L10.3536 7.64645ZM5.64645 3.64645L1.64645 7.64645L2.35355 8.35355L6.35355 4.35355L5.64645 3.64645ZM5.5 4L5.5 15L6.5 15L6.5 4L5.5 4ZM10 19.5L11 19.5L11 18.5L10 18.5L10 19.5ZM5.5 15C5.5 17.4853 7.51472 19.5 10 19.5L10 18.5C8.067 18.5 6.5 16.933 6.5 15L5.5 15Z" fill="#333333"/>
                    </svg>
                    Đặt lại
                </button>
                @if($style != 0)
                    <button type="submit" class="flex items-center bg-[#EB5757] text-white focus:outline-none text-white hover:bg-red-800 text-sm focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
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

