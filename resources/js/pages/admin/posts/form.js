import $, { post, toast } from 'jquery'
import { round } from 'lodash';
import { validators } from 'validate.js';
// import validate from 'validate.js';
import validate from 'jquery-validation'
function validateForm() {
    return $('#postFormAdmin').validate({
        rules: {
            'title': {
                required: true,
                minlength: 30,
                maxlength: 100
            },
            'description': {
                required: true,
                minlength: 30,
                maxlength: 3000
            },
            'price': {
                required: true,
            } ,
            'provinces': {
                required: true,
            } ,
            'districts': {
                required: true,
            } ,
            'wards': {
                required: true,
            } ,
            'area': {
                required: true,
            } ,
            'images': {
                required: true,
            } ,
            'floors': {
                required: true,
                min: 1
            } ,
            'bedroom': {
                required: true,
            } ,
            'toilet': {
                required: true,
                min: 1
            } ,
            'legal_documents': {
                required: true,
            } ,
        },
        messages: {
            'title': {
                required: 'Vui lòng nhập thông tin này',
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 100 kí tự'
            },
            'description': {
                required: 'Vui lòng nhập thông tin này',
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 3000 kí tự'
            },
            'price': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'provinces': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'districts': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'wards': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'area': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'images': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'floors': {
                required: 'Vui lòng nhập thông tin này',
                min: 'Không thể nhỏ hơn 1'
            } ,
            'bedroom': {
                required: 'Vui lòng nhập thông tin này',
            } ,
            'toilet': {
                required: 'Vui lòng nhập thông tin này',
                min: 'Không thể nhỏ hơn 1'
            } ,
            'legal_documents': {
                required: 'Vui lòng nhập thông tin này',
            } ,
        },
        errorPlacement: function(error, element) {
            // Tìm id của thẻ span dựa trên id của trường input
            let errorId = element.attr('id') + '-error';
            $('#' + errorId).html(error.text());
            $('#' + errorId).addClass('text-red-500 text-[16px]')
        },
        success: function(label, element) {
            // Ẩn thông báo lỗi khi không có lỗi và form đã được submit
            let errorId = $(element).attr('id') + '-error';
            $('#' + errorId).html('');
        }
    });
}

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

function dataInput(){
    let post = {}
    post['vip'] = 0;                                       
    post['title'] = $('input[name="title"]').val();                             
    post['description'] = $('textarea[name="description"]').val();
    post['short_description'] = $('textarea[name="short_description"]').val();  
    post['sub_price'] = 0;   
    post['images'] = [];
    $('input[name="images[]"]').each(function(index, element){
        post['images'].push($(this).val());
    })
    post['status'] = 1; 
    post['tags'] = [];
    let tags = $('#tags').find('option:selected');
    tags.each(function() {
        post['tags'].push($(this).val());
    });

    if($('#postFormAdmin').attr('data-type') == 1){
        post['type'] = 1; 
        post['category_id'] = $('input[name="category"]').val();  
        post['price'] = ($('input[name="price"]').val()).replace(/\./g, '');                                                                     
        post['location'] = $('input[name="location"]').val();                                        
        post['area'] = $('input[name="area"]').val();  
        if(post['price'] !== null && post['area'] !== null){
            post.sub_price = round(post['price']/post['area'])
        }                                                                         
        post['floors'] = $('input[name="floors"]').val();                                                    
        post['bedroom'] = $('input[name="bedroom"]').val();                                              
        post['toilet'] = $('input[name="toilet"]').val();                                            
        post['legal_documents'] = $('input[name="legal_documents"]').val();                     
        post['other_properties'] = [];
        const other_properties = $('input[name="other_properties[]"]');
        other_properties.each(function(){
            post['other_properties'].push($(this).val());
        })
        post['real_estate_type'] = $('select[name="real-estate-types"]').val();
        post['province_id'] = $('#province').val();
        post['district_id'] = $('#district').val();
        post['ward_id'] = $('#district').val();
    }else{
        let value = 0;
        post['category_id'] = 0;
        post['type'] = value; 
        post['price'] = value;                                                                     
        post['location'] = 'Không';                                        
        post['area'] = value;                                                                          
        post['floors'] = value;                                                    
        post['bedroom'] = value;                                              
        post['toilet'] = value;                                            
        post['legal_documents'] = 'Không';                     
        post['real_estate_type'] = 0;
    }  
    return post;                                       
}

function handleForm() {
    const postForm = $("#postFormAdmin");
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    $("#buttonSubmitPostFormAdmin").on('click', function (e) {
        e.preventDefault();
        var validator = validateForm();
        var isFormValid = validator.form();
        if(isFormValid === true){
            console.log(postForm.attr('data-ajax'), postForm.attr('data-method'))
            $.ajax({
                url: postForm.attr('data-ajax'),
                method: postForm.attr('data-method'),
                data: {
                    ...dataInput(),
                    _token: csrfToken
                },
                success: function (response) {
                    fireToast('success', 'Thành công', response.message);
                    window.location.href = '/admin/posts?type=' + $('#postFormAdmin').attr('data-type');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        fireToast('error', 'Lỗi', 'Vui lòng nhập đầy đủ thông tin');
                    } else {
                        fireToast('error', 'Lỗi', 'Có lỗi xảy ra. Đăng tin thất bại!');
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