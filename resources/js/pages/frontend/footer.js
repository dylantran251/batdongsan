import $ from 'jquery'

function onChooseKeyword(){
    $('.choose-keyword').on('click', function(){
        const category_name = $(this).attr('data-category-name').trim();
        const tag_name = $(this).text().trim();
        let url = `/${category_name}/tim-kiem`
        $('.form-search').prop('action', url);
        if($('input[name="keyword"]').length){
            $('input[name="keyword"]').val(tag_name);
        }else{
            $('.form-search').append(`<input type="text" value="${tag_name}" name="keyword"> `)
        }
        $('.form-search').trigger('submit');
    })
}

$(document).ready(function(){{
    onChooseKeyword()
}})