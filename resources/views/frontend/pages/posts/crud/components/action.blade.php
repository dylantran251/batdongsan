<div id="action-container" class="flex px-10 py-2 border shadow-lg rounded-lg bg-white w-full sticky bottom-0 right-0 left-0 z-[999]">
    <div class="flex w-full flex-col items-start justify-center">
        <div class="flex items-center gap-2">
            <label for="location" class="block font-bold text-base leading-6 text-black whitespace-nowrap">Trạng thái:</label>
            <input type="text" name="" id="status" value="Đang khởi tạo" class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400" disabled>
        </div>
        <div class="flex items-center gap-2">
            <label for="location" class="block font-bold text-base leading-6 text-black whitespace-nowrap">Loại tin:</label>
            <input type="text" name="vip" id="vip" value="Tin thường" class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400 " disabled>
        </div>
    </div>
    <div class="w-full flex justify-end items-center gap-4">
        <button type="button" class="px-10 py-3 text-base font-bold text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Nháp
        </button>
        <button type="button" id="submit-form" 
        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-bold rounded-lg text-base px-10 py-3 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            Đăng tin
        </button>
    </div>
</div>