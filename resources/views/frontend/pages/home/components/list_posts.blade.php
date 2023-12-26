<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<style>
    .slider-posts-home-page .splide__arrow--prev{
        width: 47px;
        height: 47px;
        position: absolute;
        background: transparent;
        border: 1px solid #868686;
        left: -5%;
        top: 50%;
    }
    .slider-posts-home-page .splide__arrow--next{
        width: 47px;
        height: 47px;
        background: transparent;
        position: absolute;
        border: 1px solid #868686;
        top: 50%;
        right: -5%;
    }

    .red-line:before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        z-index: 1;
        left: 0%;
        width: 9%;
        height: 100%;
        border-color: red;
        border-top-width: 10px;
    }

    .red-line:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 9%;
        width: 92%;
        height: 1px;
        z-index: 1;
        border-style: dashed;
        border-color: #E0E0E0;
        border-top-width: 1px;
    }
</style>
@isset($data)
    @foreach($data as $item)
        <div class="bg-list-post pt-[3.6em] bg-[#F6F6F6] mb-3">
            <div class="max-w-[1200px] mx-auto">
                <div class="relative pb-9 w-full">
                    <h1 class="text-[25px] text-black font-bold mb-7" >{{ $item['category']->name }}</h1>
                    {{-- Slider list post card --}}
                    <div class="slider-posts-home-page splide w-full bg-white rounded-lg p-6 border" role="group">
                        <div class="splide__track w-full">
                            <ul class="splide__list grid grid-cols-4">
                                {{-- Slider --}}
                                @include('frontend.pages.home.components.slider_posts')
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- List cart post --}}
                <div class="flex flex-col mb-8">
                    @include('frontend.pages.home.components.card_post')
                    <div id="{{'list-more-post-container-'.$item['category']->id}}">
                    </div>
                </div>
                <div class="text-center pb-10">
                    <button data-category-id ="{{ $item['category']->id }}" data-category-name="{{ $item['category']->name }}" data-url = {{ route('load-more-posts') }} data-check = "false" type="button" 
                        class="load-more-posts rounded bg-white py-2.5 px-[4.25rem] border border-[#DC2D27] text-[#DC2D27] uppercase hover:text-white hover:bg-[#DC2D27] text-center">
                        Xem thêm các tin khác
                    </button>
                </div>
            </div>
        </div>
    @endforeach
@endisset
@push('scripts')
    <script>
        function sliderPostsByCategory(){
            document.querySelectorAll('.slider-posts-home-page').forEach(element => {
                new Splide(element , {
                    type: 'loop',
                    perPage: 4,
                    perMove: 1,
                    gap: 21,
                    padding: 0,
                    pagination: false,
                    breakpoints: {
                        1280: {
                            perPage: 3,
                        },
                        860: {
                            perPage: 2,
                        },
                        625: {
                            perPage: 1,
                        },
                    }
                }).mount();
            });  
        }

        function changeBackground() {
            const divBackground = document.querySelectorAll('.bg-list-post');
            console.log(divBackground);
            for (let i = 0; i < divBackground.length; ++i) {
                if (i % 2 !== 0) {
                    divBackground[i].classList.remove('bg-[#F6F6F6]');
                    divBackground[i].classList.add('bg-white');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            sliderPostsByCategory()
            changeBackground()
        });

    </script>
@endpush