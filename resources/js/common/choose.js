import $, { data } from 'jquery'
import { html } from 'js-beautify';
import { forEach, functionsIn } from 'lodash';
import TomSelect from 'tom-select';

function onChooseCategory(){
    $('.button-choose-category').on('click', function(){
        $('.button-choose-category').removeClass('text-white bg-red-500');
        $(this).addClass('text-white bg-red-500');
        $('input[name="category"]').val($(this).attr('data-id'));
        getRealEstateTypesByCategory($(this).attr('data-id'));
    })
}

function getRealEstateTypesByCategory(id){
    $.ajax({
        url: '/admin/categories/get-real-estate-types?type=1&category=' + id,
        method: 'GET',
        success: function(response){
            console.log(response.data)
            let real_estate_types = response.data;
            let html = '<option disabled selected>Loại nhà đất</option>';
            if(real_estate_types.length === 0){
                html = '<option disabled selected>Loại nhà đất</option>'
                fireToast('error',"Lỗi", "Không tìm thấy mục loại nhà đất nào!" );
            }else{
                real_estate_types.forEach(type => {
                    html += `<option value = "${type.id}">${type.name}</option> `
                });
            }
            $("#real-estate-types").html(html)
        },
        error: function(xhr){
            fireToast('error',"Lỗi", xhr.status + " " + xhr.error );
        }
    })
}

// function onChooseTags(){
//     $.ajax({
//         url: $('#tags').attr('data-url'),
//         method: 'GET',
//         success: function(response){
//             let html = '';
//             let tags = response.data;
//             // if(tags.length === 0){

//             // }else{
//             tags.forEach(tag => {
//                 html += `<option value = ${tag.id}>${tag.name}</option>`
//             })
//             // }
//             $('#tags').html(html);
//             new TomSelect('#tags',{
//                 plugins: ['caret_position','input_autogrow'],
//             });
//         },
//         error: function(xhr){
//             fireToast('error',"Lỗi", xhr.status + " " + xhr.error );
//         }
//     })
// }

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
                $('#buttonToggleModalLegalDocuments').before(`<button type="button" class="button-choose-legal-documents text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white rounded-full text-[18px] px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${value}
                                                            </button>`);
                $('#legal_documents').val(value);
                $('#modalAddChoose').addClass('hidden');
                onChoose();
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
                $('#buttonToggleModalInterior').before(`<button type="button" class="button-choose-interior text-red-500 bg-red-500 text-white whitespace-nowrap hover:text-white border border-red-400 hover:bg-red-500  focus:outline-none focus:bg-red-500 focus:text-white text-[18px] rounded-full font-lg px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                ${value}
                                                            </button>`);
                $('#interior').val(value);
                $('#modalAddChoose').addClass('hidden');
                onChoose();
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
            }
        }
    })
}

$(document).ready(function(){
    onChooseCategory()
    onChooseLegalDocuments()
    onChooseInterior()
    onButtonAddOtherProperties()
})