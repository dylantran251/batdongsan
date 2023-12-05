@extends('auth.layout')

@section('title')
    <title>{{ env('APP_ENV') }} | Login</title>
@endsection
@section('auth')
<body>
    <section class="bg-gray-50 dark:bg-gray-900 h-screen">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-full">
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
                        Đăng nhập
                    </h1>                
                    <form class="space-y-4 md:space-y-6" action="{{ route('login.authenticate') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email của bạn</label>
                            <input type="email" name="email" value="admin@gmail.com" id="email" class="bg-gray-50 p-3 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                            <input type="password" name="password" value="password" id="password" placeholder="••••••••" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" value="password" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-base">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Ghi nhớ đăng nhập</label>
                                </div>
                            </div>
                            <a href="#" class="text-base font-medium  text-blue-600 hover:underline dark:text-blue-500">Quên mật khẩu</a>
                        </div>
                        <button type="submit" class="w-full text-black border p-3 hover:bg-blue-200 font-bold rounded-lg text-base text-center">
                            Đăng nhập
                        </button>
                        <p class="text-base font-light text-black dark:text-gray-400">
                            Bạn chưa có tài khoản?<a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500"> Đăng ký</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            async function login() {
                // Reset state
                $('#login-form').find('.input').removeClass('border-theme-6')
                $('#login-form').find('.input__error').html('')

                // Post form
                let email = $('#input-email').val()
                let password = $('#input-password').val()
                let rememberMe = $('#input-remember-me').val()

                // Loading state
                $('#btn-login').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.post(`login`, {
                    email: email,
                    password: password,
                    remember_me: rememberMe
                }).then(res => {
                    location.reload()
                }).catch(err => {
                    $('#btn-login').html('Login')
                    for (const [key, val] of Object.entries(err.response.data.errors)) {
                        $(`#input-${key}`).addClass('border-theme-6')
                        $(`#error-${key}`).html(val)
                    }
                })
            }

            $('#login-form').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    login()
                }
            })

            $('#btn-login').on('click', function() {
                login()
            })
        })
    </script>
</body>

@endsection
