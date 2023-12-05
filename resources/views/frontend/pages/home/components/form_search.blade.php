

    <div class="lg:mb-20">
        <div class="relative hidden lg:block">
            @include('frontend.pages.home.components.banner')
            <div class="absolute xl:w-[60%] left-1/2 transform -translate-x-1/2 bottom-[15%] w-[70%] px-4">
                <div>
                    <form id="formSearchHomePage" class="form-search" action="{{ route('search', ['category_name' => $defaulCategory->name ]) }}" role="user-homepage">
                        <ul class="block flex text-base space-x-3 categories-list-container">
                            @isset($data)
                                @foreach($data as $key => $item)
                                    <li>
                                        <button type="button" data-id="{{ $item['category']->id }}" data-url="{{ route('get-real-estate-types-by-category') }}" 
                                        class="p-4 choose-category rounded-t text-white {{ $key === 0 ? 'font-bold bg-black' : 'bg-[#8f8f8f]' }} bg-opacity-70 hover:bg-black hover:bg-opacity-70 hover:font-bold" >
                                            {{ $item['category']->name }}
                                        </button>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>  
                        <div class="flex flex-col p-8 rounded-r rounded-b bg-black bg-opacity-70">
                            <div class="relative flex items-center bg-white shadow-xl rounded mb-5">
                                {{-- Real types estate filter attribute --}}
                                @include('frontend.search_attributes.components.real_estate_types', ['style' => 0])
                                {{-- Search with keyword --}}
                                <input type="text" name="keyword" class="keyword px-3 py-4 w-full text-base border-l-2 rounded-r" value="">
                                <button type="button" id="btn-submit" class="submit-form py-2 px-4 absolute top-[15%] flex items-center p-1 rounded-lg gap-1 uppercase text-white bg-[#EB5757] right-[1%] hover:bg-[#EB1010] ">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11" cy="11" r="6" fill="#7E869E" fill-opacity="0.25" stroke="white" stroke-width="1.2" />
                                    <path d="M11 8C10.606 8 10.2159 8.0776 9.85195 8.22836C9.48797 8.37913 9.15726 8.60010 8.87868 8.87868C8.60010 9.15726 8.37913 9.48797 8.22836 9.85195C8.0776 10.2159 8 10.606 8 11" stroke="white" stroke-width="1.2" stroke-linecap="round" />
                                    <path d="M20 20L17 17" stroke="white" stroke-width="1.2" stroke-linecap="round" />
                                    </svg>
                                    Tìm kiếm
                                </button>
                            </div>
                            @include('frontend.search_attributes.index', ['style' => 0])
                        </div>
                    </form>
                </div>

            </div>
        </div>
        {{-- Search mobile --}}
        <div class="lg:hidden">
            @include('frontend.layout.search_bar', ['style' => 1])
        </div>
    </div>

