@extends('admin/layout/main')
@section('subhead')
    <title>{{ $title }}</title>
@endsection
@section('subcontent')
<div id="create-news-page">
    <form id="news-form"  role="admin" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" method='{{ isset($news) ? 'PUT' : 'POST'}}' enctype="multipart/form-data">
        <div class="bg-white p-16 rounded-lg">
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-9">
                    <h1 class="block text-black text-[18px] font-medium mb-4">Thông tin tin tức</h1>
                    <div class="mb-4">
                        <label for="title" class="block font-medium mb-2 text-base font-medium text-gray-900 dark:text-white">Tiêu đề</label>
                        <input type="text" id="title" name="title" value="{{ isset($news) ? $news->title : '' }}" placeholder="Nhập tiêu đề VD: Cần bán gấp căn hộ chính chủ tại Nma Từ Liên" 
                        class="block bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span class="text-gray-600 text-sm p-2" id="title-error">Tối thiểu 30 , tối đa 100 kí tự</span>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block font-medium mb-2 text-base font-medium text-gray-900 dark:text-white">Mô tả</label>
                        <textarea type="text" id="description" name="description" placeholder="Nhập mô tả VD: Nhà đất Hà Nội đang có những biến động..."  rows="5"
                        class="block bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >{{ isset($news) ? $news->description : '' }}</textarea>
                        <span class="text-gray-600 text-sm p-2" id="description-error">Tối thiểu 30 , tối đa 3000 kí tự</span>
                    </div>
                </div>
                <div class="col-span-3">
                    <h1 class="block text-black text-[18px] font-medium mb-4">Thông tin khác</h1>
                    <div>
                        <div class="mb-4">
                            <label for="categories" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Danh mục</label>
                                <select id="categories" name="categories" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">\
                                    <option selected value="0">Danh mục</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ (isset($news) && $news->category_id === $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tags" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tags</label>
                                <select id="tags" name="tags" data-url="{{ route('admin.tags.getItems') }}" multiple
                                class="tom-select-ajax bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">\
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="source" class="block font-medium mb-2 text-base font-medium text-gray-900 dark:text-white">Nguồn</label>
                            <input type="text" id="source" name="source" value="{{ isset($news) ? $news->source : '' }}" placeholder="Nhập nguồn VD: https://froala.com/wysiwyg-editor/examples/drag-inline/" 
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                    <div class="upload-container mb-4" >
                        <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white" for="file_input">Hình ảnh</label>
                        <input id="file" name="file" data-url="{{ route('file.upload') }}" class="block w-full text-base text-gray-900 p-2 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" placeholder="Upload ảnh đại diện">           
                        @if (isset($news->avatar))
                            <input type="hidden" name="avatar" value="{{ $news->avatar }}">
                        @endif             
                    </div>
                </div>
            </div>
            <div class="col-span-12 mb-4">
                {{-- WYSIWYG --}}
                <label for="content" class="WYSIWYG block font-medium mb-2 text-base font-medium text-gray-900 dark:text-white">Nội dung</label>
                <textarea id="content" name="content" rows="20"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                placeholder="Nhận nội dung mô tả VD: nhà chính chủ gần trường học, chợ..." >{{ isset($news) ? $news->content : '' }}</textarea>
            </div>
            <div id="action-container" class="flex px-10 py-2 border shadow-lg rounded-lg bg-white w-full sticky bottom-0 right-0 left-0 z-[97]">
                <div class="flex w-full flex-col items-start justify-center">
                    <div class="flex items-center gap-2">
                        <label for="author_name" class="block font-bold text-base leading-6 text-black whitespace-nowrap">Tác giả:</label>
                        <input type="text" name="author_name" id="author_name"  class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400" value="{{ isset($news) ? $news->author->name : Auth::user()->name }}" disabled >
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="author_email" class="block font-bold text-base leading-6 text-black whitespace-nowrap">Email:</label>
                        <input type="text" name="author_email" id="author_email" value="{{ isset($news) ? $news->author->email : Auth::user()->email }}" class="block bg-white w-full border-0 py-2 px-3 text-blue-600 ring-gray-300 placeholder:text-gray-400 " disabled>
                    </div>
                </div>
                <div class="w-full flex justify-end items-center gap-4">
                    <button type="button" class="px-5 py-2.5 text-base font-bold text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 ">
                        Xem trước
                    </button>
                    <button type="button"  
                    class="submit-form focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base px-5 py-2.5">
                        {{ isset($news) ? 'Cập nhật' : 'Đăng tin' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection