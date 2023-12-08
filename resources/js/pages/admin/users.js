import {TabulatorFull as Tabulator} from 'tabulator-tables';
// import 'tabulator-tables/dist/css/tabulator.css'
import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $ from 'jquery'
import {buildDeleteModal} from "../../components/crud_delete.js";


function dataTable(){
    let table = new Tabulator("#users-data-table", {
        layout: "fitColumns",
        resizableColumnFit: true,
        ajaxURL: $('#users-data-table').attr('data-ajax'), //ajax URL
        ajaxConfig: "GET", //ajax HTTP request type
        ajaxContentType: "json",
        placeholder: "Chưa có người dùng nào",
        pagination: true,
        paginationMode: "remote",
        dataSendParams: {
            "page": "page", //change page request parameter to "pageNo"
        },
        columns: [
            { 
                title: "Người dùng", 
                field: "name", 
                headerHozAlign: "center",
                hozAlign: 'center',
                formatter: function (cell, formatterParams, onRendered) {
                    // Access the data for the current row
                    var rowData = cell.getRow().getData();
                
                    // Create HTML content with combined name and image
                    var htmlContent = '<div style="display: flex; align-items: center;">';

                    htmlContent += `<img src="${rowData.photo_url}"  alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; object-fit: cover;">`;
                    
                    htmlContent += '<span>' + rowData.name + '</span>';
                    htmlContent += '</div>';
                
                    return htmlContent;
                }
            },
            { title: "Email", field: "email", headerHozAlign: "center", hozAlign: 'center' },
            { title: "Số điện thoại", field: "phone", formatter: "html", headerHozAlign: "center", hozAlign: 'center'  },
            { title: "Quyền", field: "role", headerHozAlign: "center", hozAlign: 'center'},
            { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center" },
        ],
        ajaxResponse: function (url, params, response) {
            return response.data; //return the response data to tabulator
        },
    });
    

    
    table.on('dataProcessed', function () {
        // buildEditFnc()
        getItem()
        // buildDeleteModal(function (response) {
        //     fireToast('success', "Success", response.data.message).then(r => {})
        //     table.replaceData()
        // })
        $('.delete-user').on('click', function(e){
            e.preventDefault();
            $('#delete-modal').addClass('modal-delete-user');
            $('.modal-delete-user #delete-form').attr('data-url', $(this).attr('data-url'));
            destroy(table)
        })
    })
    store(table)
   
}

function destroy(table){
    $('.modal-delete-user .btn-delete-modal').on('click', function(e){
        e.preventDefault()
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: $('#delete-form').attr('data-url'),
            method: 'DELETE',
            data: {
                _token: csrf_token
            },
            success: function(response){
                fireToast('success', 'Đã xóa',  response.message)
                table.replaceData();
            },
            error: function(message){
                console.log(message.error)
            }
        })
    })
}

function store(table){
    $('#crud-user-modal form').on('submit', async function (e) {
        e.preventDefault();
        let form = $(this);
        let validator = validateForm();
        let isFormValid = validator.form();

        if(isFormValid === true){
            await axiosInstance({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize()
            })
                .then(function (response) {
                    fireToast('success', "Thành công", response.data.message)
                    table.replaceData()
                    form.attr('action', $('#crud-user-modal .submit-form').attr('data-url-store'));
                    form.find('input:not([type="hidden"])').each(function () {
                        $(this).val("");
                    })
                })
                .catch(function(message){
                    console.error(message.error)
                })
        }else{
            validator.showErrors();
        }
    })
}

function getItem(){
    $('#users-data-table .edit').on('click', function(e){
        e.preventDefault();
        let button = $(this);
        $.ajax({
            url: $(this).attr('data-get-item'),
            method: "GET",
            success: function(response){
                let item = response.data;
                $('.modal-header h2').text('Thay đổi người dùng')
                let modalContainer = $("#crud-user-modal form");
                modalContainer.find('input[name="name"]').val(item.name)
                modalContainer.find('input[name="email"]').val(item.email)
                modalContainer.find('input[name="email"]').attr('readonly', true);
                modalContainer.find('input[name="phone"]').val(item.phone)
                modalContainer.find('select[name="role_id"]').val(item.role_id);
                modalContainer.find('.password-container').remove();
                modalContainer.find('.password_confirmation-container').remove();
                modalContainer.attr('action', button.attr('data-update-url'))
                modalContainer.attr('method', "PUT")
            },
            error: function(message){
                console.log(message.error);
            }
        })
    })
}

function create(){
    $('#users-management-page .create').on('click', function(e){
        e.preventDefault();
        if($('.password-container').length === 0){
            $('.modal-body').append(`<div class="col-span-12 sm:col-span-6 password-container">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" id="password" name="password" class="form-control"  placeholder="1234@">
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 password_confirmation-container">
                                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  placeholder="1234@">
                                    </div>`)
        }
    })
}

function validateForm(){
    const message_required = 'Vui lòng nhập thông tin này'
    if($("#crud-user-modal form").attr('method') === 'PUT'){
        return $("#crud-user-modal form").validate({
            rules: {
              name: "required",
              phone: "required",
              email: { required: true, email: true, },
              role_id: "required",
            },
            messages: {
                name: {required: message_required,},
                phone: {required: message_required,},
                email: {email: 'Email không đúng định dạng',required: message_required,},
                role_id: {required: message_required },
            },
            errorPlacement: function(error, element) {
                error.addClass('px-2 text-sm text-red-500');
                error.insertAfter(element);
            },
            success: function(label) {
                label.removeClass('error').addClass('success');
            },
        });
    }
    return $("#crud-user-modal form").validate({
        rules: {
          name: "required",
          phone: "required",
          email: { required: true, email: true, },
          role_id: "required",
          password: {required: true, minlength: 6 },
          password_confirmation: { required: true, equalTo: "#password"}
        },
        messages: {
            name: {required: message_required,},
            phone: {required: message_required,},
            email: {email: 'Email không đúng định dạng',required: message_required,},
            role_id: {required: message_required },
            password:{ required: message_required, minlength: 'Tối thiêu 6 kí tự'},
            password_confirmation: {required: message_required, equalTo: 'Mật khẩu không trùng khớp'},
        },
        errorPlacement: function(error, element) {
            error.addClass('px-2 text-sm text-red-500');
            error.insertAfter(element);
        },
        success: function(label) {
            label.removeClass('error').addClass('success');
        },
    });
}

$(document).ready(function () {
    
    if($('#users-management-page').length){
        create()
        dataTable()
    }
    

    // $('#edit-user-modal form').on('submit', async function (e) {
    //     e.preventDefault();
    //     await axiosInstance.post($(this).attr('action'), $(this).serialize())
    //         .then(function (response) {
    //             fireToast('success', "Success", response.data.message)
    //             table.replaceData()
    //         })
    // })
})

// $(document).ready(function () {

// });

