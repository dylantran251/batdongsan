import {TabulatorFull as Tabulator} from 'tabulator-tables';
// import 'tabulator-tables/dist/css/tabulator.css'
import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $, { data } from 'jquery'
import { async } from 'validate.js';

function validateForm() {
    const message_required = 'Vui lòng nhập thông tin này'
    return $('#create-news-page #news-form').validate({
        rules: {
            'title': { required: true, minlength: 30, maxlength: 100 },
            'description' : { required: true, minlength: 30, maxlength: 3000},
            'file' : "required"
        },
        messages: {
            'title': {
                required: message_required,
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 100 kí tự'
            },
            'description': { 
                required: message_required , 
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 100 kí tự'
            } ,
            'file' : { required: message_required }
        },
        errorPlacement: function(error, element) {
            let errorId = element.attr('id') + '-error';
            // Kiểm tra xem có tồn tại element với ID đã tính toán hay không
            if ($('#' + errorId).length) {
                // Nếu tồn tại, hiển thị error trên element đã có
                $('#' + errorId).html(error.text());
                $('#' + errorId).addClass('text-red-600 text-sm');
            }else{

                error.addClass('px-2 text-sm text-red-600');
                error.insertAfter(element);
            }
        },
        success: function(label) {
    //     let errorId = $(element).attr('id') + '-error';
    //     $('#' + errorId).html('');
            label.removeClass('error').addClass('success');
        },
    });
}

function inputNewsData(){
    let news = {}                                        
    news['title'] = $('input[name="title"]').val(); 
    news['content'] = $('textarea[name="content"]').val();
    news['description'] = $('textarea[name="description"]').val();
    news['avatar'] = $('input[name="avatar"]').val();   
    news['category_id'] = $('select[name="categories"]').val(); 
    news['source'] = $('input[name="source"]').val();                      
    news['tags'] = [];
    let tags = $('#tags').find('option:selected');
    tags.each(function() {
        news['tags'].push($(this).val());
    });
    return news;                                       
}

function uploadImage() {
    $('input[name="file"]').on('change', function(e) {
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('file', $(this)[0].files[0]);
        if($('input[name="avatar"]').length){
            formData.append('avatar', $('input[name="avatar"]').val());
        }
        axios.post($(this).attr('data-url'), formData)
            .then(response => {
                if(!$('input[name="avatar"]').length){
                    $('.upload-container').append(`<input type="hidden" name="avatar" value="${ response.data.data }">`)
                }
                $('input[name="avatar"]').val(response.data.data)
                console.log(response.data.data);
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    });
}

function store(){
    $('#create-news-page .submit-form').on('click',  function(e){
        e.preventDefault();
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        console.log($('input[name="source"]').val());
        var validator = validateForm();
        var is_valid = validator.form();
        // if(is_valid === true){
            $.ajax({
                url: $('#create-news-page form').attr('action'),
                data: {
                    ...inputNewsData(),
                    _token: csrf_token,
                },
                method: $('#create-news-page form').attr('method'),
                success: function(response){
                    window.location.href = response.url;
                },
                error: function(message){
                    console.log(message.error);
                }
            })
        // }
    })
}

function loadDataTable(){
    let table = new Tabulator("#news-data-table", {
        layout: "fitColumns",
        resizableColumnFit: true,
        ajaxURL: $('#news-data-table').attr('data-ajax'), //ajax URL
        ajaxConfig: "GET", //ajax HTTP request type
        ajaxContentType: "json",
        placeholder: "Chưa có tin tức nào",
        pagination: true,
        paginationMode: "remote",
        dataSendParams: {
            "page": "page", //change page request parameter to "pageNo"
        },
        columns: [

            { title: "Tiêu đề", field: "title" },
            { 
                title: "Người đăng", 
                field: "user", 
                hozAlign: 'center',
                formatter: function (cell, formatterParams, onRendered) {
                    // Access the data for the current row
                    var rowData = cell.getRow().getData();
                    // Create HTML content with combined name and image
                    var htmlContent = '<div style="display: flex; align-items: center;">'
                    htmlContent += `<img src="${rowData.author.photo_url}"  alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; object-fit: cover;">`;
                    htmlContent += '<span>' + rowData.author.name + '</span>';
                    htmlContent += '</div>';
                
                    return htmlContent;
                }
            },
            { title: "Nguồn", field: "source", headerHozAlign: "center"  },
            { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center" },
        ],
        ajaxResponse: function (url, params, response) {
            console.log(response)
            return response.data; //return the response data to tabulator
        }
    });   
    table.on('dataProcessed', function () {
        $('.delete-news').on('click', function(e){
            e.preventDefault();
            $('#delete-modal').addClass('modal-delete-news');
            $('.modal-delete-news #delete-form').attr('data-url', $(this).attr('data-url'));
            destroy(table)
        })
    });
}

function destroy(table){
    $('.modal-delete-news .btn-delete-modal').on('click', function(e){
        e.preventDefault()
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: $('.modal-delete-news #delete-form').attr('data-url'),
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

$(document).ready(function(){
    if($('#admin-news-page').length){
        loadDataTable();
    }
    store()
    uploadImage()
    
})