<div class="mb-4">
    <div class="p-6 rounded-lg shadow-lg bg-white">
        <h1 class="text-black text-[24px] font-bold mb-10">Thông tin bài viết</h1>
        <div class="mb-4">
            <label for="title" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Tiêu đề</label>
            <input type="text" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}" placeholder="Nhập tiêu đề VD: Cần bán gấp căn hộ chính chủ tại Nma Từ Liên" required
            class="block bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <span class="text-gray-600 text-sm p-2" id="title-error">Tối thiểu 30 , tối đa 100 kí tự</span>
        </div>
        <div class="mb-4">
            {{-- WYSIWYG --}}
            <label for="WYSIWYG" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Nội dung</label>
            <textarea type="text" id="WYSIWYG" name="description" rows="10"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            placeholder="Nhận nội dung mô tả VD: nhà chính chủ gần trường học, chợ..." >{{ isset($post) ? $post->description : '' }}</textarea>
            <span class="text-gray-600 text-sm p-2" id="description-error">Tối thiểu 30, tối đa 3000 kí tự</span>
        </div>
    </div>
</div>