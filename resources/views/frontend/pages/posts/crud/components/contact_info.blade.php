<div class="mb-4">
    <div class="shadow-lg p-6 rounded-lg bg-white">
        <h1 class="text-black text-[24px] font-bold mb-10">Thông tin liên hệ</h1>
        <div class="mb-4">
            <label for="name" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Tên liên hệ <span>*</span></label>
            <input type="text" id="name" name="name"  value="{{ isset($post) ? $post->user->name : Auth::user()->name }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
        </div>
        <div class="mb-4">
            <label for="phone" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Số điện thoại <span>*</span></label>
            <input type="text" id="phone" name="phone"  value="{{ isset($post) ? $post->user->phone : Auth::user()->phone }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
        </div>
        <div class="mb-4">
            <label for="email" class="block font-bold mb-2 text-base font-bold text-gray-900 dark:text-white">Email</label>
            <input type="text" id="email" name="email"  value="{{ isset($post) ? $post->user->email : Auth::user()->email }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
        </div>
    </div>
</div>