<div class=" mb-16 mx-5 xl:container xl:mx-auto xl:px-20 ">
    <div class="flex justify-between ">
        <a href="" class="text-[25px] text-black font-bold"  >Tin tức nổi bật</a>
        <a href="{{ route('news.index') }}" class="flex items-center font-bold gap-2 text-[#DC2D27] text-[16px]">
            Xem thêm
            <svg width="21" height="10" viewBox="0 0 21 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5 5.29451L19.8659 4.95373L20.1833 5.29451L19.8659 5.6353L19.5 5.29451ZM1 5.79451C0.723858 5.79451 0.5 5.57065 0.5 5.29451C0.5 5.01837 0.723858 4.79451 1 4.79451V5.79451ZM15.8659 0.659215L19.8659 4.95373L19.1341 5.6353L15.1341 1.34079L15.8659 0.659215ZM19.8659 5.6353L15.8659 9.92981L15.1341 9.24824L19.1341 4.95373L19.8659 5.6353ZM19.5 5.79451H1V4.79451H19.5V5.79451Z" fill="#DC2D27"/>
            </svg>
        </a>
    </div>
    <hr class="relative h-[2px] mb-10 mt-4 border-0 red-line z-[1]">
    <div class="flex flex-col lg:flex-row gap-8 h-auto">
        @if($firstNews)
            <div class="hidden md:flex flex-col gap-8">
                <div class="w-full ">
                    <img src="{{ ($firstNews->getAvatar(0)) ? asset('uploads/'.$firstNews->getAvatar(0)) : asset('dist/images/preview-1.jpg') }}" class="w-full h-[450px] rounded-lg object-cover" alt="">
                </div>
                <a href="{{ route('news.details', ['news_title' => $firstNews['title']]) }}">
                    <h1 class="text-[25px] font-bold text-[#404040] mb-5 overflow-hidden line-clamp-2">{{ $firstNews['title'] }}</h1>
                    <p class="flex text-sm md:text-base items-center gap-1 text-[#A0A0A0] ">
                        <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7761 26.8334C22.1202 26.8334 27.2934 21.7758 27.2934 15.5C27.2934 9.22422 22.1202 4.16669 15.7761 4.16669C9.43189 4.16669 4.25867 9.22422 4.25867 15.5C4.25867 21.7758 9.43189 26.8334 15.7761 26.8334Z" stroke="#BDBDBD" stroke-width="2"/>
                            <path d="M21.6921 15.5H16.0261C15.888 15.5 15.7761 15.3881 15.7761 15.25V10.9792" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        {{ $firstNews->dateDifference() }}
                    </p>
                </a>
            </div>
        @endif
        <div class="flex flex-col gap-4">
            @foreach ($nextNews as $item)
                <div class="flex flex-row md:mb-auto gap-4 pr-4">
                    <div class="w-2/5  flex justify-center items-center  ">
                        <img src="{{ ($item->getAvatar(0)) ? asset('uploads/'.$item->getAvatar(0)) : asset('dist/images/preview-1.jpg') }}" class="w-full h-[170px] object-cover rounded-lg" alt="" >
                    </div>
                    <div class="w-3/5">
                        <a href="{{ route('news.details', ['news_title' => $item['title']]) }}" class="text-sm sm:text-[18px] flex flex-col gap-6">
                            <span class="overflow-hidden text-[18px] line-clamp-2 font-bold">{{ $item['title'] }}</span>
                            <span class="flex text-sm md:text-base items-center gap-1 text-[#A0A0A0] ">
                                <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.7761 26.8334C22.1202 26.8334 27.2934 21.7758 27.2934 15.5C27.2934 9.22422 22.1202 4.16669 15.7761 4.16669C9.43189 4.16669 4.25867 9.22422 4.25867 15.5C4.25867 21.7758 9.43189 26.8334 15.7761 26.8334Z" stroke="#BDBDBD" stroke-width="2"/>
                                    <path d="M21.6921 15.5H16.0261C15.888 15.5 15.7761 15.3881 15.7761 15.25V10.9792" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                {{ ($item->dateDifference()) }}
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>