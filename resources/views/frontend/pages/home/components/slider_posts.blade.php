
@forelse ( $item['sliderPosts'] as $post )
    <li class="splide__slide mx-5 p-0 w-full flex flex-col shadow border rounded-lg border">
        <div class="w-full h-[195px]">
            <img src="{{ $post->avatar }}" class="rounded-t-lg w-full h-full object-cover " alt="">
        </div>
        <div class="py-2">
            <a href="{{ route('posts.details', $post['title']) }}" href="javascript:void(0)" class="link-post-details">
                <div class="mb-1 px-2">
                    <h1 class="overflow-hidden line-clamp-2 text-[14px] font-bold">{{ $post['title'] }}</h1>
                </div>
                <div class="flex items-center justify-start gap-8 px-1 mb-2">
                    <p class="text-base  flex items-center text-[#DC2D27] font-bold">
                        <span class="pr-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.59202 4.71799L4.36502 4.27248L4.36502 4.27248L4.59202 4.71799ZM3.71799 5.59202L3.27248 5.36502L3.27248 5.36502L3.71799 5.59202ZM3.71799 18.408L4.16349 18.181H4.16349L3.71799 18.408ZM4.59202 19.282L4.81901 18.8365H4.81901L4.59202 19.282ZM19.408 19.282L19.181 18.8365H19.181L19.408 19.282ZM20.282 18.408L19.8365 18.181V18.181L20.282 18.408ZM20.2692 14.4187L20.2546 13.919H20.2546L20.2692 14.4187ZM20.0356 14.4256L20.0502 14.9254L20.0356 14.4256ZM20.282 5.59202L19.8365 5.81901V5.81901L20.282 5.59202ZM19.408 4.71799L19.181 5.16349V5.16349L19.408 4.71799ZM6.7 5H12.25V4H6.7V5ZM4.81901 5.16349C4.95069 5.0964 5.12454 5.05031 5.42712 5.02559C5.73554 5.00039 6.1317 5 6.7 5V4C6.1482 4 5.70428 3.99961 5.34569 4.02891C4.98126 4.05868 4.66117 4.12159 4.36502 4.27248L4.81901 5.16349ZM4.16349 5.81901C4.3073 5.53677 4.53677 5.3073 4.81901 5.16349L4.36502 4.27248C3.89462 4.51217 3.51217 4.89462 3.27248 5.36502L4.16349 5.81901ZM4 7.7C4 7.1317 4.00039 6.73554 4.02559 6.42712C4.05031 6.12454 4.0964 5.95069 4.16349 5.81901L3.27248 5.36502C3.12159 5.66117 3.05868 5.98126 3.02891 6.34569C2.99961 6.70428 3 7.1482 3 7.7H4ZM4 9.26923V7.7H3V9.26923H4ZM3.73077 9C3.87946 9 4 9.12054 4 9.26923H3C3 9.67282 3.32718 10 3.73077 10V9ZM4 9H3.73077V10H4V9ZM7 12C7 10.3431 5.65685 9 4 9V10C5.10457 10 6 10.8954 6 12H7ZM4 15C5.65685 15 7 13.6569 7 12H6C6 13.1046 5.10457 14 4 14V15ZM3.73077 15H4V14H3.73077V15ZM4 14.7308C4 14.8795 3.87946 15 3.73077 15V14C3.32718 14 3 14.3272 3 14.7308H4ZM4 16.3V14.7308H3V16.3H4ZM4.16349 18.181C4.0964 18.0493 4.05031 17.8755 4.02559 17.5729C4.00039 17.2645 4 16.8683 4 16.3H3C3 16.8518 2.99961 17.2957 3.02891 17.6543C3.05868 18.0187 3.12159 18.3388 3.27248 18.635L4.16349 18.181ZM4.81901 18.8365C4.53677 18.6927 4.3073 18.4632 4.16349 18.181L3.27248 18.635C3.51217 19.1054 3.89462 19.4878 4.36502 19.7275L4.81901 18.8365ZM6.7 19C6.1317 19 5.73554 18.9996 5.42712 18.9744C5.12454 18.9497 4.95069 18.9036 4.81901 18.8365L4.36502 19.7275C4.66117 19.8784 4.98126 19.9413 5.34569 19.9711C5.70428 20.0004 6.1482 20 6.7 20V19ZM12.25 19H6.7V20H12.25V19ZM13 19.25V19H12V19.25H13ZM13 19C13 18.7239 13.2239 18.5 13.5 18.5V17.5C12.6716 17.5 12 18.1716 12 19H13ZM13.5 18.5C13.7761 18.5 14 18.7239 14 19H15C15 18.1716 14.3284 17.5 13.5 17.5V18.5ZM14 19V19.25H15V19H14ZM17.3 19H14.75V20H17.3V19ZM19.181 18.8365C19.0493 18.9036 18.8755 18.9497 18.5729 18.9744C18.2645 18.9996 17.8683 19 17.3 19V20C17.8518 20 18.2957 20.0004 18.6543 19.9711C19.0187 19.9413 19.3388 19.8784 19.635 19.7275L19.181 18.8365ZM19.8365 18.181C19.6927 18.4632 19.4632 18.6927 19.181 18.8365L19.635 19.7275C20.1054 19.4878 20.4878 19.1054 20.7275 18.635L19.8365 18.181ZM20 16.3C20 16.8683 19.9996 17.2645 19.9744 17.5729C19.9497 17.8755 19.9036 18.0493 19.8365 18.181L20.7275 18.635C20.8784 18.3388 20.9413 18.0187 20.9711 17.6543C21.0004 17.2957 21 16.8518 21 16.3H20ZM20 14.6428V16.3H21V14.6428H20ZM20.2839 14.9185C20.1285 14.9231 20 14.7983 20 14.6428H21C21 14.2346 20.6627 13.907 20.2546 13.919L20.2839 14.9185ZM20.0502 14.9254L20.2839 14.9185L20.2546 13.919L20.0209 13.9258L20.0502 14.9254ZM17 11.9633C17 13.634 18.3803 14.9744 20.0502 14.9254L20.0209 13.9258C18.9145 13.9583 18 13.0702 18 11.9633H17ZM19.9633 9C18.3267 9 17 10.3267 17 11.9633H18C18 10.879 18.879 10 19.9633 10V9ZM20.2692 9H19.9633V10H20.2692V9ZM20 9.26923C20 9.12054 20.1205 9 20.2692 9V10C20.6728 10 21 9.67283 21 9.26923H20ZM20 7.7V9.26923H21V7.7H20ZM19.8365 5.81901C19.9036 5.95069 19.9497 6.12454 19.9744 6.42712C19.9996 6.73554 20 7.1317 20 7.7H21C21 7.1482 21.0004 6.70428 20.9711 6.34569C20.9413 5.98126 20.8784 5.66117 20.7275 5.36502L19.8365 5.81901ZM19.181 5.16349C19.4632 5.3073 19.6927 5.53677 19.8365 5.81901L20.7275 5.36502C20.4878 4.89462 20.1054 4.51217 19.635 4.27248L19.181 5.16349ZM17.3 5C17.8683 5 18.2645 5.00039 18.5729 5.02559C18.8755 5.05031 19.0493 5.0964 19.181 5.16349L19.635 4.27248C19.3388 4.12159 19.0187 4.05868 18.6543 4.02891C18.2957 3.99961 17.8518 4 17.3 4V5ZM14.75 5H17.3V4H14.75V5ZM14 4.75V5H15V4.75H14ZM14 5C14 5.27614 13.7761 5.5 13.5 5.5V6.5C14.3284 6.5 15 5.82843 15 5H14ZM13.5 5.5C13.2239 5.5 13 5.27614 13 5H12C12 5.82843 12.6716 6.5 13.5 6.5V5.5ZM13 5V4.75H12V5H13ZM13.5 8.5C13.7761 8.5 14 8.72386 14 9H15C15 8.17157 14.3284 7.5 13.5 7.5V8.5ZM13 9C13 8.72386 13.2239 8.5 13.5 8.5V7.5C12.6716 7.5 12 8.17157 12 9H13ZM13 10V9H12V10H13ZM13.5 10.5C13.2239 10.5 13 10.2761 13 10H12C12 10.8284 12.6716 11.5 13.5 11.5V10.5ZM14 10C14 10.2761 13.7761 10.5 13.5 10.5V11.5C14.3284 11.5 15 10.8284 15 10H14ZM14 9V10H15V9H14ZM13.5 13.5C13.7761 13.5 14 13.7239 14 14H15C15 13.1716 14.3284 12.5 13.5 12.5V13.5ZM13 14C13 13.7239 13.2239 13.5 13.5 13.5V12.5C12.6716 12.5 12 13.1716 12 14H13ZM13 15V14H12V15H13ZM13.5 15.5C13.2239 15.5 13 15.2761 13 15H12C12 15.8284 12.6716 16.5 13.5 16.5V15.5ZM14 15C14 15.2761 13.7761 15.5 13.5 15.5V16.5C14.3284 16.5 15 15.8284 15 15H14ZM14 14V15H15V14H14ZM14 19.25C14 19.6642 14.3358 20 14.75 20V19C14.8881 19 15 19.1119 15 19.25H14ZM14.75 4C14.3358 4 14 4.33579 14 4.75H15C15 4.88807 14.8881 5 14.75 5V4ZM12.25 20C12.6642 20 13 19.6642 13 19.25H12C12 19.1119 12.1119 19 12.25 19V20ZM12.25 5C12.1119 5 12 4.88807 12 4.75H13C13 4.33579 12.6642 4 12.25 4V5Z" fill="#333333"/>
                            </svg>
                        </span>
                        {{ $post->currency_format }}
                    </p>
                    <p class="text-base  flex items-center text-[#DC2D27] px-1 font-bold">
                        <span class="pr-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.81699 16.2453C6.11376 16.6776 6.45646 17.0796 6.8407 17.4438C7.89276 18.441 9.21123 19.1119 10.6366 19.3754C12.062 19.6389 13.5332 19.4837 14.8722 18.9286C16.2112 18.3735 17.3607 17.4423 18.1816 16.2476C19.0024 15.0529 19.4595 13.6459 19.4975 12.1969C19.5355 10.7479 19.1527 9.31888 18.3956 8.08282C17.6384 6.84675 16.5393 5.85658 15.2312 5.23209C14.3961 4.83339 13.4986 4.59466 12.5847 4.52319L12.8619 5.55777C13.5308 5.64725 14.1851 5.8408 14.8004 6.13453C15.9341 6.67575 16.8867 7.5339 17.5429 8.60516C18.1991 9.67641 18.5308 10.9149 18.4978 12.1707C18.4649 13.4265 18.0688 14.6459 17.3574 15.6813C16.646 16.7167 15.6497 17.5238 14.4892 18.0049C13.3288 18.486 12.0537 18.6204 10.8184 18.3921C9.58307 18.1637 8.4404 17.5822 7.52862 16.718C7.2828 16.485 7.05661 16.2342 6.85156 15.9681L5.81699 16.2453Z" fill="#333333"/>
                                <path d="M5.91239 4.06647C6.68924 3.47037 7.54796 2.99272 8.46042 2.64739C8.87978 2.48868 9.08946 2.40932 9.28694 2.51053C9.48442 2.61174 9.54649 2.84338 9.67063 3.30667L11.7412 11.0341C11.8632 11.4894 11.9242 11.7171 11.8206 11.8964C11.7171 12.0758 11.4894 12.1368 11.0341 12.2588L3.30667 14.3294C2.84338 14.4535 2.61174 14.5156 2.42535 14.3952C2.23896 14.2747 2.20284 14.0535 2.13061 13.6109C1.97344 12.6481 1.95774 11.6656 2.08555 10.6947C2.25696 9.39275 2.68314 8.13728 3.33975 7C3.99636 5.86272 4.87054 4.8659 5.91239 4.06647Z" stroke="#333333"/>
                            </svg>
                        </span>
                        {!! $post->area_format !!} 
                    </p>
                </div>
                <p class="flex items-start gap-1 px-1 mb-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 10.5C20 15.518 14.5117 18.9027 12.9249 19.7764C12.6568 19.924 12.3432 19.924 12.0751 19.7764C10.4883 18.9027 5 15.518 5 10.5C5 6 8.63401 3 12.5 3C16.5 3 20 6 20 10.5Z" stroke="#333333"/>
                        <circle cx="12.5" cy="10.5" r="3.5" stroke="#333333"/>
                    </svg>
                    <span class="overflow-hidden line-clamp-1 text-[15px] font-normal">
                        {{ $post->location }}
                    </span>
                </p>
                <p class="mb-3 text-[#868686] font-normal px-2 text-[15px]" >Đăng {{ $post->date_difference }}</p>
            </a>
        </div>
    </li>
@empty

@endforelse


