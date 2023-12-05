@extends('auth.layout')

@section('title')
<title>{{ $title }}</title>
@endsection

@section('auth')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-full mr-2" src="{{ asset('images/web/logo.png') }}" alt="logo">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded shadow-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-exclamation-triangle text-red-500"></i>
                            </div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ $title }}
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="full-name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tên hiển thị</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="name" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Trần Văn A">
                        </div>
                        <div>
                            <label for="phone-number" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0123456***">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email của bạn</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="email" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
                        <div>
                            <label for="password-confirmation" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" id="password-confirmation" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-base">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Tôi chấp nhận <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Điều khoản và chính sách</a></label>
                            </div>
                        </div>
                        <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Đăng ký</button>
                        <p class="text-base font-light text-gray-500 dark:text-gray-400">
                            Bạn đã có tài khoản? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng nhập</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection