import {TabulatorFull as Tabulator} from 'tabulator-tables';
import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $ from 'jquery'

function getDataTable(){
    let type = $("#posts-data-table").attr('data-type');
    const columnTblPosts = [
        { title:"Tiêu đề", field:"title"},
        { 
            title: "Người đăng", 
            field: "user", 
            headerHozAlign: "center", 
            hozAlign: 'center', 
            width: 200,
            formatter: infoAuthor,
        },
        { title: "Diện tích", field: "area_format", formatter: "html",  headerHozAlign: "center", hozAlign: 'center', width: 150 },
        { title: "Giá", field: "currency_format", headerHozAlign: "center",  hozAlign: 'center',  width: 120},
        { title: "Địa chỉ",  field: "location", headerHozAlign: "center", hozAlign: 'center', width: 200},
        { title: "Ngày đăng", field: "created_date", headerHozAlign: "center", width: 150, hozAlign:'center' },
        { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center", width: 150},
    ];
    const columnTblNews = [
        { title:"Tiêu đề", field:"title", with: 1000},
        { 
            title: "Người đăng", 
            field: "user", 
            formatter: infoAuthor,
            width: 300,
        },
        { title: "Ngày đăng", field: "created_date", headerHozAlign: "center", hozAlign:'center', width: 200 },
        { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center", width: 200},
    ];

    // Get info author to user_id posts
    function infoAuthor (cell, formatterParams, onRendered) {
        // Access the data for the current row
        let rowData = cell.getRow().getData();
        // Create HTML content with combined name and image
        let html = '<div class="overflow-hidden" style="display: flex; align-items: center; justify-content: start;">';
        html += `<img src="${rowData.user.photo_url}" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; object-fit: cover;">`;
        html += '<span>' + rowData.user.name + '</span>';
        html += '</div>';
    
        return html;
    }
    const columns = (type === 'posts') ? columnTblPosts : columnTblNews;
    let table = new Tabulator("#posts-data-table", {
        layout: "fitColumns",
        resizableColumnFit: true,
        ajaxURL: $('#posts-data-table').attr('data-ajax'),
        ajaxConfig: "GET",
        ajaxContentType: "json",
        placeholder: "Chưa có bài viết nào",
        pagination: true,
        paginationMode: "remote",
        dataSendParams: {
            "page": "page",
        },
        columns: columns,
        ajaxResponse: function (url, params, response) {
            return response.data;
        },
    });     
    table.on('dataProcessed', function () {
        $('.delete-posts').on('click', function(e){
            e.preventDefault();
            $('#delete-modal').addClass('modal-delete-posts');
            $('.modal-delete-posts #delete-form').attr('data-url', $(this).attr('data-url'));
            destroy(table)
        })
    });
}

function destroy(table) {
    $('.modal-delete-posts .btn-delete-modal').on('click', function(e){
        e.preventDefault()
        const csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: $('.modal-delete-posts #delete-form').attr('data-url'),
            method: 'DELETE',
            data: {
                _token : csrf_token,
            },
            success: function(response){
                fireToast('success', 'Thành công', response.message);
                table.replaceData();
            },
            error: function(message){
                fireToast('error', message.error);
            }
        });
    });
}

$(document).ready(function () {
    if($('#posts-management-page').length){
        getDataTable()
    }
});
