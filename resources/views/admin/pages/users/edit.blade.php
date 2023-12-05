@push('modals')
    <div id="edit-user-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <form action="" id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Cập nhật người dùng</h2>
                    </div> 
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Tên</label>
                            <input id="name" type="text" name="full-name" class="form-control" required placeholder="Nguyen A">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Email</label>
                            <input id="email" type="email" name="email" class="form-control" required placeholder="example@gmail.com">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Số điện thoại</label>
                            <input id="phone-number" type="tel" name="phone-number" class="form-control" required placeholder="0123456789">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Quyền</label>
                            <select name="role-id" class="form-select">
                                <option value="1">Khách hàng</option>
                                <option value="99">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="col-span-12 ">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required placeholder="1234@">
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </div> 
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                        <button type="submit" class="btn btn-primary w-20">Tạo</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endpush

