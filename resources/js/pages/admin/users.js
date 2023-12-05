import {TabulatorFull as Tabulator} from 'tabulator-tables';
// import 'tabulator-tables/dist/css/tabulator.css'
import 'tabulator-tables/dist/css/tabulator_bulma.min.css'
import $ from 'jquery'
import {buildDeleteModal} from "../../components/crud_delete.js";

// let UserContainer = $("div[data-page='admin-user']");
// if(UserContainer.length > 0)
// {

//     let buildEditFnc = ()=>{
//         let targets = $('[data-tw-target="#edit-user-modal"]');
//         targets.unbind('click');
//         targets.on('click', async function (e) {
//             let modalContainer = $("#edit-user-modal form");
//             modalContainer.attr('action', "")
//             let item = await axiosInstance($(this).attr('data-get')).then(function (response) {
//                 return response.data;
//             })
//             modalContainer.find('input[name="name"]').val(item.name)
//             modalContainer.find('input[name="email"]').val(item.email)
//             modalContainer.find('input[name="phone"]').val(item.phone)
//             modalContainer.find('select[name="role_id"]').val(item.role_id);
//             modalContainer.find('input[name="password"]').val("");
//             modalContainer.attr('action', $(this).attr('data-update-url'))
//         })
//     }
//     $(document).ready(function () {
//         let table = new Tabulator("#items-table", {
//             layout:"fitColumns",
//             resizableColumnFit:true,
//             ajaxURL:$('#items-table').attr('data-ajax'), //ajax URL
//             ajaxConfig:"GET", //ajax HTTP request type
//             ajaxContentType:"json",
//             placeholder:"Chưa có người dùng nào",
//             pagination:true,
//             paginationMode:"remote",
//             dataSendParams:{
//                 "page":"page", //change page request parameter to "pageNo"
//             } ,
//             columns:[
//                 {title:"Người dùng", field:"name", width:200, headerFilter:"input"},
//                 {title:"Email", field:"email", headerFilter:"input"},
//                 {title:"Số điện thoại", field:"phone", headerFilter:"input"},
//                 {title:"Quyền", field:"role", headerHozAlign: "center" },
//                 {title:"Hành động", field:"actions", formatter: "html", headerHozAlign: "center" },
//             ],

//             ajaxResponse:function(url, params, response){
//                 return response; //return the response data to tabulator
//             },
//         });
//         table.on('dataProcessed', function () {
//             buildEditFnc()
//             buildDeleteModal(function (response) {
//                 fireToast('success', "Success", response.data.message).then(r => {})
//                 table.replaceData()
//             })
//         })

//         $('#create-user-modal form').on('submit', async function (e) {
//             e.preventDefault();
//             let form = $(this);
//             await axiosInstance.post($(this).attr('action'), $(this).serialize())
//                 .then(function (response) {
//                     fireToast('success', "Success", response.data.message)
//                     table.replaceData()

//                     form.find('input:not([type="hidden"])').each(function () {
//                         $(this).val("");
//                     })
//                 })
//         })
//         $('#edit-user-modal form').on('submit', async function (e) {
//             e.preventDefault();
//             await axiosInstance.post($(this).attr('action'), $(this).serialize())
//                 .then(function (response) {
//                     fireToast('success', "Success", response.data.message)
//                     table.replaceData()
//                 })
//         })
//     })
// }
$(document).ready(function () {
    if($("#usersDataTable").length > 0){
        let table = new Tabulator("#usersDataTable", {
            layout: "fitColumns",
            resizableColumnFit: true,
            ajaxURL: $('#usersDataTable').attr('data-ajax'), //ajax URL
            ajaxConfig: "GET", //ajax HTTP request type
            ajaxContentType: "json",
            placeholder: "Chưa có người dùng nào",
            pagination: true,
            paginationMode: "remote",
            dataSendParams: {
                "page": "page", //change page request parameter to "pageNo"
            },
            columns: [
                { title: "Tên", field:"name"},
                { title: "Email", field: "email", headerHozAlign: "center", hozAlign: 'center' },
                { title: "Số điện thoại", field: "phone", formatter: "html",  headerHozAlign: "center", hozAlign: 'center' },
                { title: "Quyền", field: "role_id", headerHozAlign: "center", hozAlign: 'center'},
                { title: "Hành động", field: "actions", formatter: "html", headerHozAlign: "center" },
            ],
            ajaxResponse: function (url, params, response) {
                console.log(response)
                return response; //return the response data to tabulator
            },
        });
    }
});

