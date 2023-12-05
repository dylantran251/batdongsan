@extends('admin/layout/main')

@section('subhead')
    <title>Dashboard - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
<form action="{{ route('admin.posts.update', [$post['id'], 'type' => 1]) }}" method="POST" enctype="multipart/form-data">
    <div class="w-full flex justify-between items-center mt-5" >
        <h1 class="text-lg font-bold mr-auto text-upcase">Cập nhật bài đăng </h1>
        <button type="sublit" class="button bg-blue-600 px-4 py-2 rounded shadow text-white">Cập nhật</button>
    </div>
    @csrf
    @method('PUT')
    <div class="grid grid-cols-5 gap-4 bg-white rounded-xl shadow p-4 mt-5">
        <div class="col-span-4">
            <div class="my-4">
                <label class="form-label">Tiêu đề</label>
                <input type="text" id="title" value="{{ $post['title'] }}" class="form-control" name="title" required placeholder="Tiêu đề">
            </div>
            <div class="h-full">
                <label class="form-label">Nội dung</label>
                <textarea name="content" id="editor">{{ $post['description'] }}</textarea>
            </div>            
        </div>
        <div class="col-span-1">
            <div class="mt-4">
                <label for="categories" class="form-label" class="form-label">Danh mục</label>
                {{-- <select name="category" id="categories" data-url="{{ route('admin.categories.getItems') }}" class="tom-select-ajax w-full" multiple>
                </select> --}}
                {{-- <select name="categories[]" id="categories" multiple autocomplete="off"> </select> --}}
                
                @php
                    $categories = App\Models\Category::all();
                @endphp
                <select id="select-categories" name="categories[]" multiple data-placeholder="Danh mục bài đăng" class="form-control">
                    @if (!empty($categories))
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}"></option>
                        @endforeach
                    @endif  
                    @if (!empty($categories))
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" 
                                    @if ($post->categories->contains('name', $category->name))
                                        selected
                                    @endif
                            ></option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-span-1">
                <div class="mt-4">
                    <label for="categories" class="form-label" class="form-label">Từ khóa</label>
                    {{-- <select name="category" id="categories" data-url="{{ route('admin.categories.getItems') }}" class="tom-select-ajax w-full" multiple>
                    </select> --}}
                    {{-- <select name="categories[]" id="categories" multiple autocomplete="off"> </select> --}}
                    
                    @php
                        $tags = App\Models\Tag::all();
                    @endphp
                    <select id="select-tags" name="tag[]" multiple data-placeholder="Từ khóa" class="form-control">
                        @if (!empty($tags))
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}" 
                                        @if ($post->tags->contains('name', $tag->name))
                                            selected
                                        @endif
                                ></option>
                            @endforeach
                        @endif
                    </select>
                </div>
            {{-- <div class="mt-4">
                <label class="form-label">Từ khóa</label>
                <select name="tag" data-url="{{ route('admin.tags.getItems') }}" class="tom-select-ajax w-full" multiple></select>--}}
            </div> 
            <div class="mt-4">
                <label class="form-label">Hình ảnh</label>
                <div class="p-2">
                    <form class="dropzone-custom" method="POST" action="/file-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="fallback">
                            {{-- @foreach ($post->getImages() as $image) --}}
                                <input name="file[]" type="file" value="" multiple/>
                            {{-- @endforeach --}}
                        </div>
                        <div class="dz-message" data-dz-message>
                            <div class="text-lg font-medium">Kéo thả ảnh</div>
                            <div class="text-slate-500">Ảnh đầu tiên sẽ được dùng làm banner</div>
                        </div>
                    </form>
                </div>
                <input type="hidden" name="images">
            </div>
            <div class="mt-4">
                <label class="form-label">Giá</label>
                <input type="number" id="price" value="{{ $post['price'] }}" class="form-control" min=0 name="price" required placeholder="">
            </div>
            <div class="mt-4">
                <label class="form-label">Diện tích</label>
                <input type="number" id="area" value="{{ $post['area'] }}" class="form-control" min=0 name="area" required placeholder="">
            </div>
            <div class="mt-4">
                <label class="form-label">Số tầng</label>
                <input type="number" id="floor" value="{{ $post['floor'] }}" class="form-control" min=0 name="floor" required placeholder="">
            </div>
            <div class="mt-4">
                <label class="form-label">Số phòng ngủ</label>
                <input type="number" id="bedroom" value="{{ $post['bedroom'] }}" class="form-control" min=0 name="bedroom" required placeholder="">
            </div>
            <div class="mt-4">
                <label class="form-label">Phòng vệ sinh</label>
                <input type="number" id="toilet" value="{{ $post['toilet'] }}" class="form-control" min=0 name="toilet" required placeholder="">
            </div>
            <div class="mt-4">
                <label class="form-label">Link google map</label>
                <textarea class="form-control" id="location" name="location" required placeholder="">{{ $post['location'] }}</textarea>
            </div>
            <div class="other-attributes mt-4">
                <div class="flex w-full mb-2">
                    <div class="w-1/2">
                        <label class="form-label">Thuộc tính khác</label>
                    </div>
                    <div class="w-1/2 text-right">
                        <button type="button" class="btn btn-primary" id="add-properties">Thêm</button>
                    </div>
                </div>
                <div class="w-full other-attribute-container ">
   
                <div class="attribute-clone-root other-attributes flex gap-2 mb-2">
                    {{-- @if (!empty($post->getOtherProperties())) --}}
                        <div style="width: 30%">
                            <input type="text" class="form-control" name="name[]" placeholder="name">
                        </div>
                        <div style="width: 65%">
                            <input type="text" class="form-control" min=0 name="value[]" placeholder="value">
                        </div>
                        <div class="flex justify-center" style="width: 5%;align-items:center" title="xóa">
                            <a href="javascript:;" class="remove-attribute">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </a>
                        </div>    
                    {{-- @else
                        <div style="width: 30%">
                            <input type="text" class="form-control" name="name[]" placeholder="name">
                        </div>
                        <div style="width: 65%">
                            <input type="text" class="form-control" min=0 name="value[]" placeholder="value">
                        </div>
                        <div class="flex justify-center" style="width: 5%;align-items:center" title="xóa">
                            <a href="javascript:;" class="remove-attribute">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </a>
                        </div>                       
                    @endif --}}

                </div>
            </div>
        </div>
    </div>
    
</form>
@endsection
@push('scripts')
    <script>
// TOM SELECT
        new TomSelect("#select-categories",{
            plugins: ['remove_button'],
            create: true,
            onItemAdd:function(){
                this.setTextboxValue('');
                this.refreshOptions();
            },
            render:{
                option:function(data,escape){
                    return '<div class="d-flex"><span>' + escape(data.value) + '</span></div>';
                },
                item:function(data,escape){
                    return '<div>' + escape(data.value) + '</div>';
                }
            }
        });


// CKEDITOR
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
            })
            .catch(error => {
                console.error(error);
            });
        window.onload = function(){
            $('#add-properties').on('click', function(){
                let cloner = $('.attribute-clone-root').clone();
                cloner.removeClass('attribute-clone-root hidden');
                cloner.hide().fadeIn()
                let container = $('.other-attribute-container');
                container.append(cloner)
                cloner.find('a.remove-attribute').on('click', function (){
                    $(this).closest('.other-attributes').remove()
                })
            })
            $('.other-attributes a.remove-attribute').on('click', function (){
                $(this).closest('.other-attributes').remove()
            })
        }
    </script>
@endpush
