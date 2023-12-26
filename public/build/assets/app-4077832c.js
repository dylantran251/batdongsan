import{$ as e,h as p,a as h,o as m,g as y,v as k,i as _}from"./posts-0db267f1.js";function x(){e("#homepage .choose-category").on("click",function(){h(e(this),"#homepage .choose-category","bg-[8f8f8f]","bg-black font-bold");let a=e(this).attr("data-id"),r=`/${e(this).text().trim()}/tim-kiem`;e("#homepage .form-search").attr("action",r),console.log(r),e.ajax({url:e(this).attr("data-url"),method:"GET",data:{category_id:a},success:function(i){let o=i.data,n=`<div class="flex items-center justify-between">
                                <label for="all-real-estate-type" class="text-black w-full">Tất cả loại nhà đất</label>
                                <input type="checkbox" id="all-real-estate-type" value="Tất cả lại nhà đất" class="checked-item-all w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>`;o!==null?o.forEach(s=>{n+=`<div class="flex items-center justify-between">
                                    <label for="real-estate-type-${s.id}" class="text-black w-full">${s.name}</label>
                                    <input type="checkbox" id="real-estate-type-${s.id}" name="real-estate-type[]" value="${s.id}" class="item-checkbox w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                                </div>`}):n=`<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">Trống!</span> Chưa có dữ liệu về danh mục này. 
                            </div>`,e("#homepage #list-real-estate-type-checkbox").html(n),p()},error:function(i){console.log(i.message)}})})}function w(){e("#homepage .load-more-posts").on("click",function(){let a=e(this).attr("data-category-id"),t=e(this).attr("data-category-name");e(this).attr("data-check");let r=e(this);e(this).attr("data-check")==="true"?(window.location.href=r.attr("data-url"),r.attr("data-check","false")):e.ajax({url:e(this).attr("data-url"),type:"GET",data:{category_id:a},success:function(i){i.message?fireToast("warning","Cảnh báo",i.message):(e("#list-more-post-container-"+a).html(i),r.text("Xem tiếp"),r.attr("data-url","/"+t),r.attr("data-check","true"))},error:function(i){console.log(i.message)}})})}e(document).ready(function(){p(),x(),w()});function T(){e("#search-bar #choose-category").on("change",function(a){a.preventDefault();let t=e(this).find("option:selected").data("url");e(".form-search").prop("action",t),e(".form-search").trigger("submit")})}function C(){e(".choose-area-range").on("click",function(a){a.preventDefault();let t=e(this).text().trim();h(`.choose-area-range:contains("${t}")`,".choose-area-range","text-gray-900","text-[#DC2D27]"),t==="Tất cả diện tích"&&(e("#page").length?t="Tất cả":t="Diện tích"),e(".show-area-range").text(t),e('input[name="area-range"]').length&&t!=="Tất cả"?e('input[name="area-range"]').val(t):e('input[name="area-range"]').length&&t==="Tất cả"?e('input[name="area-range"]').remove():!e('input[name="area-range"]').length&&t!=="Tất cả"&&e(".form-search").append(`<input type="hidden" id="area-range" name="area-range" value="${t}">`),e("#page .form-search").length&&e("#page .form-search").trigger("submit")})}function D(){e(".choose-price-range").on("click",function(a){a.preventDefault();let t=e(this).text().trim();h(`.choose-price-range:contains("${t}")`,".choose-price-range","text-gray-900","text-[#DC2D27]"),t==="Tất cả mức giá"&&(e("#page").length?t="Tất cả":t="Mức giá"),e(".show-price-range").text(t),e('input[name="price-range"]').length&&t==="Tất cả"?e('input[name="price-range"]').remove():e('input[name="price-range"]').length&&t!=="Tất cả"?e('input[name="price-range"]').val(t):!e('input[name="price-range"]').length&&t!=="Tất cả"&&e(".form-search").append(`<input type="hidden" id="price-range" name="price-range" value="${t}">`),e("#page .form-search").length>0&&e("#page .form-search").trigger("submit")})}function $(){let a=t=>{let r=".choose-"+t;e(r).each(function(){e(this).hasClass("choosed")&&e(this).addClass("bg-[#FFD8C2] text-[#74150F]")}),e(r).on("click",function(){let i=e(this).attr("data-number");e(this).toggleClass("bg-[#FFD8C2] text-[#74150F] choosed"),e(this).hasClass("choosed")?e(".form-search").append(`<input type="hidden" class="${t}" name="${t}[]" value="${i}">`):e(`input[name="${t}[]"]`).filter(function(){return e(this).val()===i}).remove()})};a("bedroom"),a("toilet"),a("house-direction")}function F(){e("#page #choose-sort-by").on("change",function(a){if(a.preventDefault(),e(this).val()!=0)if(e('input[name="sort_by"]').length>0)e('input[name="sort_by"]').val(e(this).val());else{let t=e(this).val();e("#page .form-search").append(`<input type="hidden" class="sort-by" name="sort_by" value="${t}">`)}else e('input[name="sort_by"]').length>0&&e('input[name="sort_by"]').remove();e("#page .form-search").trigger("submit")})}function v(){e("#post-details .choose-ward").on("click",function(a){a.preventDefault();let t=e(this).attr("data-province-name"),r=e(this).attr("data-district-name"),i=e(this).attr("data-ward-name"),o=e(this).attr("data-real-estate-type");o&&e(".item-checkbox").each(function(){e(this).val()===o&&e(this).prop("checked",!0)}),m(t,r,i),e("#post-details .form-search").trigger("submit")})}function b(){e(".choose-province").on("click",function(a){a.preventDefault();let t=e(this).attr("data-province-name").trim(),r="",i="",o=e(this).attr("data-real-estate-type");e("#post-details").length&&e(".item-checkbox").each(function(){e(this).val()===o&&e(this).prop("checked",!0)}),m(t,r,i),e(".form-search").trigger("submit")})}function P(){let a=n=>e(".item-checkbox:checked").length===0?(n===!0&&fireToast("error","Trống","Bạn chưa chọn loại nhà đất"),!1):(e(".checked-item-all").prop("checked",!1),e(".item-checkbox").prop("checked",!1),!0);e(".reset-item-checkbox").on("click",function(n){n.preventDefault(),a(!0)===!0&&e("#page .form-search").trigger("submit")});let t=n=>{if(e('input[name="location"]').length>0){e('input[name="location"]').remove(),y(),e("#districts").html("<option disabled selected>Quận/Huyện</option>"),e("#wards").html("<option disabled selected>Xã/Phường</option>");let s="Trên toàn quốc";return e("#page").length&&(s="Tất cả"),e(".show-location").text(s),!0}else return n===!0&&fireToast("error","Thất bại","Bạn chưa chọn vị trí"),!1};e(".reset-select-location").on("click",function(n){n.preventDefault(),t(!0)===!0&&e("#page .form-search").trigger("submit")});let r=n=>e('input[name="price-range"]').length>0?(e('input[name="price-range"]').remove(),h(".choose-price-range:first",".choose-price-range","text-gray-900","text-[#DC2D27]"),e(this).attr("data-style")==="0"?e(".show-price-range").text("Mức giá"):e(".show-price-range").text("Tất cả"),!0):(n===!0&&fireToast("error","Thất bại","Bạn chưa chọn mức giá"),!1);e(".reset-price-range").on("click",function(n){n.preventDefault(),r(!0)===!0&&e("#page .form-search").trigger("submit")});let i=n=>e('input[name="area-range"]').length>0?(e('input[name="area-range"]').remove(),h(".choose-area-range:first",".choose-area-range","text-gray-900","text-[#DC2D27]"),e(this).attr("data-style")==="0"?e(".show-area-range").text("Diện tích"):e(".show-area-range").text("Tất cả"),!0):(n===!0&&fireToast("error","Thất bại","Bạn chưa chọn diện tích"),!1);e(".reset-area-range").on("click",function(n){n.preventDefault(),i(!0)===!0&&e("#page .form-search").trigger("submit")});let o=n=>{let s=".choose-"+n;return e(s).hasClass("choosed")?(e(`input[name="${n}[]"]`).remove(),e(s).removeClass("bg-[#FFD8C2] text-[#74150F] choosed"),!0):!1};e(".reset-filter-more").on("click",function(n){n.preventDefault();let s=o("bedroom"),l=o("toilet"),c=o("house-direction");!s&&!l&&!c?fireToast("error","Thất bại","Chưa chọn giá trị"):(s||l||!c)&&e("#page .form-search").trigger("submit")}),e(".reset-all-value").on("click",function(n){n.preventDefault();let s=a(!1),l=t(!1),c=r(!1),u=i(!1),d=o("bedroom"),f=o("toilet"),g=o("house-direction");!s&&!l&&!c&&!u&&!d&&!f&&!g?fireToast("info","Trống","Bạn chưa nhập hay chọn thông tin tìm kiếm"):(s||l||c||u||d||f||g)&&(e("#home").length>0?fireToast("info","Đã đặt lại","Đã đặt lại giá trị về ban đầu"):(fireToast("info","Đã đặt lại","Đã đặt lại giá trị về ban đầu"),e("#page .form-search").trigger("submit")))})}function j(){let a=()=>e('input[name="location"]').length>0||e(".item-checkbox:checked").length>0||e('input[name="keyword"]').val()!==""||e('input[name="price-range"]').length>0||e('input[name="area-range"]').length>0||e('input[name="toilet[]"]').length>0||e('input[name="bedroom[]"]').length>0||e('input[name="home-direction[]"]').length>0;e("#homepage #btn-submit").on("click",function(t){t.preventDefault(),a()===!0?e("#homepage .form-search").trigger("submit"):fireToast("info","Thất bại","Bạn cần nhập hoặc chọn một thông tin để tìm kiếm")})}e(document).ready(function(){j(),T(),C(),D(),$(),F(),b(),v(),P()});function L(){let a=()=>{e(".li-province-new").each(function(){let t=e(this).attr("data-province-name");e('input[name="location"]').length>0&&e('input[name="location"]').val()===t&&e(this).addClass("text-[#DC2D27]")})};e(".load-more-provinces").on("click",function(t){t.preventDefault();let r=e(this);e(this).attr("data-status")==="true"?e.ajax({url:e(this).attr("data-url"),method:"GET",success:function(o){const n=e(".li-province-current").last();let s=o.data;console.log(s);let l="";s.forEach(function(c){l+=`<li class="li-province-new choose-province px-8 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-3 cursor-pointer"
                        data-province-name = "${c.province_full_name}" data-real-estate-type="${c.real_estate_type}">
                                    ${c.province_name} <span>${"("+c.quantity_posts+")"}</span>
                                </li>`}),e(".li-province-new").remove(),n.after(l),a(),b(),r.html(`Thu gọn<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);">
                                    <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>`),r.attr("data-status","false")},error:function(o){console.log(o.message)}}):(e(".li-province-new").remove(),r.html(`Xem thêm
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>`),r.attr("data-status","true"))})}function B(){e(".show-phone-number").on("click",function(a){a.preventDefault();const t=e(this).attr("data-post-id");e.ajax({url:e(this).attr("data-url"),method:"GET",data:{post_id:t},success:function(r){let i=r.data;e(`.masked-phone-number-${t}`).text(i);var o=document.createElement("input");o.setAttribute("value",i),document.body.appendChild(o),o.select(),document.execCommand("copy"),document.body.removeChild(o),fireToast("success","Thành công","Đã copy")},error:function(r){fireToast("error","Lỗi",r.message)}})})}function E(){e("#post-details .load-more-wards").on("click",function(a){a.preventDefault();let t=e(this);const r=e(this).attr("data-province-name"),i=e(this).attr("data-district-name");e(this).attr("data-status")==="true"?e.ajax({url:e(this).attr("data-url"),method:"GET",success:function(o){const n=o.data;let s="";n.forEach(function(c){s+=`<tr class="border-t border-b more-data-ward choose-ward hover:bg-[#FFD8C2] hover:text-[#74150F] cursor-pointer  
                                    {{ $post->ward->name === ${c.ward_name} ? 'bg-[#FFD8C2] text-[#74150F]' : '' }}" 
                                    data-district-name="${i}" 
                                    data-province-name="${r}" 
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
                                </tr>`}),e("#post-details .data-ward-current").last().after(s),t.text("Thu gọn"),v(),t.attr("data-status","false")},error:function(o){fireToast("error","Lỗi",o.message)}}):(e("#post-details .more-data-ward").length&&e("#post-details .more-data-ward").remove(),t.text("Xem thêm"),t.attr("data-status","true"))})}function M(){const a=e('meta[name="csrf-token"]').attr("content"),t=e(".add-to-favorite").attr("data-post-id"),r=e(".add-to-favorite").attr("data-url");e(".add-to-favorite").on("click",function(i){i.preventDefault(),e.ajax({url:r,method:"POST",data:{post_id:t,_token:a},success:function(o){fireToast("success","Yêu thích","Đã yêu thích")},error:function(o){fireToast("info","Không thành công","Chưa thêm vào yêu thích")}})})}function S(){e(".dropdown-toggle").on("click",function(a){a.preventDefault();let t=e(this).next(".dropdown-box");e(".dropdown-box").not(t).addClass("hidden"),t.toggleClass("hidden")})}e(document).ready(function(){L(),E(),B(),M(),S()});function A(){e(".choose-keyword").on("click",function(){const a=e(this).attr("data-category-name").trim(),t=e(this).text().trim();let r=`/${a}/tim-kiem`;e(".form-search").prop("action",r),e('input[name="keyword"]').length?e('input[name="keyword"]').val(t):e(".form-search").append(`<input type="hidden" value="${t}" name="keyword"> `),e(".form-search").trigger("submit")})}e(document).ready(function(){A()});function G(){const a=e("#create-post-page #post-form"),t=e('meta[name="csrf-token"]').attr("content");e("#create-post-page #submit-form").on("click",function(r){r.preventDefault();var i=k(),o=i.form();o===!0?e.ajax({url:a.attr("data-ajax"),method:a.attr("data-method"),data:{..._(),_token:t},success:function(n){fireToast("success","Thành công",n.message),window.location.href="/"},error:function(n){n.status===422?fireToast("error","Lỗi","Vui lòng nhập đầy đủ thông tin"):fireToast("error","Lỗi",n.message)}}):i.showErrors()})}e(document).ready(function(){G()});
