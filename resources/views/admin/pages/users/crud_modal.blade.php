<div id="crud-user-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Thêm người dùng</h2>
                </div> 
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" id="name" name="name" class="form-control"  placeholder="Nguyen A">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control"  placeholder="example@gmail.com">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" class="form-control"  placeholder="0123456789">
                    </div>
                    <div class="col-span-12 sm:col-span-6 select-container">
                        <label for="role_id" class="form-label">Quyền</label>
                        <select id="role_id" name="role_id" class="form-select">
                            <option value="1">Khách hàng</option>
                            <option value="99">Quản trị viên</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6 password-container">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control"  placeholder="1234@">
                    </div>
                    <div class="col-span-12 sm:col-span-6 password_confirmation-container">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  placeholder="1234@">
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" data-url-store="{{ route('admin.users.store') }}"  class="cancel-submit btn btn-outline-secondary w-20 mr-1">Hủy</button>
                    <button type="submit" data-tw-dismiss="modal" data-url-store="{{ route('admin.users.store') }}" class="submit-form btn btn-primary w-20 text-red-500">Tạo</button>
                </div> 
            </form>
        </div>
    </div>
</div>
