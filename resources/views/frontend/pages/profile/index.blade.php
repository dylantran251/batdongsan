
@extends('frontend.layout.main')
@section('title'){{ $title }}@endsection
@section('subcontent')
<div class="mx-5 xl:container xl:mx-auto xl:px-20">
    <div class="text-[#D7D7D7] text-[14px]">
        <p>Trang chủ/<span class="text-black">{{ $title }}</span> </p>
    </div>
    <div class="w-full rounded shadow-lg border p-10">
        <form action="{{ route('profile.update', $customer['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <h2 class="text-xl  leading-7 text-gray-900 border-b font-bold">Thông tin cá nhân</h2>  
            <div class="pb-12 flex items-center">
                <div class="w-40 h-40 text-center">
                    <img src="{{ isset($customer['avatar']) ? asset('uploads/'.$customer['avatar']) : asset('dist/images/profile-1.jpg')}}" class="w-40 h-40 shadow rounded-lg object-cover" alt="" id="uploaded-image">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white  text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500 mt-2">
                        <span>Thay đổi ảnh</span>
                        <input id="file-upload" name="avatar" type="file" class="sr-only" accept="avatar/*" onchange="displayImage(this)">
                    </label>
                </div>
                <div class="w-full pl-8">
                            
                    <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="name" class="block text-base  leading-6 text-gray-900">Họ và tên</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" value="{{ isset($customer['name']) ? $customer['name'] : '' }}"  class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="email" class="block text-base  leading-6 text-gray-900">Địa chỉ email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" value="{{ isset($customer['email']) ? $customer['email'] : '' }}"  class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6" disabled>
                            </div>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="phone" class="block text-base  leading-6 text-gray-900">Số điện thoại</label>
                            <div class="mt-2">
                                <input type="tel" name="phone" id="phone" value="{{ isset($customer['phone']) ? $customer['phone'] : '' }}" class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-base  leading-6 text-gray-900">Quay lại</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-base  text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('uploaded-image').src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection