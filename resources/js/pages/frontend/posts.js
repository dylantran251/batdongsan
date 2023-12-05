import $, { post, toast } from 'jquery'
import { round } from 'lodash';
import { validators } from 'validate.js';
import validate from 'jquery-validation'
import { activeChoosed } from '../common'
import { dropzone } from '../../components/dropzone';
import { onChooseLegalDocuments, onChooseInterior, onButtonAddOtherProperties } from '../common'

function onChooseCategory(){
    $('#create-post-page .choose-category').on('click', function(){
        const old_class = 'text-gray-500 bg-white';
        const active_class = 'bg-gray-500 text-white';
        activeChoosed($(this), '#create-post-page .choose-category', old_class, active_class)
        let category_id = $(this).attr('data-category-id');
        $.ajax({
            url: $(this).attr('data-url'),
            method: 'GET', 
            data:{
                'category_id': category_id,
            },
            success: function(response){
                let data = response.data;
                let html = `<option selected disabled>Loại bất động sản</option>`;
                data.forEach(item => {
                    html += `<option value=${item.id} >${item.name}</option>`  
                });
                $('#create-post-page #real-estate-types').html(html);
                console.log(data);
                
            },
            error: function(error){
                console.log(error.message);
            }
        })
    })
}

function onSelectedPriceStyle(){
    $('#create-post-page #price-style').on('change', function(){
        if($(this).val() === "0"){
            $('input[name="price"]').val('Thỏa thuận');
            $('input[name="price"]').prop('readonly', true);
        }else{
            $('input[name="price"]').val('');
            $('input[name="price"]').prop('readonly', false);
        }
    })
}

function onChangeNumber(attribute){
    let increase = () => {
        $(`.increase-${attribute}`).on('click', function(e){
            e.preventDefault();
            let value = parseInt($(`input[name="${attribute}"]`).val());
            value = isNaN(value) ? value = 1 : value + 1;
            $(`input[name="${attribute}"]`).val(value)
        })
    }
    let decrease = () => {
        $(`.decrease-${attribute}`).on('click', function(e){
            e.preventDefault();
            let value = parseInt($(`input[name="${attribute}"]`).val());
            value = isNaN(value) || value === 0 ? value = 1 : value - 1;
            $(`input[name="${attribute}"]`).val(value);
        })
    }
    increase();
    decrease();
}

function validateForm() {
    const message_required = 'Vui lòng nhập thông tin này'
    return $('#create-post-page #post-form').validate({
        rules: {
            'title': { required: true, minlength: 30, maxlength: 100 },
            'description': { required: true, minlength: 30, maxlength: 3000},
            'price': { required: true } ,
            'province': { required: true },
            'district': { required: true } ,
            'ward': { required: true } ,
            'area': { required: true } ,
            'images': { required: true } ,
            // 'floors': { required: true } ,
            // 'bedroom': { required: true } ,
            // 'toilet': { required: true } ,
            'legal_documents': { required: true } ,
            'real-estate-types' : { required: true }
            // tags
        },
        messages: {
            'title': {
                required: message_required,
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 100 kí tự'
            },
            'description': {
                required: message_required,
                minlength: 'Cần nhập ít nhất 30 kí tự',
                maxlength: 'Tối đa là 3000 kí tự'
            },
            'price': { required: message_required } ,
            'province': { required: message_required } ,
            'district': { required: message_required } ,
            'ward': { required: message_required } ,
            'area': { required: message_required } ,
            'images': { required: message_required } ,
            'floors': { required: message_required } ,
            'bedroom': { required: message_required } ,
            'toilet': { required: message_required } ,
            'legal_documents': { required: message_required } ,
            'real-estate-types': { required: message_required }
        },
        errorPlacement: function(error, element) {
            // Tìm id của thẻ span dựa trên id của trường input
            let errorId = element.attr('id') + '-error';
            console.log(errorId)
            $('#' + errorId).html(error.text());
            $('#' + errorId).addClass('text-red-600 text-sm')
        },
        success: function(label, element) {
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
    post['category_id'] = $('#create-post-page .choose-category').attr('data-category-id');  
    post['province_id'] = $('select[name="province"]').val();
    post['district_id'] = $('select[name="district"]').val();
    post['ward_id'] = $('select[name="ward"]').val();
    post['type'] = 1;
    post['vip'] = 0;                                          
    post['title'] = $('input[name="title"]').val();     
    post['description'] = $('textarea[name="description"]').val();
    post['short_description'] = '';  
    post['price'] = ($('input[name="price"]').val()).replace(/\./g, '');   
    post['area'] = $('input[name="area"]').val(); 
    post['sub_price'] = 0;
    if(post['price'] !== null && post['area'] !== null){
        post.sub_price = round(post['price']/post['area'])
    }   
    post['status'] = 1;
    post['images'] = [];
    $('input[name="images[]"]').each(function(index, element){
        post['images'].push($(this).val());
    })
    post['floors'] = $('input[name="floors"]').val();                                                    
    post['bedroom'] = $('input[name="bedroom"]').val();                                              
    post['toilet'] = $('input[name="toilet"]').val();                                            
    post['house_direction'] = '';
    if ($('#house-direction option:selected').length) {
        post['house_direction'] = $('#house-direction option:selected').val();
    }
    post['balcony_direction'] = '';
    if ($('#balcony-direction option:selected').length) {
        post['house_dbalcony_directionirection'] = $('#balcony-direction option:selected').val();
    }
    post['legal_documents'] = $('input[name="legal_documents"]').val();   
    post['other_properties'] = [];
    const other_properties = $('input[name="other_properties[]"]');
    other_properties.each(function(){
        post['other_properties'].push($(this).val());
    })
    post['real_estate_type'] = $('select[name="real-estate-types"]').val();

 
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
                    ...dataInput(),
                    _token: csrfToken
                },
                success: function (response) {
                    fireToast('success', 'Thành công', response.message);
                    console.log(response.data);
                    window.location.href = '/'
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

    onChangeNumber('floors')
    onChangeNumber('toilet')
    onChangeNumber('bedroom')

    onChooseLegalDocuments()
    onChooseInterior()
    onButtonAddOtherProperties()

    onChooseCategory()
    onSelectedPriceStyle()
    handleForm()
    dropzone()
})