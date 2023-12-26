<div id="navbar_mobile" class="hidden lg:hidden fixed h-screen w-[315px] top-0 right-0 bg-white z-[999] shadow py-8 trans text-gray-900">
    <div class="flex flex-col items-start gap-4 ">
        @if(auth()->check())
            <div class="flex items-center justify-between sticky top-0 right-0 gap-4 w-full px-6 border-b pb-4">
                <div class="flex items-center w-full">
                    <img class="w-12 h-12 rounded-full mr-4" src="{{ asset('uploads/1700805091215.jpg') }}" alt="">
                    <div class="font-bold dark:text-white">
                        <div class="text-[18px] mb-2 text-gray-500">{{ auth()->user()->name }}</div>
                    </div>
                </div>
                <button type="button" class="relative inline-flex w-auto items-center text-center ">
                    <svg height="30" width="24" viewBox="0 0 448 512">
                        <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/>
                    </svg>
                    <span class="sr-only">Thông báo</span>
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">20</div>
                </button>
            </div>
        @else
            <div class="flex w-full items-start gap-4">
                <a href="{{ route('login') }}" class="px-5 py-4 border rounded-lg w-full text-center hover:bg-gray-300 sm:text-base md:text-base lg:text-base xl:text-base">Đăng nhập</a>
                <a href="{{ route('register') }}" class="px-5 py-4 border rounded-lg w-full  text-white bg-[#DC2D27] text-center">Đăng ký</a>
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="w-full px-5 py-4 border rounded-lg text-center text-base font-bold text-white bg-[#dc2d27] mx-6">
            Đăng tin
        </a>
        <ul class="flex flex-col items-start text-black text-base dark:bg-gray-800 w-full dark:border-gray-700">
            @if(auth()->check())
            <li class="py-3 px-6 my-1 w-full hover:bg-gray-200">
                <a href="{{ route('posts.my-posts') }}" class="flex items-center gap-4">
                    <svg  height="24" width="24" viewBox="0 0 512 512">
                        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
                    </svg>
                    Danh sách tin
                </a>
            </li>

            @endif
            <li class="py-3 px-6 my-1 w-full hover:bg-gray-200">
                <a href="" class="flex items-center gap-4">
                    <svg  height="24" width="24" viewBox="0 0 512 512">
                        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                    </svg>
                    Tin đã lưu
                </a>
            </li>
            <li class="py-3 px-6 w-full hover:bg-gray-200">
                <a href="{{ route('home') }}" class="flex items-center gap-4">
                    <svg height="24" width="26" viewBox="0 0 576 512">
                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                    </svg>
                    Trang chủ
                </a>
            </li>
            @foreach($fiveMenus as $menu)
                <li class="py-3 px-6 w-full hover:bg-gray-200">
                    <a href="{{route('loadPage', ['category_name' => $menu['name']] )}}" class="flex items-center gap-4" aria-current="page">
                        <svg height="24" width="26" viewBox="0 0 576 512">
                        </svg>
                        {{ $menu['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        @if(auth()->check())
            <a href="{{ route('logout') }}" class="flex items-center justify-center text-base px-5 py-4 mx-6 gap-3 font-bold w-full border rounded-lg hover:bg-gray-200">
                <i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>
                Đăng xuất
            </a>
        @endif
    </div>
</div>