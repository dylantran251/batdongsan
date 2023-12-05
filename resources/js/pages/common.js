import $ from 'jquery'

export function handleCheckedOnChooseItem() {
    $('.checked-item-all').on('change', function () {
        let isCheckedAll = $(this).prop('checked');
        // Đặt thuộc tính checked của tất cả item-checkbox dựa trên trạng thái của check-box-all
        $('.item-checkbox').prop('checked', isCheckedAll);
    });
    $('.item-checkbox').on('change', function () {
        // Kiểm tra xem có ít nhất một item-checkbox không được đánh dấu không
        let isAnyUnchecked = $('.item-checkbox:not(:checked)').length > 0;
        // Đặt thuộc tính checked của check-box-all dựa trên trạng thái của item-checkbox
        $('.checked-item-all').prop('checked', !isAnyUnchecked);
    });
}

export function activeChoosed(item, class_name, old_attributes, new_attributes){
    $(class_name).removeClass(new_attributes);
    $(class_name).addClass(old_attributes);
    $(item).addClass(new_attributes);
    $(item).removeClass(old_attributes);
}

export function onChooseLegalDocuments(){
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

export function onChooseInterior(){
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

export function onButtonAddOtherProperties(){
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