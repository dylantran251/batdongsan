import {TabulatorFull as Tabulator} from 'tabulator-tables';

import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $, { ajax } from 'jquery'
import { validators } from 'validate.js';
// import validate from 'validate.js';
import validate from 'jquery-validation'

function dataTable(){
    let table = new Tabulator('#category-data-table' , {
        layout: "fitColumns",
        resizableColumnFit: true,
        ajaxURL: $('#category-data-table').attr('data-ajax'), //ajax URL
        ajaxConfig: "GET", //ajax HTTP request type
        ajaxContentType: "json",
        placeholder: "Chưa có danh mục nào",
        pagination: true,
        dataTree: true, 
        // dataTreeCollapseElement:"<i class='fa-solid fa-minus'></i> ",
        dataTreeChildIndent:25,
        dataTreeStartExpanded:true,
        paginationMode: "remote",
        dataTreeSelectPropagate:true,
        dataSendParams: {
            "page": "page", //change page request parameter to "pageNo"
        },
        columns: [
            { title: "Tên danh mục", field:"name"},
            { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center" },
        ],
        ajaxResponse: function (url, params, response) {
            return response;
        },      
          
    });
    table.on('dataProcessed', function () {
        getItems();
        getItem();
        $('.delete-category').on('click', function(e){
            e.preventDefault();
            $('#delete-modal').addClass('delete-category');
            $('.delete-category #delete-form').attr('data-url', $(this).attr('data-url'));
            destroy(table)
        })
    });
    handleForm(table);
}

function getItem(){
    $('.edit-category').on('click', function(e){
        e.preventDefault();
        let url_update = $(this).attr('data-update-url');
        $.ajax({
            url: $(this).attr('data-item-url'),
            method: 'GET',
            success: function(response){
                let data = response.data;
                $('input[name = "name"]').val(data.name);
                $(`select[name="parent"] option[value="${data.parent_id}"]`).prop('selected', true);
                $(`select[name="parent"] option[value="${data.id}"]`).prop('disabled', true);
                if($('#category-form .cancel-submit').length === 0){
                    $('.submit-form').before('<button type="button" class="cancel-submit text-gray-900 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-base px-5 py-2.5 me-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Hủy</button>')
                    onCancel()
                }
                $('.submit-form').text('Cập nhật')
                $('#category-form').attr('data-url', url_update);
                $('#category-form').attr('data-method', "PUT");
            },
            error: function(error){
                console.log(error.message);
            }
        })
    })
}

function onCancel(){
    $('#category-form .cancel-submit').on('click', function(e){
        e.preventDefault();
        resetValue();
    })
}

function formData(){
    let category = {};
    category['name'] = $('input[name="name"]').val();
    category['parent_id'] = $('select[name="parent"]').val();
    return category;
}


function validateForm() {
    const message_required = 'Vui lòng nhập thông tin này'
    return $('#category-form').validate({
        rules: {
            'name': { 
                required: true,
                minlength: 8,
                maxlength: 255
            },
        },
        messages: {
            'name': {
                required: message_required,
                minlength: 'Tối thiểu 8 kí tự',
                maxlength: 'Tối đa 255 kí tự',
            },
        },
        errorPlacement: function(error, element) {
            // Thêm class của Tailwind cho message lỗi
            error.addClass('px-2 text-sm text-red-500');
            // Hiển thị lỗi ngay sau element
            error.insertAfter(element);
        },
        success: function(label) {
            // Tùy chỉnh style khi validation thành công
            label.removeClass('error').addClass('success');
        },
    });
}

function destroy(table){
    $('.delete-category .btn-delete-modal').on('click', function(e){
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

function handleForm(table){
    $('#category-form .submit-form').on('click', function(e){
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        let validator = validateForm();
        let isFormValid = validator.form();
        if(isFormValid === true){
            console.log($('#category-form').attr('data-url')) 
            $.ajax({
                url: $('#category-form').attr('data-url'),
                method: $('#category-form').attr('data-method'),
                data:{
                    ...formData(),
                    _token : csrf_token
                },
                success: function(response){
                    fireToast('success', 'Thành công', response.success);
                    table.replaceData();
                    resetValue()
                },
                error: function(xhr){
                    console.log(xhr.error);
                }
            })
        }
    })
}

function getItems(){
    $.ajax({
        url: $('select[name=parent]').attr('data-url'),
        method: 'GET',
        success: function(response){
            let data = response.data;
            let html = '<option selected value="0">Danh mục cha</option>'
            data.forEach(item => {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=parent]').html(html);
        },
        error: function(message){
            console.log(message.error);
        }
    })
}

function resetValue(){
    $('input[name="name"]').val('');
    $('select[name="parent"]').val(0); 
    if($('#category-form .cancel-submit').length){
        $('#category-form .cancel-submit').remove();
    }
    $('.submit-form').text('Tạo mới')
    $('#category-form').attr('data-url', $('#category-form .submit-form').attr('data-store-url'));
    $('#category-form').attr('data-method', "POST");
}

$(document).ready(function(){
    if($('#category-data-table').length){
        dataTable();
    }
})