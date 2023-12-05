@extends('frontend.layout.main')
@section('title')
{{ $title }}
@endsection
@push('styles')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endpush
@section('subcontent')
    <div id="create-post-page" class="w-full bg-gray-50 ">
        <div class="pt-6 mx-5 xl:container xl:mx-auto xl:px-20 mb-16">
            <div class="text-[#D7D7D7] text-[14px]">
                <p>Trang chủ/<span class="text-black">{{ $title }}</span> </p>
            </div>
            <form id="post-form" role="user" data-ajax = "{{ route('posts.store') }}" data-method = {{ (isset($post)) ? 'PUT' : 'POST' }} enctype="multipart/form-data">
                <div class="py-5 relative">
                    @include('frontend.pages.posts.crud.components.basic_info')

                    @include('frontend.pages.posts.crud.components.posts_info')

                    @include('frontend.pages.posts.crud.components.real_estate_info')

                    @include('frontend.pages.posts.crud.components.tag_seo')

                    @include('frontend.pages.posts.crud.components.images')

                    @include('frontend.pages.posts.crud.components.contact_info')

                    @include('frontend.pages.posts.crud.components.action')
                </div>
            </form>
            {{-- Modal --}}
            @include('frontend.pages.posts.crud.components.modal_add_attribute')
        </div>
    </div>
@endsection