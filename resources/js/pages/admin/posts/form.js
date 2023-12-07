import $, { post, toast } from 'jquery'
import { round } from 'lodash';

import { validateForm, inputPostsData } from '../../../common/posts'


function resetInput() {
    post['category_id'] = $('input[name="category"]').val();
    post['title'] = $('input[name="title"]').val();
    post['description'] = $('textarea[name="description"]').val();
    post['short_description'] = $('textarea[name="short_description"]').val();
    post['price'] = $('input[name="price"]').val();
    post['location'] = $('input[name="location"]').val();
    post['area'] = $('input[name="area"]').val();
    post['sub_price'] = 0;

    if (post['price'] !== null && post['area'] !== null) {
        post.sub_price = parseFloat((post['price'] / post['area']).toFixed(2));
    }

    post['images'] = [];
    $('input[name="images[]"]').each(function (index, element) {
        post['images'].push($(this).val());
    });

    post['floors'] = $('input[name="floors"]').val();
    post['bedroom'] = $('input[name="bedroom"]').val();
    post['toilet'] = $('input[name="toilet"]').val();

    post['legal_documents'] = $('input[name="legal_documents"]').val();

    post['other_properties'] = [];
    const other_properties = $('input[name="other_properties[]"]');
    other_properties.each(function () {
        post['other_properties'].push($(this).val());
    });

    post['tags'] = [];
    let tags = $('#tags').find('option:selected');
    tags.each(function () {
        post['tags'].push($(this).val());
    });

    post['real_estate_types'] = [];
    const types = $('input[name="real-estate-types[]"]:checked');
    types.each(function () {
        post['real_estate_types'].push($(this).val());
    });
}

// function dataInput(){
//     let post = {}
//     post['vip'] = 0;                                       
//     post['title'] = $('input[name="title"]').val();                             
//     post['description'] = $('textarea[name="description"]').val();
//     post['short_description'] = $('textarea[name="short_description"]').val();  
//     post['sub_price'] = 0;   
//     post['images'] = [];
//     $('input[name="images[]"]').each(function(index, element){
//         post['images'].push($(this).val());
//     })
//     post['status'] = 1; 
//     post['tags'] = [];
//     let tags = $('#tags').find('option:selected');
//     tags.each(function() {
//         post['tags'].push($(this).val());
//     });

//     if($('#postFormAdmin').attr('data-type') == 1){
//         post['type'] = 1; 
//         post['category_id'] = $('input[name="category"]').val();  
//         post['price'] = ($('input[name="price"]').val()).replace(/\./g, '');                                                                     
//         post['location'] = $('input[name="location"]').val();                                        
//         post['area'] = $('input[name="area"]').val();  
//         if(post['price'] !== null && post['area'] !== null){
//             post.sub_price = round(post['price']/post['area'])
//         }                                                                         
//         post['floors'] = $('input[name="floors"]').val();                                                    
//         post['bedroom'] = $('input[name="bedroom"]').val();                                              
//         post['toilet'] = $('input[name="toilet"]').val();                                            
//         post['legal_documents'] = $('input[name="legal_documents"]').val();                     
//         post['other_properties'] = [];
//         const other_properties = $('input[name="other_properties[]"]');
//         other_properties.each(function(){
//             post['other_properties'].push($(this).val());
//         })
//         post['real_estate_type'] = $('select[name="real-estate-types"]').val();
//         post['province_id'] = $('#province').val();
//         post['district_id'] = $('#district').val();
//         post['ward_id'] = $('#district').val();
//     }else{
//         let value = 0;
//         post['category_id'] = 0;
//         post['type'] = value; 
//         post['price'] = value;                                                                     
//         post['location'] = 'Không';                                        
//         post['area'] = value;                                                                          
//         post['floors'] = value;                                                    
//         post['bedroom'] = value;                                              
//         post['toilet'] = value;                                            
//         post['legal_documents'] = 'Không';                     
//         post['real_estate_type'] = 0;
//     }  
//     return post;                                       
// }

export function inputNewsData(){
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
    $("#create-post-page #submit-form").on('click', function (e) {
        e.preventDefault();
        var validator = validateForm();
        var isFormValid = validator.form();
        if(isFormValid === true){
            $.ajax({
                url: post_form.attr('data-ajax'),
                method: post_form.attr('data-method'),
                data: {
                    ...inputPostsData(),
                    _token: csrfToken
                },
                success: function (response) {
                    fireToast('success', 'Thành công', response.message);
        
                    window.location.href = '/admin/posts/'
                },
                error: function (error) {
                    if (error.status === 422) {
                        fireToast('error', 'Lỗi', 'Vui lòng nhập đầy đủ thông tin');
                    } else {
                        fireToast('error', 'Lỗi', error.message);
                    }
                }
            });
        }else{
            validator.showErrors();
        }
    });
}

$(document).ready(function(){
    handleForm()

})