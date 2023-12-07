@extends('frontend.layout.main')
@section('subcontent')
<div class="mt-5 mx-5 lg:container lg:mx-auto lg:px-20">
    <div class="text-[#D7D7D7] text-[14px]">
        <p>Trang chủ/<span class="text-black">{{ $title }}</span> </p>
    </div>
    <h1 class="text-black  mb-10 mt-2 text-[25px]" >
        <a href="">{{ $title }}</a>
    </h1>
    <div>
        Đây là trang tin tức
    </div>
</div>
@endsection