@extends('frontend.layout.main')
@section('title')
{{ $title }}
@endsection
@section('subcontent')
<style>
    #main-carousel .splide__arrow--prev, #main-carousel .splide__arrow--next {
        background: #D9D9D9;
        padding:7px;
        border-radius: 100%;
        cursor: pointer; 
    }
    #main-carousel .splide__arrow--prev:hover, #main-carousel .splide__arrow--next:hover {
        opacity: 2;
    }
    #sliderBDSForYou .splide__arrow--prev, #sliderPostViewed .splide__arrow--prev{
        width: 36px;
        height: 36px;
        position: absolute;
        top: -5%;
        left: 76% !important;
        border: 1px solid #c5c5c5;
        border-radius:5px;
    }
    #sliderBDSForYou .splide__arrow--next, #sliderPostViewed .splide__arrow--next{
        width: 36px;
        height: 36px;
        position: absolute;
        top: -5%;
        right: 17% !important;
        border: 1px solid #c5c5c5;
        border-radius:5px;
    }
    .thumbnail.is-active {
        opacity: 1;
        outline: 2px solid black;
    }

</style>
<div id="post-details">
    @include('frontend.pages.posts.details.components.search_bar')
    <div class="bg-gray-50 pb-20 pt-10">
        <div class="max-w-[1200px] mx-auto">
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">
                <div class="xl:col-span-9">
                    @include('frontend.pages.posts.details.components.image_gallery')
                    @include('frontend.pages.posts.details.components.info_posts')

                    <hr>
                    @include('frontend.pages.posts.details.components.action')
                    <hr>

                    @include('frontend.pages.posts.details.components.real_estate_info')
        
                    @include('frontend.pages.posts.details.components.compare_neighborhoods')

                    @include('frontend.pages.posts.details.components.view_map')
        
                    {{-- Respónive --}}
                    <div class="flex flex-col gap-8 xl:hidden">
                        {{-- <div>
                            <h1 class="mb-5 text-[18px] text-[#2c2c2c]" >Liên hệ tác giả</h1>
                            <div class="flex flex-col items-center gap-3 border rounded py-10 px-8">
                                <div class="flex justify-center items-center h-16 w-16">
                                    <img src="{{ asset('dist/images/profile-1.jpg') }}" class="rounded-full h-full w-full object-cover" alt="">
                                </div>
                                
                                <p style="font-size: 13px; color: #9f9f9f;">Được đăng bởi</p>
                                <h1 class="text-base"><a href="" class="text-[#2c2c2c] font-bold">{{ $post->user->name }}</a></h1>
                                <p><a href="" class="text-[#2c2c2c] text-14px">Xem thêm {{ isset($countPostByUser) ? $countPostByUser : 1 }} tin khác</a></p>
                                <button class="flex items-center justify-center gap-3 p-4 font-bold w-full text-white text-base text-bold rounded-lg bg-[#04b9ae] hover:bg-gray-200" >
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.4999 6.5C15.2371 6.64382 15.9689 6.96892 16.4999 7.5C17.031 8.03108 17.3561 8.76284 17.4999 9.5M14.9999 3C16.5315 3.17014 17.9096 3.91107 18.9999 5C20.0902 6.08893 20.8279 7.46869 20.9999 9M20.9994 16.4767V19.1864C21.0036 20.2223 20.0722 21.0873 19.0264 20.9929C10 21 3 13.935 3.00706 4.96919C2.91287 3.92895 3.77358 3.00106 4.80811 3.00009H7.52325C7.96247 2.99577 8.38828 3.151 8.72131 3.43684C9.66813 4.24949 10.2771 7.00777 10.0428 8.10428C9.85987 8.96036 8.9969 9.55929 8.41019 10.1448C9.69858 12.4062 11.5746 14.2785 13.8405 15.5644C14.4272 14.9788 15.0273 14.1176 15.8851 13.935C16.9855 13.7008 19.7615 14.3106 20.5709 15.264C20.8579 15.6021 21.0104 16.0337 20.9994 16.4767Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span class="masked-phone-number">{{ $post->user->getHideLast3DigitsPhoneNumberAttribute() }}</span> 
                                    Hiện số
                                </button>  
                                <a href="" class="w-full p-4 border text-center text-[#686868] rounded-lg ">Yêu cầu liên hệ lại </a>
                            </div>                    
                        </div> --}}
        
                        {{-- <div class="grid grid-cols-1 sm:flex sm:justify-between gap-8">
                            <div class="flex flex-col gap-4 border rounded text-black px-8 py-6 w-full text-[14px] bg-[#DEDEDE]">
                                <p class="">Bán nhà riêng tại {{ $post->district->name }}</p>
                                <ul class="space-y-6">
                                    @foreach ($dataPostByWard as $item)
                                        <li>
                                            <a href="{{ route('get_posts_by_ward', ['categoryName' => $post->category->name, 'wardName' => $item['nameWard']]) }}">
                                                {{ $item['nameWard'] }} ({{ $item['numPosts'] }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>     
                            <div class=" flex flex-col gap-4 border rounded text-black px-8 py-6 w-full" style="font-size: 14px;">
                                <p class="font-bold">Mua bán nhà đất</p>
                                <ul class="space-y-3 xl:space-y-5 location-filter">
                                    @foreach ($dataPostByProvince as $item)
                                        <li class="li-province-current">
                                            <button type="submit" onclick="onButtonSetLocationParams({{ $item['idProvince'] }})">{{ $item['nameProvince'] }} </button>
                                            ({{ $item['numPosts'] }})
                                        </li>
                                    @endforeach
                                </ul>
                                <button type="button" class="flex items-center gap-2  text-[#DC2D27]" data-expanded = "true" 
                                onclick="loadMoreProvinces(this)">
                                    Xem thêm
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>             
                        </div> --}}
                    </div>
                    @include('frontend.pages.posts.details.components.keyword')
                    <hr class="">
                    {{-- Sider Bất Động Sản Dành Cho Bạn --}}
                    <div class=" flex flex-col w-full overflow-hidden">
                        <h1 class="mt-5 text-[18px] text-[#2C2C2C] font-bold">Bất động sản dành cho bạn</h1> 
                        <div id="sliderBDSForYou" class="splide w-[120%] mt-3"  role="group" aria-label="Bất động sản dành cho bạn">
                            <div class="splide__track">
                                  <ul class="splide__list">
                                    @foreach ($realEstateForYou as $item)
                                        @include('frontend.pages.posts.details.components.card_carousel')
                                    @endforeach
                                  </ul>
                            </div>
                        </div>
                    </div>
                    {{-- sliderPostViewed --}}
                    <div class=" flex flex-col w-full overflow-hidden mt-10">
                        <h1 class="mt-5 text-[18px] text-[#2C2C2C] font-bold">Tin đã xem</h1> 
                        <div id="sliderPostViewed" class="splide w-[120%] mt-3"  role="group" aria-label="Bất động sản dành cho bạn">
                            <div class="splide__track">
                                  <ul class="splide__list">
                                    @forelse ($postsViewed as $item)
                                        @include('frontend.pages.posts.details.components.card_carousel')
                                    @empty
                                        <div class="flex items-center p-4 mt-6 text-base w-full text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <div>
                                                <span class="">Bạn chưa xem tin đăng nào à?</span>
                                            </div>
                                        </div>
                                    @endforelse
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 gap-8 hidden xl:flex xl:flex-col xl:col-span-3">
                    {{--  gap-8 --}}
                    @include('frontend.pages.posts.details.components.author_info')
                    @include('frontend.pages.posts.details.components.related_location')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        // Initialize and add the map
        let map;

        async function initMap() {
            const position = { lat: 21.5786687, lng: 105.8172885 };
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
            map = new Map(document.getElementById("map"), {
                zoom: 20,
                center: position,
                mapId: "DEMO_MAP_ID",
            });
            const marker = new AdvancedMarkerElement({
                map: map,
                position: position,
                title: "Vị trí bất động sản",
            });
        }

    </script>

    <script>
        var splide = new Splide( '#main-carousel', {
            pagination: false,
            type: 'loop', 
        });
        var thumbnails = document.getElementsByClassName( 'thumbnail' );
        var current;
        for ( var i = 0; i < thumbnails.length; i++ ) {
            initThumbnail( thumbnails[ i ], i );
        }
        function initThumbnail( thumbnail, index ) {
            thumbnail.addEventListener( 'click', function () {
                splide.go( index );
            });
        }
        splide.on( 'mounted move', function () {
            var thumbnail = thumbnails[ splide.index ];
            if ( thumbnail ) {
                if ( current ) {
                    current.classList.remove( 'is-active' );
                    }
                    thumbnail.classList.add( 'is-active' );
                    current = thumbnail;
                }
        });
        splide.mount();

        function sliderPosts(idName){
            new Splide( idName, {
                type: 'loop',
                perPage: 4,
                pageMove: 1,
                gap: 25,
                breakpoins: {
                    1200: {
                            perPage: 3,
                        },
                    992: {
                        perPage: 2,
                    },
                }
            } ).mount();
        }

        $(document).ready(function(){
            sliderPosts('#sliderBDSForYou');
            sliderPosts('#sliderPostViewed')
            initMap()
        })

    </script>    
@endpush