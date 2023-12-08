import $, { post, toast } from 'jquery'
import { round } from 'lodash';

import { validateForm, inputPostsData } from '../../../common/posts'

function inputNewsData(){
    let post = {}
    post['category_id'] = $('#create-post-page .choose-category').attr('data-category-id');  
    post['province_id'] = 0
    post['district_id'] = 0
    post['ward_id'] = 0
    post['type'] = 0;
    post['vip'] = 0;                                          
    post['title'] = $('input[name="title"]').val();     
    post['description'] = $('textarea[name="description"]').val();
    post['short_description'] = $('textarea[name="short_description"]').val();  
    post['price'] = 0   
    post['area'] = 0 
    post['sub_price'] = 0;
    post['status'] = 1;
    post['images'] = [];
    $('input[name="images[]"]').each(function(index, element){
        post['images'].push($(this).val());
    })
    post['floors'] = 0;                                                    
    post['bedroom'] = 0;                                              
    post['toilet'] = 0;                                            
    post['legal_documents'] = '';   
    post['other_properties'] = [];
    post['real_estate_type'] = 0;
    post['tags'] = [];
    let tags = $('#tags').find('option:selected');
    tags.each(function() {
        post['tags'].push($(this).val());
    });
    return post;                                       
}



function handleForm() {
    const post_form = $("#create-post-page #post-form");
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    let handleAjax = (data, type) => {
        let validator = validateForm();
        let isFormValid = validator.form();
        // if(isFormValid === true){
            $.ajax({
                url: post_form.attr('data-ajax'),
                method: post_form.attr('data-method'),
                data: {
                    data,
                    _token: csrfToken
                },
                success: function (response) {
                    fireToast('success', 'Thành công', response.message);
                    window.location.href = '/admin/'+ type
                },
                error: function (error) {
                    if (error.status === 422) {
                        fireToast('error', 'Lỗi', 'Vui lòng nhập đầy đủ thông tin');
                    } else {
                        fireToast('error', 'Lỗi', error.message);
                    }
                }
            });
        // }else{
        //     validator.showErrors();
        // }
    }
    $("#create-post-page #submit-form").on('click', function (e) {
        e.preventDefault();
        if(post_form.attr('data-type') === 'posts'){
            handleAjax(...inputPostsData(), post_form.attr('data-type'))
        }
        handleAjax(inputNewsData(), post_form.attr('data-type'))
    });
}

$(document).ready(function(){
    handleForm()

})