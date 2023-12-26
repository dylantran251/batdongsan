@extends('admin/layout/main')

@section('subhead')
    <title>{{ env('APP_NAME') }} | {{ $title }}</title>
@endsection

@section('subcontent')
    <div id="category-management-page">
        <div class="flex flex-col sm:flex-row items-center " data-page="admin-caetgory">
            <h2 style="font-size: 25px;" class="font-bold mr-auto text-upcase">{{ $title }}</h2>
        </div>
        <div class="relative grid grid-cols-12 gap-8">
            <div class="col-span-5 datatable-wrapper h-[70vh] p-5 mt-5 sticky left-0 top-[15%]">
                <h1 class="font-bold text-base border-b-2 ">Thêm danh mục</h1>
                <form id="category-form" data-url="{{ route('admin.categories.store') }}" data-method="POST">
                    @csrf
                    <div class="mt-8">
                        <label for="name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tên danh mục</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên danh mục VD: Nhà đất liền kề">
                    </div>
                    <div class="mt-8">
                        <label for="type" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Loại danh mục</label>
                        <select id="type" name="type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1">Danh mục tin đăng</option>
                            <option value="0">Danh mục tin tức</option>
                        </select>
                        <span class="text-sm text-gray-900 px-2">Để trống nếu không có danh mục cha</span>
                    </div>
                    <div class="mt-8">
                        <label for="parent" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Danh mục cha</label>
                        <select id="parent" name="parent" data-url = "{{ route('admin.categories.get-items') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="0">Danh mục cha</option>
                        </select>
                        <span class="text-sm text-gray-900 px-2">Để trống nếu không có danh mục cha</span>
                    </div>
                    <div class="action-contianer mt-8 flex items-center justify-end">
                        <button type="button" data-store-url = {{ route('admin.categories.store') }}
                         class="submit-form text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tạo mới</button>
                    </div>
                </form>
            </div>

            <div class="col-span-7 datatable-wrapper box p-5 mt-5" data-page="admin-category">
                <div id="category-data-table" class="text-base text-black" data-ajax="{{ route('admin.categories.get-items') }}"></div>
                @include('admin.layout.components.crud_delete_modal')
            </div>
        </div>
    </div>
@endsection