<div id="modalAddChoose" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50">
    <div class="bg-white rounded-lg w-[315px] px-10">
        <div class="flex justify-between py-6 border-b">
            <h1 id="titleModal" class="font-bold"></h1>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="mt-4">
            <label for="inputModal" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white"></label>
            <input type="text" id="inputModal" placeholder="Nhập thông tin"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="my-4 flex justify-end w-full">
            <button type="button" id="buttonSubmitModal" data-option-type=""
                class="text-white bg-blue-600 hover:bg-blue-800  focus:ring-blue-300 font-bold rounded-lg text-base px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Thêm
            </button>
        </div>
    </div>
</div>