
@extends('frontend.layout.main')
@section('title'){{ $title }}@endsection
@section('subcontent')
<div class="mx-5 xl:container xl:mx-auto xl:px-20">
    <div class="text-[#D7D7D7] text-[14px]">
        <p>Trang chủ/<span class="text-black">{{ $title }}</span> </p>
    </div>
    <h1 class="text-black  mb-10 mt-2 text-[25px]" >
        <a href="">{{ $title }}</a>
    </h1>
    <div class="w-full rounded shadow-lg border p-10">
        <form action="{{ route('profile.update', $customer['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="space-y-8">
                <div class="pb-10">
                    <label for="cover-photo" class="block text-xl  border-b leading-6 text-gray-900">Ảnh đại diện</label>
                    <div class="flex items-center gap-8 mt-3">
                        <img src="{{ isset($customer['image']) ? asset('uploads/'.$customer['image']) : asset('dist/images/profile-1.jpg')}}" class="w-40 h-40 shadow rounded-lg object-cover" alt="" id="uploaded-image">
                        <div class="w-full">
                            <div class="flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex text-base leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white  text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Tải file</span>
                                            <input id="file-upload" name="image" type="file" class="sr-only" accept="image/*" onchange="displayImage(this)">
                                        </label>
                                        <p class="pl-1">hoặc kéo và thả </p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF dưới 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pb-12">
                <h2 class="text-xl  leading-7 text-gray-900 border-b">Thông tin cá nhân</h2>          
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
                        <label for="phone-number" class="block text-base  leading-6 text-gray-900">Số điện thoại</label>
                        <div class="mt-2">
                            <input type="tel" name="phone-number" id="phone-number" value="{{ isset($customer['phone']) ? $customer['phone'] : '' }}" class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
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