
<div class=" flex flex-col w-full ">
    <div class="relative inline-block text-left">
        <div>
            <button onclick="isActiveDropdown('dropdownContentArea')"  type="button" 
            class="flex  {{ ($style == 0) ? 'text-base border rounded-lg border-white text-white p-3' : 'flex-col justify-start text-sm border-r text-gray-900 px-3' }} z-[0] w-full focus:outline-none hover:bg-gray-50 hover:text-gray-900 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <span class="block flex justify-between items-center w-full">
                <span class="flex items-center whitespace-nowrap {{ ($style == 0) ? 'show-area-range' : '' }}">
                    Diện tích
                </span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 9L12 15L6 9" stroke="#828282" stroke-linecap="round"/>
                </svg>
            </span>
                @if($style != 0)
                    <span class="show-area-range overflow-hidden line-clamp-1 text-base">
                        {{ (request('area-range')) ? request('area-range') : 'Tất cả' }}
                    </span>
                @endif
            </button>
        </div>
        <div id="dropdownContentArea" class="hidden w-80 {{ $style === 0 ? 'mt-2' : 'mt-4' }} absolute z-10 bg-white rounded-lg shadow-lg shadow-lg ">
            <div class="flex flex-col gap-5 text-base">
                <div class="h-80 overflow-y-auto">
                    <ul class="my-4">
                        @foreach (config('filter_params.area') as $index => $param)
                            <li class="hover:bg-gray-100 w-full py-2 px-6 
                            {{ ( (request('area-range') && request('area-range') === $param['text']) || 
                            (!request('area-range') && $index === 0) ) ? 'text-[#DC2D27]' : 'text-gray-900' }}">
                                <button type="{{ ($style == 0 ? 'button' : 'submit') }}" class="choose-area-range w-full text-start " > 
                                    {{ $param['text'] }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex justify-between items-center p-4 border-t w-full">
                <button type="{{ $style === 0 ? 'button' : 'submit' }}" data-style="{{ $style }}" 
                class="reset-area-range w-full flex items-center justify-center gap-3 text-base text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 20L17.6464 20.3536L18 20.7071L18.3536 20.3536L18 20ZM13 4.5C12.7239 4.5 12.5 4.72386 12.5 5C12.5 5.27614 12.7239 5.5 13 5.5L13 4.5ZM13.6464 16.3536L17.6464 20.3536L18.3536 19.6464L14.3536 15.6464L13.6464 16.3536ZM18.3536 20.3536L22.3536 16.3536L21.6464 15.6464L17.6464 19.6464L18.3536 20.3536ZM18.5 20L18.5 9L17.5 9L17.5 20L18.5 20ZM14 4.5L13 4.5L13 5.5L14 5.5L14 4.5ZM18.5 9C18.5 6.51472 16.4853 4.5 14 4.5L14 5.5C15.933 5.5 17.5 7.067 17.5 9L18.5 9Z"
                            fill="#333333"/>
                        <path
                            d="M6 4L6.35355 3.64645L6 3.29289L5.64645 3.64645L6 4ZM11 19.5C11.2761 19.5 11.5 19.2761 11.5 19C11.5 18.7239 11.2761 18.5 11 18.5L11 19.5ZM10.3536 7.64645L6.35355 3.64645L5.64645 4.35355L9.64645 8.35355L10.3536 7.64645ZM5.64645 3.64645L1.64645 7.64645L2.35355 8.35355L6.35355 4.35355L5.64645 3.64645ZM5.5 4L5.5 15L6.5 15L6.5 4L5.5 4ZM10 19.5L11 19.5L11 18.5L10 18.5L10 19.5ZM5.5 15C5.5 17.4853 7.51472 19.5 10 19.5L10 18.5C8.067 18.5 6.5 16.933 6.5 15L5.5 15Z"
                            fill="#333333"/>
                    </svg>
                    Đặt lại
                </button>
            </div>
        </div>
    </div>
</div>