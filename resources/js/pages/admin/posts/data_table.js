import {TabulatorFull as Tabulator} from 'tabulator-tables';
import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $ from 'jquery'

// function deletePost() {
//     $(document).on('click', '.delete-post', function() {
//         console.log($(this).attr('data-url'));
//         $('#deleteModal').attr('data-url', $(this).attr('data-url'));
//     });
//     $(document).on('click', '.btn-delete-modal', function(){
//         $.ajax({
//             url: $('#deleteModal').attr('data-url'),
//             method: 'DELETE',
//             data: {
//                 _token : $('meta[name="csrf-token"]').attr('content'),
//             },
//             success: function(response){
//                 setTimeout(function() {
//                     window.location.reload();
//                 }, 500);
//                 fireToast('success', 'Thành công', response.message);
//             },
//             error: function(xhr){
//                 fireToast('error', 'Lỗi',xhr.status + ' Xóa không thành công');
//             }
//         });
//     });
// }

function getDataTable(){
    let type = $("#data-table").attr('data-type');
    const columnTblPosts = [
        { title:"Tiêu đề", field:"title"},
        { 
            title: "Người đăng", 
            field: "user", 
            headerHozAlign: "center", 
            hozAlign: 'center', 
            width: 150,
            formatter: function(cell, formatterParams, onRendered) {
                var userData = cell.getData().user;
                if (userData) {
                    return userData.name;
                } else {
                    return "Trống";
                }
            }
        },
        { title: "Diện tích", field: "area_format", formatter: "html",  headerHozAlign: "center", hozAlign: 'center', width: 150 },
        { title: "Giá", field: "currency_format", headerHozAlign: "center",  hozAlign: 'center',  width: 150},
        { title: "Địa chỉ", 
            field: "ward", 
            headerHozAlign: "center", 
            hozAlign: 'center', 
            width: 150,
            formatter: function(cell, formatterParams, onRendered) {
                var data = cell.getData().ward;
                if (data) {
                    return ward.name;
                } else {
                    return "Trống";
                }
            } 
        },
        { title: "Ngày đăng", field: "created_date", headerHozAlign: "center", width: 150, hozAlign:'center' },
        { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center"},
    ];
    const columnTblNews = [
        { title:"Tiêu đề", field:"title"},
        { 
            title: "Người đăng", 
            field: "user", 
            headerHozAlign: "center", 
            hozAlign: 'center', 
            width: 150,
            formatter: function(cell, formatterParams, onRendered) {
                var userData = cell.getData().user;
                if (userData) {
                    return userData.name;
                } else {
                    return "";
                }
            }
        },
        { title: "Mô tả ngắn", field: "short_description", },
        { title: "Ngày đăng", field: "created_date", headerHozAlign: "center", hozAlign:'center' },
        { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center"},
    ];
    const columns = (type === 'posts') ? columnTblPosts : columnTblNews;
        let table = new Tabulator("#data-table", {
            layout: "fitColumns",
            resizableColumnFit: true,
            ajaxURL: $('#data-table').attr('data-ajax'),
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
                return response;
            },
        });     
        // deletePost()   
}

$(document).ready(function () {
    getDataTable()
});
