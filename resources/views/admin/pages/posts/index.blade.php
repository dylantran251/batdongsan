@extends('admin/layout/main')

@section('subhead')
    <title>{{ env('APP_NAME') }} | {{ $title }}</title>
@endsection

@section('subcontent')
    <div id="admin-posts-page">
        <div class="intro-y flex flex-col sm:flex-row items-center " data-page="admin-post">
            <h2 style="font-size: 25px;" class="font-bold mr-auto text-upcase">{{ $title }}</h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{ route('admin.posts.create') }}"  class="btn btn-primary shadow-md mr-2">Tạo mới</a>
            </div>
        </div>
        <!-- BEGIN: Datatable -->
        <div class="intro-y datatable-wrapper box p-5 mt-5" data-page="admin-post">
            <div id="posts-data-table" class="text-base text-black" 
            data-ajax="{{ route('admin.posts.get-items') }}"></div>
            @include('admin.layout.components.crud_delete_modal')
        </div>
    </div>
@endsection