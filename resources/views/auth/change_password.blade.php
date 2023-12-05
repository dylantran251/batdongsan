@extends('auth.layout')

@section('title')
<title>Đổi mật khẩu</title>
@endsection
@section('auth')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-full mr-2" src="{{ asset('images/web/logo.png') }}" alt="logo">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Đổi mật khẩu
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('change-password.store') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="old-password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                            <input type="password" name="old-password" id="old-password" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
                        <div>
                            <label for="new-password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Mật khẩu mới</label>
                            <input type="password" name="new-password" id="new-password" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Xác nhận mật khẩu mới</label>
                            <input type="password" name="new-password_confirmation" id="confirm-password" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex justify-between items-center gap-4">
                            <button type="button" class="w-full text-black border p-3 focus:text-white hover:bg-blue-700 font-bold rounded-lg text-base text-center">Hủy</button>
                            <button type="submit" class="w-full text-black border p-3 focus:text-black bg-red-500 text-white hover:bg-opacity-80 font-bold rounded-lg text-base text-center">Thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection