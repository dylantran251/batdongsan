<div class="mb-8">  
    <div id="main-carousel" class="splide w-full rounded mb-3" aria-label="Hình ảnh bất động sản">
        <div class="splide__track">
            <ul class="splide__list">
                @if(!empty($post->getImages()))
                    @foreach ($post->getImages() as $image)
                        <li class="splide__slide w-full flex items-center justify-center relative overflow-hidden h-[540px] rounded-lg"> 
                            <div class="max-w-[860px] max-h-[470px]">
                                <img src="{{ asset('uploads/'.$image) }}" class="object-cover min-w-[860px] h-[470px] rounded-lg z-[2]" alt="">
                            </div>                  
                            <div class="absolute inset-0 opacity-50 z-[1] bg-gray-400 blur-sm rounded-lg"></div>                                                          
                        </li>
                    @endforeach                                                  
                @endif
            </ul>
        </div>
    </div>

    <ul id="thumbnails" class="thumbnails grid grid-cols-6 items-center justify-between gap-2">
        @if(!empty($post->getImages()))
            @foreach ($post->getImages() as $image)
                <li class="thumbnail col-span-1 overflow-hidden list-none cursor-pointer opacity-300 rounded-lg">
                    <img class="transition-transform transform hover:scale-96 object-cover h-[120px] w-full rounded-lg" src="{{ asset('uploads/'.$image) }}" alt=""> 
                </li>
            @endforeach
        @endif
    </ul>
</div>