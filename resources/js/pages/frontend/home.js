import $ from 'jquery'
import { handleCheckedOnChooseItem } from '../common'
import { activeChoosed } from '../common'

function onChooseCategory(){
    $('#homepage .choose-category').on('click', function(){
        activeChoosed($(this), '#homepage .choose-category', 'bg-[8f8f8f]', 'bg-black font-bold')
        let category_id = $(this).attr('data-id');
        let category_name = $(this).text().trim();
        let url = `/${category_name}/tim-kiem` 
        $('#homepage .form-search').attr('action', url);
        console.log(url);
        $.ajax({
            url: $(this).attr('data-url'),
            method: 'GET', 
            data:{
                'category_id': category_id,
            },
            success: function(response){
                let data = response.data;
                let html = `<div class="flex items-center justify-between">
                                <label for="all-real-estate-type" class="text-black w-full">Tất cả loại nhà đất</label>
                                <input type="checkbox" id="all-real-estate-type" value="Tất cả lại nhà đất" class="checked-item-all w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>`;
                if(data !== null){
                    data.forEach(item => {
                        html += `<div class="flex items-center justify-between">
                                    <label for="real-estate-type-${item.id}" class="text-black w-full">${item.name}</label>
                                    <input type="checkbox" id="real-estate-type-${item.id}" name="real-estate-type[]" value="${item.id}" class="item-checkbox w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                                </div>`  
                    });
                }else{
                    html = `<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">Trống!</span> Chưa có dữ liệu về danh mục này. 
                            </div>`
                }
                $('#homepage #list-real-estate-type-checkbox').html(html);
                handleCheckedOnChooseItem()
            },
            error: function(error){
                console.log(error.message);
            }
        })
    })
}

function loadMorePosts() {
    $('#homepage .load-more-posts').on('click', function(){
        let category_id = $(this).attr('data-category-id');
        let category_name = $(this).attr('data-category-name');
        let check = $(this).attr('data-check');
        let seft  = $(this);
        if ($(this).attr('data-check') === 'true') {
            window.location.href = seft.attr('data-url');
            seft.attr('data-check', 'false');
        } else {
            $.ajax({
                url: $(this).attr('data-url'),
                type: 'GET',
                data: {
                    category_id:  category_id,
                },
                success: function (response) {
                    if(response.message){
                        fireToast('warning', 'Cảnh báo', response.message);
                    }else{
                        $('#list-more-post-container-'+category_id).html(response);
                        seft.text('Xem tiếp');
                        seft.attr('data-url', '/'+category_name);
                        seft.attr('data-check', 'true');
                    }
                },
                error: function (error) {
                    console.log(error.message);
                }
            });
        }
    })
}

$(document).ready(function(){
    handleCheckedOnChooseItem()
    onChooseCategory()
    loadMorePosts()
})