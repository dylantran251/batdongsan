@push('modals')
    {{-- <div class="text-center">
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-preview" class="btn btn-primary">Show Modal</a>
    </div>  --}}
    <div id="delete-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="delete-form" data-url="" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"><i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-xl mt-5">Bạn chắc chắn với hành động này?</div>
                            <div class="text-slate-500 mt-2">Bạn có thực sự muốn xóa những bản ghi này? <br>Hành động này là không thể hoàn tác.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                            <button type="submit" class="btn-delete-modal btn btn-danger w-24 text-white bg-red-500">Xóa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
