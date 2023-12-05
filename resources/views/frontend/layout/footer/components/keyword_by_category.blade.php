<div class=" py-10 mb-12 mx-5 xl:container xl:mx-auto xl:px-20">
    <div class="p-10 border">
        <a href="https://muabannhadatchinhchu.vn" class="text-xl md:text-[25px] text-[#DC2D27]" style="font-weight: bold;">Muabannhadatchinhchu.vn</a>
        <p class="text-[14px] text-[#222222] mt-6 mb-10" >
            là website số 1 về bất động sản tại Việt Nam(*) giúp những người tìm kiếm bất động sản tìm được ngôi nhà của mình với hàng triệu tin đăng bất động sản mỗi tháng và những thông tin, tư vấn giúp họ có thể tự tin hơn mỗi khi ra quyết định liên quan tới bất động sản.
        </p>
        <p class="mb-10 text-[14px] text-[#222222]">
            Muabannhadatchinhchu.vn cũng là nền tảng công nghệ và đối tác tin cậy đối với các cá nhân, doanh nghiệp kinh doanh bất động sản và các chủ đầu tư trong việc truyền thông, nghiên cứu thị trường dựa trên các dữ liệu lớn (big data) trực tuyến và cung cấp các ứng dụng, giải pháp bán hàng và quản lý bán hàng, marketing trong lĩnh vực bất động sản.
        </p>
        <hr class="mb-10" >
        <div class= "grid grid-cols-1 gap-4 md:grid-cols-2 lg:flex lg:justify-between">
            @foreach ($dataKeywordByCategory as $item)
                <div class="flex flex-col gap-2 px-6">
                    <h1 class="text-black text-xl md:text-[25px] mb-6 whitespace-nowrap font-bold">{{ $item['category_name'] }}</h1>
                    <ul class="list-disc ml-4 space-y-3">
                        @foreach ($item['keyword']->take(12) as $kw)
                            <li class="choose-keyword text-[#858585] text-[14px] cursor-pointer hover:text-[#DC2D27]" data-category-name="{{ $item['category_name'] }}">
                                {{ $kw['name'] }}
                            </li>
                        @endforeach
                    </ul>                            
                </div> 
            @endforeach 
        </div>
    </div>
</div>
