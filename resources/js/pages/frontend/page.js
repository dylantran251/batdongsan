import $, { post } from 'jquery'
import { onChooseProvince } from './search'
import { onChooseWardToPostDetailsPage } from './search'

function loadMoreProvinces() {
    let selected = () => {
        $('.li-province-new').each(function(){
            let province_name = $(this).attr('data-province-name');
            if($('input[name="location"]').length > 0 && $('input[name="location"]').val() === province_name){
                $(this).addClass('text-[#DC2D27]')
            }
        })
    }
    $('.load-more-provinces').on('click', function(e){
        e.preventDefault();
        let button = $(this);
        let is_status = $(this).attr('data-status')
        if(is_status === "true"){
            $.ajax({
                url: $(this).attr('data-url'),
                method: 'GET',
                success: function (response) {
                    const liCurrent = $(".li-province-current").last();
                    let data = response.data;
                    let html = '';
                    // Sử dụng forEach để lặp qua mảng data
                    data.forEach(function (item) {
                        html += `<li class="li-province-new choose-province px-8 hover:bg-gray-100 hover:text-[#DC2D27] w-full py-3 cursor-pointer"
                        data-province-name = "${item.province_full_name}" data-real-estate-type="${item.real_estate_type}">
                                    ${ item.province_name } <span>${"(" + item.quantity_posts + ")" }</span>
                                </li>`;
                    });
                    // Xóa các li-province-new trước khi thêm mới
                    $(".li-province-new").remove();
                    liCurrent.after(html);
                    selected();
                    onChooseProvince()
                    button.html(`Thu gọn<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);">
                                    <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>`) ;
                    button.attr('data-status', 'false');
                     
                },
                error: function (error) {
                    console.log(error.error);
                }
            })
        }else{
            // Xóa tất cả các li-province-new khi thu gọn
            $(".li-province-new").remove();
            button.html(`Xem thêm
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33325 7.5L9.99992 14.1667L16.6666 7.5" stroke="#DC2D27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>`);
            button.attr('data-status', "true");
        }
    })
}


function showPhoneNumber(){
    $('.show-phone-number').on('click', function(e){
        e.preventDefault();
        const post_id = $(this).attr('data-post-id');
        $.ajax({
            url: $(this).attr('data-url'),
            method: 'GET',
            data: {
                post_id: post_id,
            },
            success: function(response){
                let phone = response.data;
                $(`.masked-phone-number-${post_id}`).text(phone);
                var input = document.createElement('input');
                input.setAttribute('value', phone);
                document.body.appendChild(input);

                input.select();
                document.execCommand('copy');
                document.body.removeChild(input);
    
                fireToast('success', 'Thành công', 'Đã copy');
            },
            error: function(error){
                fireToast('error', 'Lỗi', error.message)
            }
        })
    })
}

function loadMoreWardsData(){
    $('#post-details .load-more-wards').on('click', function(e){
        e.preventDefault();
        let button = $(this);
        const province_name = $(this).attr('data-province-name');
        const district_name = $(this).attr('data-district-name');
        if($(this).attr('data-status') === 'true'){
            $.ajax({
                url: $(this).attr('data-url'),
                method: 'GET',
                success: function(response){
                    const data = response.data;
                    let html = '';
                    data.forEach(function(item) {
                        html += `<tr class="border-t border-b more-data-ward choose-ward hover:bg-[#FFD8C2] hover:text-[#74150F] cursor-pointer  
                                    {{ $post->ward->name === ${item.ward_name} ? 'bg-[#FFD8C2] text-[#74150F]' : '' }}" 
                                    data-district-name="${ district_name }" 
                                    data-province-name="${ province_name }" 
                                    data-ward-name="${ item.ward_name }" 
                                    data-real-estate-type="{{ $post->real_estate_type }}">
                                    <td class="py-3 px-4">${item.ward_name}</td>
                                    <td class="py-3 px-4">
                                        ${item.sub_price_average === 'Chưa có dữ liệu' ? item.sub_price_average : item.sub_price_average + '/m&sup2;'}
                                    </td>
                                    <td class="py-3 px-4 text-end">
                                        <a href="#" class="flex items-center justify-end">
                                            ${item.quantity_posts} tin bán 
                                            <span class="pl-4">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 6L15 12L9 18" stroke="#828282"/>
                                                </svg>  
                                            </span>
                                        </a>
                                    </td>
                                </tr>`;
                    });
                    const tr_data_ward_current_last = $('#post-details .data-ward-current').last();
                    tr_data_ward_current_last.after(html);
                    button.text('Thu gọn');
                    onChooseWardToPostDetailsPage();   
                    button.attr('data-status', "false");
                },
                error: function(error){
                    fireToast('error', 'Lỗi', error.message);
                }
            })
        }else{
            if($('#post-details .more-data-ward').length) $('#post-details .more-data-ward').remove();
            button.text('Xem thêm');
            button.attr('data-status', "true");
        }

    })
}

function onAddPostToFavorite(){
    const csrf_token = $('meta[name="csrf-token"]').attr('content');  
    const post_id = $('.add-to-favorite').attr('data-post-id');
    const url = $('.add-to-favorite').attr('data-url');
    $('.add-to-favorite').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: url,
            method: 'POST', 
            data:{
                post_id : post_id,
                _token: csrf_token
            },
            success: function(response){
                fireToast('success', 'Yêu thích', 'Đã yêu thích');
            },
            error: function(error){
                fireToast('info', 'Không thành công', 'Chưa thêm vào yêu thích');
            }
        })
    })
}

function onToggleDropdown(){
    $('.dropdown-toggle').on('click', function(e) {
        e.preventDefault();
        let dropdown = $(this).next('.dropdown-box');
        $('.dropdown-box').not(dropdown).addClass('hidden');
        // Hiển thị hoặc ẩn dropdown
        dropdown.toggleClass('hidden');
    });
}

$(document).ready(function(){
    loadMoreProvinces()
    loadMoreWardsData()
    showPhoneNumber()
    onAddPostToFavorite()
    onToggleDropdown()
})