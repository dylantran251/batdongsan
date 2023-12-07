<div class="mb-16 mt-10 xl:mt-0">
    <h1 class="mb-10  text-[18px] text-[#2C2C2C] font-bold" >Tìm theo từ khóa</h1>
    <ul class="flex items-center flex-wrap gap-4">
        @foreach ($post->tags as $tag)
            <li class="choose-keyword cursor-pointer text-gray-900 w-auto bg-gray-200 p-2 px-4 rounded-full hover:bg-[#FFD8C2] hover:text-[#74150F]"
                data-category-name = "{{ $post->category->name }}">{{ $tag['name'] }}
            </li>
        @endforeach
    </ul>
</div>