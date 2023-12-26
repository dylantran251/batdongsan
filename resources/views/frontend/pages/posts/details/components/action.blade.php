<div class="flex items-center justify-between py-5 gap-8">
    <div class="flex items-start gap-8">
        <div class="flex flex-col gap-1">
            <p  style="font-size: 14px; color:#999999">Mức giá</p>
            <h4 class="font-bold text-[18px] text-[#2c2c2c]">{{ $post->currency_format }}</h4>
            <p class="text-[#505050] text-[12px]">{{ $post->sub_currency_format }}/m&#178;</p>
        </div>
        <div class="flex flex-col gap-1">
            <p  style="font-size: 14px; color:#999999">Diện tích</p>
            <h4 class="font-bold text-[18px] text-[#2c2c2c]">{!! $post->area_format !!}</h4>
            <p class="text-[#505050] text-[12px]">{{ $post['floors'] }} tầng</p>
        </div>
        <div class="flex flex-col gap-1">
            <p  style="font-size: 14px; color:#999999">Phòng ngủ</p>
            <h4 class="font-bold text-[18px] text-[#2c2c2c]">{{ $post['bedroom'] }} PN</h4>
            <p class="text-[#505050] text-[12px]"></p>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row gap-4">
        <button type="button" class="hover:bg-gray-100 rounded-lg px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.68439 10.6578L15.3125 7.34375M15.3156 16.6578L8.6938 13.3469M21 6C21 7.65685 19.6569 9 18 9C16.3431 9 15 7.65685 15 6C15 4.34315 16.3431 3 18 3C19.6569 3 21 4.34315 21 6ZM9 12C9 13.6569 7.65685 15 6 15C4.34315 15 3 13.6569 3 12C3 10.3431 4.34315 9 6 9C7.65685 9 9 10.3431 9 12ZM21 18C21 19.6569 19.6569 21 18 21C16.3431 21 15 19.6569 15 18C15 16.3431 16.3431 15 18 15C19.6569 15 21 16.3431 21 18Z" stroke="#2C2C2C" stroke-width="1.5"/>
            </svg>                         
        </button>
        <button type="button" class="hover:bg-gray-100 rounded-lg px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.45474 19.0245C3.61737 20.6705 4.9117 21.9997 6.55165 22.2154C8.45259 22.4655 10.4176 22.7143 12.4286 22.7143C14.4395 22.7143 16.4046 22.4655 18.3055 22.2154C19.9454 21.9997 21.2398 20.6705 21.4024 19.0245C21.6264 16.7573 21.8571 14.4077 21.8571 12C21.8571 10.5843 21.7774 9.18875 21.6661 7.8182C21.3984 4.5209 18.7635 1.76592 15.4707 1.44737C14.4703 1.35058 13.4554 1.28571 12.4286 1.28571C10.4176 1.28571 8.45259 1.53452 6.55165 1.78458C4.9117 2.00032 3.61737 3.32946 3.45474 4.97552C3.23075 7.24269 3 9.59229 3 12C3 14.4077 3.23075 16.7573 3.45474 19.0245Z" fill="white"/>
                <path d="M3.08203 9.35965C3.16908 7.86953 3.31311 6.40611 3.45445 4.97551C3.61707 3.32946 4.91141 2.00032 6.55135 1.78458C8.4523 1.53452 10.4173 1.28571 12.4283 1.28571C13.4551 1.28571 14.47 1.35058 15.4704 1.44737C18.7632 1.76592 21.3981 4.5209 21.6658 7.8182C21.7771 9.18875 21.8568 10.5843 21.8568 12C21.8568 14.4077 21.6261 16.7573 21.4021 19.0245C21.2395 20.6705 19.9451 21.9997 18.3052 22.2154C17.9354 22.264 17.5631 22.3127 17.1886 22.3594" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M14.2219 4.71427V8.45867H18.429C20.3002 8.45867 21.8212 9.95757 21.8569 11.8201C21.8506 10.4661 21.7729 9.13068 21.6663 7.8182C21.3986 4.5209 18.7637 1.76592 15.4709 1.44737C14.4705 1.35058 13.4556 1.28571 12.4288 1.28571C12.0278 1.28571 11.6286 1.2956 11.2314 1.31342C12.9181 1.52853 14.2219 2.96914 14.2219 4.71427Z" stroke="#333333" stroke-width="1.5" stroke-linejoin="round"/>
                <path d="M8.50359 21.9944C8.27724 21.9944 8.09375 21.7974 8.09375 21.5544C8.09375 21.3114 8.27724 21.1144 8.50359 21.1144" stroke="#333333" stroke-width="1.5"/>
                <path d="M8.50325 21.9944C8.7296 21.9944 8.91309 21.7974 8.91309 21.5544C8.91309 21.3114 8.7296 21.1144 8.50325 21.1144" stroke="#333333" stroke-width="1.5"/>
                <path d="M8.50293 16.6525V18.027" stroke="#333333" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M4.8391 21.802H3.00684C3.90322 17.294 5.12237 14.3444 8.50364 11C11.7706 14.3902 12.9536 17.2307 14.0004 21.802H12.1682" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button type="button" data-url="{{ route('posts.add-to-favorite') }}"  data-post-id="{{ $post->id }}"
        class="add-to-favorite hover:bg-gray-100 rounded-lg px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0004 5.45659C6.82375 -0.895088 1.35805 3.61805 1.28613 8.48311C1.28613 15.7258 9.95196 21.6706 12.0004 21.6706C14.0488 21.6706 22.7147 15.7258 22.7147 8.48311C22.6428 3.61805 17.177 -0.895088 12.0004 5.45659Z" stroke="#2C2C2C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>