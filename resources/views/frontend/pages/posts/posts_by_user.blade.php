@extends('frontend.layout.main')
@section('title')
{{ $title }}
@endsection
@section('subcontent')
@section('subcontent')
    <div class="mt-5 mx-5 xl:container xl:mx-auto xl:px-20">
        <div class="w-full rounded shadow-lg border p-10">
            <div class="flex justify-between items-center border p-5 mb-10">
                <div class="flex items-center gap-5">
                    <div class="w-36 h-36 rounded-full shadow">
                        <img src="{{ isset($user['avatar']) ? asset('uploads'.$user['avatar']) : asset('dist/images/preview-1.jpg') }}" class="object-fit rounded-full" alt="Avatar">
                    </div>
                    <p class="text-xl ">{{ $user['name'] }}</p>
                </div>
                <button data-url = "{{ route('show-phone-number') }}" data-post-id = "{{ $post->id }}"
                class=" flex items-center justify-center gap-3 p-2 w-full sm:w-auto text-white text-base text-bold rounded bg-[#00C1C1] hover:bg-gray-500">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4999 6.5C15.2371 6.64382 15.9689 6.96892 16.4999 7.5C17.031 8.03108 17.3561 8.76284 17.4999 9.5M14.9999 3C16.5315 3.17014 17.9096 3.91107 18.9999 5C20.0902 6.08893 20.8279 7.46869 20.9999 9M20.9994 16.4767V19.1864C21.0036 20.2223 20.0722 21.0873 19.0264 20.9929C10 21 3 13.935 3.00706 4.96919C2.91287 3.92895 3.77358 3.00106 4.80811 3.00009H7.52325C7.96247 2.99577 8.38828 3.151 8.72131 3.43684C9.66813 4.24949 10.2771 7.00777 10.0428 8.10428C9.85987 8.96036 8.9969 9.55929 8.41019 10.1448C9.69858 12.4062 11.5746 14.2785 13.8405 15.5644C14.4272 14.9788 15.0273 14.1176 15.8851 13.935C16.9855 13.7008 19.7615 14.3106 20.5709 15.264C20.8579 15.6021 21.0104 16.0337 20.9994 16.4767Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="masked-phone-number">{{ $user->getHideLast3DigitsPhoneNumberAttribute() }}</span> 
                    Hiện số
                </button>   
            </div>
            <div>
                <h1 class="text-black text-lg  mb-5">
                    Bài đăng của {{ $user['name'] }}
                </h1>
                {{-- <div class="grid grid-cols-4 items-center justify-center gap-8"> --}}
                    @include('frontend.pages.home.components.card_post')
                {{-- </div>                 --}}
            </div>
        </div>
        <div class="my-4 flex justify-center gap-5">
            {{ $posts->links() }}
        </div> 
    </div>
@endsection