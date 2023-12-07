@extends('frontend.layout.main')
@section('title')
{{ $title }}
@endsection
@section('subcontent')
    <div class="mt-5 mx-5 xl:container xl:mx-auto xl:px-20">
        <div class="grid grid-cols-1 ">
            <div class="flex flex-col mb-6">
                <h1 class="text-black  mb-10 mt-2" style="font-size: 25px;">
                    <a href="">{{ $title }}</a>
                </h1>
                <div class="flex items-center justify-between">
                    <p>Bạn đã đăng {{ (isset($countPost)) ? $countPost : 0 }} bất động sản</p>
                    <select class="px-4 py-2 border rounded" name="" id="" class="">
                        <option value="1">Thông thường</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                @include('frontend.pages.home.components.card_post')
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush