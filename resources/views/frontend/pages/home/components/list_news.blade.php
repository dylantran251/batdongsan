<div class="mb-20 max-w-[1200px] mx-auto">
    <div class="flex justify-between items-start">
        <a href="" class="text-[25px] text-black font-bold"  >Tin tức nổi bật</a>
        <a href="{{ route('news.index') }}" class="flex items-center font-bold gap-2 text-[#DC2D27] text-[14px] py-1">
            Xem thêm
            <svg width="21" height="10" viewBox="0 0 21 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5 5.29451L19.8659 4.95373L20.1833 5.29451L19.8659 5.6353L19.5 5.29451ZM1 5.79451C0.723858 5.79451 0.5 5.57065 0.5 5.29451C0.5 5.01837 0.723858 4.79451 1 4.79451V5.79451ZM15.8659 0.659215L19.8659 4.95373L19.1341 5.6353L15.1341 1.34079L15.8659 0.659215ZM19.8659 5.6353L15.8659 9.92981L15.1341 9.24824L19.1341 4.95373L19.8659 5.6353ZM19.5 5.79451H1V4.79451H19.5V5.79451Z" fill="#DC2D27"/>
            </svg>
        </a>
    </div>
    <hr class="relative h-[1.5px] mb-8 mt-2 border-0 red-line z-[1]">
    <div class="grid grid-cols-2 items-start gap-9 ">
        @if($firstNews)
            <div class="hidden md:flex flex-col">
                <div class="w-full mb-6">
                    <img src="{{ $firstNews->photo_url }}" class="w-full min-h-[360px] rounded-lg object-cover" alt="">
                </div>
                <a href="{{ route('news.details', ['news_title' => $firstNews['title']]) }}" class="text-[25px] font-bold text-[#404040] mb-3 overflow-hidden line-clamp-2">
                    {{ $firstNews['title'] }}
                </a>
                <p class="flex text-base items-center gap-1 text-[#A0A0A0] font-bold">
                    <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7761 26.8334C22.1202 26.8334 27.2934 21.7758 27.2934 15.5C27.2934 9.22422 22.1202 4.16669 15.7761 4.16669C9.43189 4.16669 4.25867 9.22422 4.25867 15.5C4.25867 21.7758 9.43189 26.8334 15.7761 26.8334Z" stroke="#BDBDBD" stroke-width="2"/>
                        <path d="M21.6921 15.5H16.0261C15.888 15.5 15.7761 15.3881 15.7761 15.25V10.9792" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    {{ $firstNews->date_difference }}
                </p>
            </div>
        @endif
        <div class="flex flex-col gap-6 w-full">
            @foreach ($nextNews as $item)
                <div class="flex items-start max-h-[140px] gap-6">
                    <div class="min-w-[220px] h-[140px]">
                        <img src="{{ $item->photo_url }}" class="w-full h-full object-fill rounded-lg" alt="" >
                    </div>
                    <div class="w-full">
                        <a href="{{ route('news.details', ['news_title' => $item['title']]) }}" class="text-base flex flex-col gap-6">
                            <span class="overflow-hidden line-clamp-2 font-bold">{{ $item['title'] }}</span>
                            <span class="flex items-center gap-1 text-[#A0A0A0] font-normal">
                                <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.7761 26.8334C22.1202 26.8334 27.2934 21.7758 27.2934 15.5C27.2934 9.22422 22.1202 4.16669 15.7761 4.16669C9.43189 4.16669 4.25867 9.22422 4.25867 15.5C4.25867 21.7758 9.43189 26.8334 15.7761 26.8334Z" stroke="#BDBDBD" stroke-width="2"/>
                                    <path d="M21.6921 15.5H16.0261C15.888 15.5 15.7761 15.3881 15.7761 15.25V10.9792" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                {{'Đăng '. $item->date_difference }}
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>