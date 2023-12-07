@extends('admin/layout/main')

@section('subhead')
    <title>Dashboard - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Cập nhật hồ sơ</h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ $fakers[0]['users'][0]['name'] }}</div>
                    <div class="text-gray-600">{{ $fakers[0]['jobs'][0] }}</div>
                </div>
                <div class="dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                        <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i>
                    </a>
                    <div class="dropdown-box mt-5 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box">
                            <div class="p-4 border-b border-gray-200 font-medium">Export Options</div>
                            <div class="p-2">
                                <a href="" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                    <i data-feather="activity" class="w-4 h-4 text-gray-700 mr-2"></i> English
                                </a>
                                <a href="" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                    <i data-feather="box" class="w-4 h-4 text-gray-700 mr-2"></i> 
                                    Indonesia 
                                    <div class="text-xs text-white px-1 rounded-full bg-theme-6 ml-auto">10</div>
                                </a>
                                <a href="" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                    <i data-feather="layout" class="w-4 h-4 text-gray-700 mr-2"></i> English
                                </a>
                                <a href="" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                    <i data-feather="sidebar" class="w-4 h-4 text-gray-700 mr-2"></i> Indonesia
                                </a>
                            </div>
                            <div class="px-3 py-3 border-t border-gray-200 font-medium flex">
                                <button type="button" class="button button--sm bg-theme-1 text-white">Settings</button>
                                <button type="button" class="button button--sm bg-gray-200 text-gray-600 ml-auto">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5 border-t border-gray-200">
                <a class="flex items-center text-theme-1 font-medium" href="">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings
                </a>
            </div>
            <div class="p-5 border-t border-gray-200">
                <a class="flex items-center" href="">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> Email Settings
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks
                </a>
                <a class="flex items-center mt-5" href="">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> Tax Information
                </a>
            </div>
            <div class="p-5 border-t flex">
                <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                <button type="button" class="button button--sm border text-gray-700 ml-auto">New Quick Link</button>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Thông tin hiển thị</h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-4">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Midone Laravel Admin Dashboard Starter Kit" src="{{ ($user['avatar']) ? asset('uploads/'.$user['avatar']) : asset('dist/images/profile-1.jpg') }}">
                                <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                                    <i data-feather="x" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Đổi ảnh dại diện</button>
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-8">
                        <div>
                            <label>Tên</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ $user['name'] }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ $user['phone'] }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label>Số điện thoại</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ $user['phone'] }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label>Địa chỉ</label>
                            <textarea class="input w-full border mt-2" placeholder="Adress">10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Thay đổi thông tin</h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <label>Email</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ $user['email'] }}" disabled>
                        </div>
                        <div class="mt-3">
                            <label>Tên</label>
                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="{{ $user['name'] }}" disabled>
                        </div>
                        {{-- <div class="mt-3">
                            <label>Quyền</label>
                            <select class="input w-full border mt-2">
                                <option>IC</option>
                                <option>FIN</option>
                                <option>Passport</option>
                            </select>
                        </div> --}}
                        {{-- <div class="mt-3">
                            <label>ID Number</label>
                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="357821204950001">
                        </div> --}}
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <label>Số điện thoại</label>
                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="{{ $user['phone'] }}">
                        </div>
                        <div class="mt-3">
                            <label>Địa chỉ</label>
                            <input type="text" class="input w-full border mt-2" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="" class="text-theme-6 flex items-center mr-auto">
                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Xóa tài khoản
                    </a>
                    <button class="bg-blue-600 px-8 py-3 rounded border shadow text-white hover:opacity-50">Cập nhật</button>
                </div>
            </div>
        </div>
        <!-- END: Personal Information -->
    </div>
</div>

@endsection