import{$ as e,o as f,g as k,d as x,l as _}from"./dropzone-13faa90d.js";function b(){e(".checked-item-all").on("change",function(){let t=e(this).prop("checked");e(".item-checkbox").prop("checked",t)}),e(".item-checkbox").on("change",function(){let t=e(".item-checkbox:not(:checked)").length>0;e(".checked-item-all").prop("checked",!t)})}function d(t,a,n,r){e(a).removeClass(r),e(a).addClass(n),e(t).addClass(r),e(t).removeClass(n)}function w(){let t=()=>{e(".button-choose-legal-documents").on("click",function(){e(".button-choose-legal-documents").removeClass("bg-red-500 text-white"),e(this).addClass("bg-red-500 text-white");var a=e(this).text().trim();e("#legal_documents").val(a)})};t(),e("#buttonToggleModalLegalDocuments").on("click",function(){e("#modalAddChoose").removeClass("hidden"),e("#inputModal").val(""),e("#titleModal").text("Thêm giấy tờ pháp lý"),e('label[for="inputModal"]').html('Giấy tờ pháp lý<span class="text-red-500">*</span>'),e("#buttonSubmitModal").attr("data-option-type","legal_documents"),e("#action-container").hasClass("sticky")&&e("#action-container").removeClass("sticky")}),e("#closeModal").on("click",function(){e("#modalAddChoose").addClass("hidden")}),e("#buttonSubmitModal").on("click",function(){if(e("#buttonSubmitModal").attr("data-option-type")==="legal_documents")if(e("#inputModal").val()==="")e("#errorSpan").length||e("#inputModal").after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');else{e("#errorSpan").remove();let a=e("#inputModal").val();e(".button-choose-legal-documents").removeClass("bg-red-500 text-white"),e("#buttonToggleModalLegalDocuments").before(`<button type="button" class="button-choose-legal-documents text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white rounded-full text-base px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${a}
                                                            </button>`),e("#legal_documents").val(a),e("#modalAddChoose").addClass("hidden"),t(),e("#action-container").addClass("sticky")}})}function C(){let t=()=>{e(".button-choose-interior").on("click",function(){e(".button-choose-interior").removeClass("bg-red-500 text-white"),e(this).addClass("bg-red-500 text-white");var a=e(this).text().trim();e("#interior").val(a)})};t(),e("#buttonToggleModalInterior").on("click",function(){e("#modalAddChoose").removeClass("hidden"),e("#inputModal").val(""),e("#titleModal").text("Thêm trang bị nội thất"),e('label[for="inputModal"]').html('Nội thất<span class="text-red-500">*</span>'),e("#buttonSubmitModal").attr("data-option-type","interior"),e("#action-container").hasClass("sticky")&&e("#action-container").removeClass("sticky")}),e("#closeModal").on("click",function(){e("#modalAddChoose").addClass("hidden")}),e("#buttonSubmitModal").on("click",function(){if(e("#buttonSubmitModal").attr("data-option-type")==="interior")if(e("#inputModal").val()==="")e("#errorSpan").length||e("#inputModal").after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');else{e("#errorSpan").remove();let a=e("#inputModal").val();e(".button-choose-interior").removeClass("bg-red-500 text-white"),e("#buttonToggleModalInterior").before(`<button type="button" class="button-choose-interior text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white text-base rounded-full font-lg px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${a}
                                                            </button>`),e("#interior").val(a),e("#modalAddChoose").addClass("hidden"),t(),e("#action-container").addClass("sticky")}})}function T(){e("#button-add-other-properties").on("click",function(){e("#modalAddChoose").removeClass("hidden"),e("#inputModal").val(""),e("#titleModal").text("Thông tin khác"),e('label[for="inputModal"]').html('Thông tin<span class="text-red-500">*</span>'),e("#buttonSubmitModal").attr("data-option-type","other_properties"),e("#action-container").hasClass("sticky")&&e("#action-container").removeClass("sticky")}),e("#closeModal").on("click",function(){e("#modalAddChoose").addClass("hidden")}),e("#buttonSubmitModal").on("click",function(){if(e("#buttonSubmitModal").attr("data-option-type")==="other_properties")if(e("#inputModal").val()==="")e("#errorSpan").length||e("#inputModal").after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');else{e("#errorSpan").remove();let t=e("#inputModal").val();e("#other_properties").after(`<div class="flex mt-4">
                                                <input type="text" value="${t}" name="other_properties[]" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <button type="button" class="inline-flex items-center px-3 text-lg text-gray-900 bg-gray-200 border rounded-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                 <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </div>`),e("#interior").val(t),e("#modalAddChoose").addClass("hidden"),onChoose(),e("#action-container").addClass("sticky")}})}function D(){e("#homepage .choose-category").on("click",function(){d(e(this),"#homepage .choose-category","bg-[8f8f8f]","bg-black font-bold");let t=e(this).attr("data-id"),n=`/${e(this).text().trim()}/tim-kiem`;e("#homepage .form-search").attr("action",n),console.log(n),e.ajax({url:e(this).attr("data-url"),method:"GET",data:{category_id:t},success:function(r){let o=r.data,i=`<div class="flex items-center justify-between">
                                <label for="all-real-estate-type" class="text-black w-full">Tất cả loại nhà đất</label>
                                <input type="checkbox" id="all-real-estate-type" value="Tất cả lại nhà đất" class="checked-item-all w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>`;o!==null?o.forEach(s=>{i+=`<div class="flex items-center justify-between">
                                    <label for="real-estate-type-${s.id}" class="text-black w-full">${s.name}</label>
                                    <input type="checkbox" id="real-estate-type-${s.id}" name="real-estate-type[]" value="${s.id}" class="item-checkbox w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                                </div>`}):i=`<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">Trống!</span> Chưa có dữ liệu về danh mục này. 
                            </div>`,e("#homepage #list-real-estate-type-checkbox").html(i),b()},error:function(r){console.log(r.message)}})})}function M(){e("#homepage .load-more-posts").on("click",function(){let t=e(this).attr("data-category-id"),a=e(this).attr("data-category-name");e(this).attr("data-check");let n=e(this);e(this).attr("data-check")==="true"?(window.location.href=n.attr("data-url"),n.attr("data-check","false")):e.ajax({url:e(this).attr("data-url"),type:"GET",data:{category_id:t},success:function(r){r.message?fireToast("warning","Cảnh báo",r.message):(e("#list-more-post-container-"+t).html(r),n.text("Xem tiếp"),n.attr("data-url","/"+a),n.attr("data-check","true"))},error:function(r){console.log(r.message)}})})}e(document).ready(function(){b(),D(),M()});function $(){e("#search-bar #choose-category").on("change",function(t){t.preventDefault();let a=e(this).find("option:selected").data("url");e(".form-search").prop("action",a),e(".form-search").trigger("submit")})}function q(){e(".choose-area-range").on("click",function(t){t.preventDefault();let a=e(this).text().trim();d(`.choose-area-range:contains("${a}")`,".choose-area-range","text-gray-900","text-[#DC2D27]"),a==="Tất cả diện tích"&&(e("#page").length?a="Tất cả":a="Diện tích"),e(".show-area-range").text(a),e('input[name="area-range"]').length&&a!=="Tất cả"?e('input[name="area-range"]').val(a):e('input[name="area-range"]').length&&a==="Tất cả"?e('input[name="area-range"]').remove():!e('input[name="area-range"]').length&&a!=="Tất cả"&&e(".form-search").append(`<input type="text" id="area-range" name="area-range" value="${a}">`),e("#page .form-search").length&&e("#page .form-search").trigger("submit")})}function S(){e(".choose-price-range").on("click",function(t){t.preventDefault();let a=e(this).text().trim();d(`.choose-price-range:contains("${a}")`,".choose-price-range","text-gray-900","text-[#DC2D27]"),a==="Tất cả mức giá"&&(e("#page").length?a="Tất cả":a="Mức giá"),e(".show-price-range").text(a),e('input[name="price-range"]').length&&a==="Tất cả"?e('input[name="price-range"]').remove():e('input[name="price-range"]').length&&a!=="Tất cả"?e('input[name="price-range"]').val(a):!e('input[name="price-range"]').length&&a!=="Tất cả"&&e(".form-search").append(`<input type="text" id="price-range" name="price-range" value="${a}">`),e("#page .form-search").length>0&&e("#page .form-search").trigger("submit")})}function F(){let t=a=>{let n=".choose-"+a;e(n).each(function(){e(this).hasClass("choosed")&&e(this).addClass("bg-[#FFD8C2] text-[#74150F]")}),e(n).on("click",function(){let r=e(this).attr("data-number");e(this).toggleClass("bg-[#FFD8C2] text-[#74150F] choosed"),e(this).hasClass("choosed")?e(".form-search").append(`<input type="text" class="${a}" name="${a}[]" value="${r}">`):e(`input[name="${a}[]"]`).filter(function(){return e(this).val()===r}).remove()})};t("bedroom"),t("toilet"),t("house-direction")}function A(){e("#page #choose-sort-by").on("change",function(t){if(t.preventDefault(),e(this).val()!=0)if(e('input[name="sort_by"]').length>0)e('input[name="sort_by"]').val(e(this).val());else{let a=e(this).val();e("#page .form-search").append(`<input type="text" class="sort-by" name="sort_by" value="${a}">`)}else e('input[name="sort_by"]').length>0&&e('input[name="sort_by"]').remove();e("#page .form-search").trigger("submit")})}function v(){e("#post-details .choose-ward").on("click",function(t){t.preventDefault();let a=e(this).attr("data-province-name"),n=e(this).attr("data-district-name"),r=e(this).attr("data-ward-name"),o=e(this).attr("data-real-estate-type");o&&e(".item-checkbox").each(function(){e(this).val()===o&&e(this).prop("checked",!0)}),f(a,n,r),e("#post-details .form-search").trigger("submit")})}function y(){e(".choose-province").on("click",function(t){t.preventDefault();let a=e(this).attr("data-province-name").trim(),n="",r="",o=e(this).attr("data-real-estate-type");e("#post-details").length&&e(".item-checkbox").each(function(){e(this).val()===o&&e(this).prop("checked",!0)}),f(a,n,r),e(".form-search").trigger("submit")})}function L(){let t=i=>e(".item-checkbox:checked").length===0?(i===!0&&fireToast("error","Trống","Bạn chưa chọn loại nhà đất"),!1):(e(".checked-item-all").prop("checked",!1),e(".item-checkbox").prop("checked",!1),!0);e(".reset-item-checkbox").on("click",function(i){i.preventDefault(),t(!0)===!0&&e("#page .form-search").trigger("submit")});let a=i=>{if(e('input[name="location"]').length>0){e('input[name="location"]').remove(),k(),e("#districts").html("<option disabled selected>Quận/Huyện</option>"),e("#wards").html("<option disabled selected>Xã/Phường</option>");let s="Trên toàn quốc";return e("#page").length&&(s="Tất cả"),e(".show-location").text(s),!0}else return i===!0&&fireToast("error","Thất bại","Bạn chưa chọn vị trí"),!1};e(".reset-select-location").on("click",function(i){i.preventDefault(),a(!0)===!0&&e("#page .form-search").trigger("submit")});let n=i=>e('input[name="price-range"]').length>0?(e('input[name="price-range"]').remove(),d(".choose-price-range:first",".choose-price-range","text-gray-900","text-[#DC2D27]"),e(this).attr("data-style")==="0"?e(".show-price-range").text("Mức giá"):e(".show-price-range").text("Tất cả"),!0):(i===!0&&fireToast("error","Thất bại","Bạn chưa chọn mức giá"),!1);e(".reset-price-range").on("click",function(i){i.preventDefault(),n(!0)===!0&&e("#page .form-search").trigger("submit")});let r=i=>e('input[name="area-range"]').length>0?(e('input[name="area-range"]').remove(),d(".choose-area-range:first",".choose-area-range","text-gray-900","text-[#DC2D27]"),e(this).attr("data-style")==="0"?e(".show-area-range").text("Diện tích"):e(".show-area-range").text("Tất cả"),!0):(i===!0&&fireToast("error","Thất bại","Bạn chưa chọn diện tích"),!1);e(".reset-area-range").on("click",function(i){i.preventDefault(),r(!0)===!0&&e("#page .form-search").trigger("submit")});let o=i=>{let s=".choose-"+i;return e(s).hasClass("choosed")?(e(`input[name="${i}[]"]`).remove(),e(s).removeClass("bg-[#FFD8C2] text-[#74150F] choosed"),!0):!1};e(".reset-filter-more").on("click",function(i){i.preventDefault();let s=o("bedroom"),l=o("toilet"),c=o("house-direction");!s&&!l&&!c?fireToast("error","Thất bại","Chưa chọn giá trị"):(s||l||!c)&&e("#page .form-search").trigger("submit")}),e(".reset-all-value").on("click",function(i){i.preventDefault();let s=t(!1),l=a(!1),c=n(!1),h=r(!1),p=o("bedroom"),g=o("toilet"),m=o("house-direction");!s&&!l&&!c&&!h&&!p&&!g&&!m?fireToast("info","Trống","Bạn chưa nhập hay chọn thông tin tìm kiếm"):(s||l||c||h||p||g||m)&&(e("#home").length>0?fireToast("info","Đã đặt lại","Đã đặt lại giá trị về ban đầu"):(fireToast("info","Đã đặt lại","Đã đặt lại giá trị về ban đầu"),e("#page .form-search").trigger("submit")))})}function P(){let t=()=>e('input[name="location"]').length>0||e(".item-checkbox:checked").length>0||e('input[name="keyword"]').val()!==""||e('input[name="price-range"]').length>0||e('input[name="area-range"]').length>0||e('input[name="toilet[]"]').length>0||e('input[name="bedroom[]"]').length>0||e('input[name="home-direction[]"]').length>0;e("#homepage #btn-submit").on("click",function(a){a.preventDefault(),t()===!0?e("#homepage .form-search").trigger("submit"):fireToast("info","Thất bại","Bạn cần nhập hoặc chọn một thông tin để tìm kiếm")})}e(document).ready(function(){P(),$(),q(),S(),F(),A(),y(),v(),L()});function j(){let t=()=>{e(".li-province-new").each(function(){let a=e(this).attr("data-province-name");e('input[name="location"]').length>0&&e('input[name="location"]').val()===a&&e(this).addClass("text-[#DC2D27]")})};e(".load-more-provinces").on("click",function(a){a.preventDefault();let n=e(this);e(this).attr("data-status")==="true"?e.ajax({url:e(this).attr("data-url"),method:"GET",success:function(o){const i=e(".li-province-current").last();let s=o.data,l="";s.forEach(function(c){l+=`<li class="li-province-new choose-province px-8 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-3 cursor-pointer"
                        data-province-name = "${c.province_full_name}" data-real-estate-type="${c.real_estate_type}">
                                    ${c.province_name} <span>${"("+c.quantity_posts+")"}</span>
                                </li>`}),e(".li-province-new").remove(),i.after(l),t(),y(),n.html(`Thu gọn<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);">
                                    <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>`),n.attr("data-status","false")},error:function(o){console.log(o.error)}}):(e(".li-province-new").remove(),n.html(`Xem thêm
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>`),n.attr("data-status","true"))})}function E(){e(".show-phone-number").on("click",function(t){t.preventDefault();const a=e(this).attr("data-post-id");e.ajax({url:e(this).attr("data-url"),method:"GET",data:{post_id:a},success:function(n){let r=n.data;e(`.masked-phone-number-${a}`).text(r);var o=document.createElement("input");o.setAttribute("value",r),document.body.appendChild(o),o.select(),document.execCommand("copy"),document.body.removeChild(o),fireToast("success","Thành công","Đã copy")},error:function(n){fireToast("error","Lỗi",n.message)}})})}function B(){e("#post-details .load-more-wards").on("click",function(t){t.preventDefault();let a=e(this);const n=e(this).attr("data-province-name"),r=e(this).attr("data-district-name");e(this).attr("data-status")==="true"?e.ajax({url:e(this).attr("data-url"),method:"GET",success:function(o){const i=o.data;let s="";i.forEach(function(c){s+=`<tr class="border-t border-b more-data-ward choose-ward hover:bg-[#FFD8C2] hover:text-[#74150F] cursor-pointer  
                                    {{ $post->ward->name === ${c.ward_name} ? 'bg-[#FFD8C2] text-[#74150F]' : '' }}" 
                                    data-district-name="${r}" 
                                    data-province-name="${n}" 
                                    data-ward-name="${c.ward_name}" 
                                    data-real-estate-type="{{ $post->real_estate_type }}">
                                    <td class="py-3 px-4">${c.ward_name}</td>
                                    <td class="py-3 px-4">
                                        ${c.sub_price_average==="Chưa có dữ liệu"?c.sub_price_average:c.sub_price_average+"/m&sup2;"}
                                    </td>
                                    <td class="py-3 px-4 text-end">
                                        <a href="#" class="flex items-center justify-end">
                                            ${c.quantity_posts} tin bán 
                                            <span class="pl-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 6L15 12L9 18" stroke="#828282"/>
                                                </svg>  
                                            </span>
                                        </a>
                                    </td>
                                </tr>`}),e("#post-details .data-ward-current").last().after(s),a.text("Thu gọn"),v(),a.attr("data-status","false")},error:function(o){fireToast("error","Lỗi",o.message)}}):(e("#post-details .more-data-ward").length&&e("#post-details .more-data-ward").remove(),a.text("Xem thêm"),a.attr("data-status","true"))})}function I(){const t=e('meta[name="csrf-token"]').attr("content"),a=e(".add-to-favorite").attr("data-post-id"),n=e(".add-to-favorite").attr("data-url");e(".add-to-favorite").on("click",function(r){r.preventDefault(),e.ajax({url:n,method:"POST",data:{post_id:a,_token:t},success:function(o){fireToast("success","Yêu thích","Đã yêu thích")},error:function(o){fireToast("info","Không thành công","Chưa thêm vào yêu thích")}})})}function V(){e(".dropdown-toggle").on("click",function(t){t.preventDefault();let a=e(this).next(".dropdown-box");e(".dropdown-box").not(a).addClass("hidden"),a.toggleClass("hidden")})}e(document).ready(function(){j(),B(),E(),I(),V()});function G(){e(".choose-keyword").on("click",function(){const t=e(this).attr("data-category-name").trim(),a=e(this).text().trim();let n=`/${t}/tim-kiem`;e(".form-search").prop("action",n),e('input[name="keyword"]').length?e('input[name="keyword"]').val(a):e(".form-search").append(`<input type="text" value="${a}" name="keyword"> `),e(".form-search").trigger("submit")})}e(document).ready(function(){G()});function N(){e("#create-post-page .choose-category").on("click",function(){const t="text-gray-500 bg-white",a="bg-gray-500 text-white";d(e(this),"#create-post-page .choose-category",t,a);let n=e(this).attr("data-category-id");e.ajax({url:e(this).attr("data-url"),method:"GET",data:{category_id:n},success:function(r){let o=r.data,i="<option selected disabled>Loại bất động sản</option>";o.forEach(s=>{i+=`<option value=${s.id} >${s.name}</option>`}),e("#create-post-page #real-estate-types").html(i),console.log(o)},error:function(r){console.log(r.message)}})})}function R(){e("#create-post-page #price-style").on("change",function(){e(this).val()==="0"?(e('input[name="price"]').val("Thỏa thuận"),e('input[name="price"]').prop("readonly",!0)):(e('input[name="price"]').val(""),e('input[name="price"]').prop("readonly",!1))})}function u(t){let a=()=>{e(`.increase-${t}`).on("click",function(r){r.preventDefault();let o=parseInt(e(`input[name="${t}"]`).val());o=isNaN(o)?o=1:o+1,e(`input[name="${t}"]`).val(o)})},n=()=>{e(`.decrease-${t}`).on("click",function(r){r.preventDefault();let o=parseInt(e(`input[name="${t}"]`).val());o=isNaN(o)||o===0?o=1:o-1,e(`input[name="${t}"]`).val(o)})};a(),n()}function X(){const t="Vui lòng nhập thông tin này";return e("#create-post-page #post-form").validate({rules:{title:{required:!0,minlength:30,maxlength:100},description:{required:!0,minlength:30,maxlength:3e3},price:{required:!0},province:{required:!0},district:{required:!0},ward:{required:!0},area:{required:!0},images:{required:!0},legal_documents:{required:!0},"real-estate-types":{required:!0}},messages:{title:{required:t,minlength:"Cần nhập ít nhất 30 kí tự",maxlength:"Tối đa là 100 kí tự"},description:{required:t,minlength:"Cần nhập ít nhất 30 kí tự",maxlength:"Tối đa là 3000 kí tự"},price:{required:t},province:{required:t},district:{required:t},ward:{required:t},area:{required:t},images:{required:t},floors:{required:t},bedroom:{required:t},toilet:{required:t},legal_documents:{required:t},"real-estate-types":{required:t}},errorPlacement:function(a,n){let r=n.attr("id")+"-error";console.log(r),e("#"+r).html(a.text()),e("#"+r).addClass("text-red-600 text-sm")},success:function(a,n){let r=e(n).attr("id")+"-error";e("#"+r).html("")}})}function O(){let t={};return t.category_id=e("#create-post-page .choose-category").attr("data-category-id"),t.province_id=e('select[name="province"]').val(),t.district_id=e('select[name="district"]').val(),t.ward_id=e('select[name="ward"]').val(),t.type=1,t.vip=0,t.title=e('input[name="title"]').val(),t.description=e('textarea[name="description"]').val(),t.short_description="",t.price=e('input[name="price"]').val().replace(/\./g,""),t.area=e('input[name="area"]').val(),t.sub_price=0,t.price!==null&&t.area!==null&&(t.sub_price=_.round(t.price/t.area)),t.status=1,t.images=[],e('input[name="images[]"]').each(function(r,o){t.images.push(e(this).val())}),t.floors=e('input[name="floors"]').val(),t.bedroom=e('input[name="bedroom"]').val(),t.toilet=e('input[name="toilet"]').val(),t.house_direction="",e("#house-direction option:selected").length&&(t.house_direction=e("#house-direction option:selected").val()),t.balcony_direction="",e("#balcony-direction option:selected").length&&(t.house_dbalcony_directionirection=e("#balcony-direction option:selected").val()),t.legal_documents=e('input[name="legal_documents"]').val(),t.other_properties=[],e('input[name="other_properties[]"]').each(function(){t.other_properties.push(e(this).val())}),t.real_estate_type=e('select[name="real-estate-types"]').val(),t.tags=[],e("#tags").find("option:selected").each(function(){t.tags.push(e(this).val())}),t}function K(){const t=e("#create-post-page #post-form"),a=e('meta[name="csrf-token"]').attr("content");e("#create-post-page #submit-form").on("click",function(n){n.preventDefault();var r=X(),o=r.form();o===!0?e.ajax({url:t.attr("data-ajax"),method:t.attr("data-method"),data:{...O(),_token:a},success:function(i){fireToast("success","Thành công",i.message),console.log(i.data),window.location.href="/"},error:function(i){i.status===422?fireToast("error","Lỗi","Vui lòng nhập đầy đủ thông tin"):fireToast("error","Lỗi",i.message)}}):r.showErrors()})}e(document).ready(function(){u("floors"),u("toilet"),u("bedroom"),w(),C(),T(),N(),R(),K(),x()});