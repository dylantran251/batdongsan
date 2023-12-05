
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
        <div class="mx-5 xl:container xl:mx-auto xl:px-20">
            {{-- Breadcrumb --}}
            <div class="" style="font-size: 14px; color: #D7D7D7;">
                <p>Bán/
                    <span class="text-black"> {{ (isset($strCategory)) ? $strCategory : 'Tất cả BĐS trên toàn quốc' }}</span>
                </p>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-12 mb-20 gap-8">
                <div class="xl:col-span-9">
                    {{-- Info category --}}
                    <h1 class="text-black  mb-10 mt-2" style="font-size: 25px;">
                        <a href="#" style="font-weight:bold;">{{$title}}</a>
                    </h1>
                    {{-- List Post Card--}}
                    @if($postsCount === 0)
                        <div class="w-full text-xl flex justify-center text-red-500">Không có kết quả nào phù hợp!</div>
                    @else
                        <div id="filterResult" class="flex flex-col gap-4">
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
