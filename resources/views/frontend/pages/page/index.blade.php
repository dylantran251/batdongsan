
@extends('frontend.layout.main')
@section('title')
    {{ $title }}
@endsection
@section('subcontent')
<div id="page" class="relative">
    <form id="form-search" class="form-search" action="{{ route('search', ['category_name' => $category->name]) }}"  method="GET" role="user-searchbar">
        {{-- Check  request if exists request create input  --}}
        @include('frontend.search_attributes.components.check_request')
        {{-- Include search bar --}}
        @include('frontend.layout.search_bar', ['style' => 1])
        {{-- Save search attribute  --}}
        <div class="max-w-[1200px] mx-auto mt-7">
            {{-- Breadcrumb --}}
            <div class="text-[14px] text-[#d7d7d7] mb-1">
                <p>Bán/
                    <span class="text-black"> {{ (isset($strCategory)) ? $strCategory : 'Tất cả BĐS trên toàn quốc' }}</span>
                </p>
            </div>
            <div class="grid grid-cols-1 xl:flex mb-20 gap-6">
                <div class="xl:col-span-9 max-w-[865px] flex flex-col items-start ">
                    {{-- Info category --}}
                    <h1 class="text-black mb-6 text-[25px] font-bold">
                        <a href="#">{{$title}}</a>
                    </h1>
                    {{-- List Post Card--}}
                    @if($postsCount === 0)
                        <div class="w-full text-xl flex justify-center text-red-500">Không có kết quả nào phù hợp!</div>
                    @else
                        <div id="filterResult" class="flex flex-col">
                            @include('frontend.pages.page.components.sort_by')
                            {{-- List posst --}}
                            @include('frontend.pages.page.components.list_posts')
                        </div>
                    @endif
                </div>
                @include('frontend.pages.page.components.filter_parameters')
            </div>
        </div>
    </form>
</div>

    @push('scripts')
        <script>
            function submitOrderByPosts() {
                $('#orderByPosts').on('change', function(event) {
                    $('#orderBy').val($(this).val());
                    $('form').submit(); 
                });
            }
            $(document).ready(function () {
                submitOrderByPosts()
            });
        </script>
    @endpush
@endsection
