import $ from 'jquery'
import { round } from 'lodash';
import { activeChoosed } from '../pages/common';
import { validators } from 'validate.js';
// import validate from 'validate.js';
import validate from 'jquery-validation'
function onChooseLegalDocuments(){
    let onChoose = () => {
        $('.button-choose-legal-documents').on('click', function () {
            $('.button-choose-legal-documents').removeClass('bg-red-500 text-white');
            $(this).addClass('bg-red-500 text-white');
            var selectedText = $(this).text().trim();
            $('#legal_documents').val(selectedText);
        });
    } 
    onChoose();
    $('#buttonToggleModalLegalDocuments').on('click', function(){
        $('#modalAddChoose').removeClass('hidden');
        $('#inputModal').val('');
        $('#titleModal').text('Thêm giấy tờ pháp lý')
        $('label[for="inputModal"]').html('Giấy tờ pháp lý<span class="text-red-500">*</span>')
        $('#buttonSubmitModal').attr('data-option-type', 'legal_documents');
        if($('#action-container').hasClass('sticky')) {
            $('#action-container').removeClass('sticky');
        };
    })
    $('#closeModal').on('click', function(){
        $('#modalAddChoose').addClass('hidden');
    })
    $('#buttonSubmitModal').on('click', function(){
        if($('#buttonSubmitModal').attr('data-option-type') === 'legal_documents'){
            if($('#inputModal').val() === ''){
                if (!$('#errorSpan').length) {
                    $('#inputModal').after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');
                }
            } else {
                $('#errorSpan').remove();
                let value = $('#inputModal').val();
                $('.button-choose-legal-documents').removeClass('bg-red-500 text-white');
                $('#buttonToggleModalLegalDocuments').before(`<button type="button" class="button-choose-legal-documents text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white rounded-full text-base px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${value}
                                                            </button>`);
                $('#legal_documents').val(value);
                $('#modalAddChoose').addClass('hidden');
                onChoose();
                $('#action-container').addClass('sticky');
            }
        }
        
    });
}

function onChooseInterior(){
    let onChoose = () => {
        $('.button-choose-interior').on('click', function () {
            $('.button-choose-interior').removeClass('bg-red-500 text-white');
            $(this).addClass('bg-red-500 text-white');
            var selectedText = $(this).text().trim();
            $('#interior').val(selectedText);
        });
    }
    onChoose();
    $('#buttonToggleModalInterior').on('click', function(){
        $('#modalAddChoose').removeClass('hidden');
        $('#inputModal').val('');
        $('#titleModal').text('Thêm trang bị nội thất')
        $('label[for="inputModal"]').html('Nội thất<span class="text-red-500">*</span>')
        $('#buttonSubmitModal').attr('data-option-type', 'interior');
        if($('#action-container').hasClass('sticky')) {
            $('#action-container').removeClass('sticky');
        };
    })
    $('#closeModal').on('click', function(){
        $('#modalAddChoose').addClass('hidden');
    })
    $('#buttonSubmitModal').on('click', function(){
        if($('#buttonSubmitModal').attr('data-option-type') === 'interior'){
            if($('#inputModal').val() === ''){
                if (!$('#errorSpan').length) {
                    $('#inputModal').after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');
                }
            } else {
                $('#errorSpan').remove();
                let value = $('#inputModal').val();
                $('.button-choose-interior').removeClass('bg-red-500 text-white');
                $('#buttonToggleModalInterior').before(`<button type="button" class="button-choose-interior text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white text-base rounded-full font-lg px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${value}
                                                            </button>`);
                $('#interior').val(value);
                $('#modalAddChoose').addClass('hidden');
                onChoose();
                $('#action-container').addClass('sticky');
            }
        }
    })
}

function onButtonAddOtherProperties(){
    $('#button-add-other-properties').on('click', function(){
        $('#modalAddChoose').removeClass('hidden');
        $('#inputModal').val('');
        $('#titleModal').text('Thông tin khác')
        $('label[for="inputModal"]').html('Thông tin<span class="text-red-500">*</span>')
        $('#buttonSubmitModal').attr('data-option-type', 'other_properties');
        if($('#action-container').hasClass('sticky')) {
            $('#action-container').removeClass('sticky');
        };
    })
    $('#closeModal').on('click', function(){
        $('#modalAddChoose').addClass('hidden');
    })
    $('#buttonSubmitModal').on('click', function(){
        if($('#buttonSubmitModal').attr('data-option-type') === 'other_properties'){
            if($('#inputModal').val() === ''){
                if (!$('#errorSpan').length) {
                    $('#inputModal').after('<span id="errorSpan" class="text-red-500">Vui lòng nhập thông tin</span>');
                }
            } else {
                $('#errorSpan').remove();
                let value = $('#inputModal').val();

                $('#other_properties').after(`<div class="flex mt-4">
                                                <input type="text" value="${value}" name="other_properties[]" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-lg border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <button type="button" class="inline-flex items-center px-3 text-lg text-gray-900 bg-gray-200 border rounded-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                 <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </div>`);
                $('#interior').val(value);
                $('#modalAddChoose').addClass('hidden');
                onChoose();
                $('#action-container').addClass('sticky');
            }
        }
    })
}

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
            },
            error: function(error){
                console.log(error.message);
            }
        })
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

export function validateForm() {
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

export function inputPostsData(){
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

$(document).ready(function(){
    onChooseLegalDocuments()
    onChooseInterior()
    onButtonAddOtherProperties()
    onChooseCategory()
    onChangeNumber('floors')
    onChangeNumber('toilet')
    onChangeNumber('bedroom')
    onSelectedPriceStyle()
})