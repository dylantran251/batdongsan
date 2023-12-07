<div class="flex flex-col items-center gap-3 border rounded py-10 px-8">
    <div class="flex justify-center items-center h-16 w-16">
        <img src="{{ asset('dist/images/profile-1.jpg') }}" class="rounded-full h-full w-full object-cover" alt="">
    </div>
    <p style="font-size: 13px; color: #9f9f9f;">Được đăng bởi</p>
    <h1 class="text-base ">
        <a href="" class="text-[#2c2c2c] font-bold">{{ $post->user->name }}</a>
    </h1>
    <p>
        <a href="{{ route('posts.posts-by-user', $post->user->id) }}" class="text-[#2c2c2c] text-[14px]">
            Xem thêm {{ isset($countPostByUser) ? $countPostByUser : 1 }} tin khác
        </a>
    </p>
    <button type="button" class="show-phone-number flex items-center whitespace-nowrap justify-center gap-3 bg-[#00C1C1] p-4 w-full text-white text-base text-bold rounded-lg font-bold hover:bg-opacity-60"
    data-url = "{{ route('show-phone-number') }}" data-post-id = "{{ $post->id }}">
    {{-- <span class="hidden">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.4999 6.5C15.2371 6.64382 15.9689 6.96892 16.4999 7.5C17.031 8.03108 17.3561 8.76284 17.4999 9.5M14.9999 3C16.5315 3.17014 17.9096 3.91107 18.9999 5C20.0902 6.08893 20.8279 7.46869 20.9999 9M20.9994 16.4767V19.1864C21.0036 20.2223 20.0722 21.0873 19.0264 20.9929C10 21 3 13.935 3.00706 4.96919C2.91287 3.92895 3.77358 3.00106 4.80811 3.00009H7.52325C7.96247 2.99577 8.38828 3.151 8.72131 3.43684C9.66813 4.24949 10.2771 7.00777 10.0428 8.10428C9.85987 8.96036 8.9969 9.55929 8.41019 10.1448C9.69858 12.4062 11.5746 14.2785 13.8405 15.5644C14.4272 14.9788 15.0273 14.1176 15.8851 13.935C16.9855 13.7008 19.7615 14.3106 20.5709 15.264C20.8579 15.6021 21.0104 16.0337 20.9994 16.4767Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span> --}}

    <span class="masked-phone-number-{{ $post->id }}">{{ $post->user->getHideLast3DigitsPhoneNumberAttribute() }}</span> 
        Hiện số
    </button>  
    <a href="" class="w-full p-4 border text-center shadow rounded-lg text-[#686868]">Yêu cầu liên hệ lại </a>
</div>