import $ from 'jquery'
import { getProvincesAPI } from '../../common/location'
import { activeChoosed } from '../common';
import { onChangeSetLocation } from '../../common/location'

// Set value input when user choose param to attributes search
function onChooseCategoryToSearchBar(){
    $('#search-bar #choose-category').on('change', function(e){
        e.preventDefault();
        let url = $(this).find('option:selected').data('url');
        $('.form-search').prop('action', url);
        $('.form-search').trigger('submit');
    })
}

function onChooseAreaRange(){
    $('.choose-area-range').on('click', function(e){
        e.preventDefault();
        let text = $(this).text().trim();
        activeChoosed(`.choose-area-range:contains("${text}")`, '.choose-area-range', 'text-gray-900', 'text-[#DC2D27]');
        if(text === 'Tất cả diện tích'){
            if($('#page').length) text = 'Tất cả'
            else text = 'Diện tích';
        }
        $('.show-area-range').text(text);
        if($('input[name="area-range"]').length && text !== 'Tất cả'){
            $('input[name="area-range"]').val(text);
        }else if($('input[name="area-range"]').length && text === 'Tất cả'){
            $('input[name="area-range"]').remove();
        }else if(!($('input[name="area-range"]').length) && text !== 'Tất cả'){
            $('.form-search').append(`<input type="text" id="area-range" name="area-range" value="${text}">`);
        }
        if($('#page .form-search').length ){
            $('#page .form-search').trigger('submit');
        }
    })
}

function onChoosePriceRange(){
    $('.choose-price-range').on('click', function(e){
        e.preventDefault();
        let text = $(this).text().trim();
        activeChoosed(`.choose-price-range:contains("${text}")`, '.choose-price-range', 'text-gray-900', 'text-[#DC2D27]');
        if(text === "Tất cả mức giá"){
            if($('#page').length) text = 'Tất cả'
            else text = 'Mức giá';
        }
        $('.show-price-range').text(text)
        if($('input[name="price-range"]').length && text === 'Tất cả'){
            $('input[name="price-range"]').remove();
        }else if($('input[name="price-range"]').length && text !== 'Tất cả'){
            $('input[name="price-range"]').val(text);
        }else if(!($('input[name="price-range"]').length) && text !== 'Tất cả' ){
            $('.form-search').append(`<input type="text" id="price-range" name="price-range" value="${text}">`);
        }
        if($('#page .form-search').length > 0){
            $('#page .form-search').trigger('submit');
        }
    })
}

function onChooseMore(){
    let chooseValue = (attribute) => {
        let class_name = '.choose-'+attribute;
        $(class_name).each(function() {
            if ($(this).hasClass('choosed')) {
                $(this).addClass('bg-[#FFD8C2] text-[#74150F]');
            }
        });
        $(class_name).on('click', function () {
            let number = $(this).attr("data-number");
            $(this).toggleClass('bg-[#FFD8C2] text-[#74150F] choosed');
            if ($(this).hasClass('choosed')) {
                $('.form-search').append(`<input type="text" class="${attribute}" name="${attribute}[]" value="${number}">`);
            } else {
                $(`input[name="${attribute}[]"]`).filter(function() {
                    return $(this).val() === number;
                }).remove();
            }
        }); 
    } 
    chooseValue('bedroom')
    chooseValue('toilet')
    chooseValue('house-direction')
}

// on choose sort by value
function onChooseSortBy(){
    $('#page #choose-sort-by').on('change', function(e){
        e.preventDefault();
        if($(this).val() != 0){
            if($('input[name="sort_by"]').length > 0){
                $('input[name="sort_by"]').val($(this).val());
            }else{
                let value = $(this).val()
                $('#page .form-search').append(`<input type="text" class="sort-by" name="sort_by" value="${value}">`)
            }
        }else{
            if($('input[name="sort_by"]').length > 0){
                $('input[name="sort_by"]').remove();
            } 
        }
        $('#page .form-search').trigger('submit');
    })
}

export function onChooseWardToPostDetailsPage(){
    $('#post-details .choose-ward').on('click', function(e){
        e.preventDefault()
        let province_name = $(this).attr('data-province-name');
        let district_name = $(this).attr('data-district-name');
        let ward_name = $(this).attr('data-ward-name');
        let real_estate_type = $(this).attr('data-real-estate-type');
        if(real_estate_type){
            $('.item-checkbox').each(function(){
                if($(this).val() === real_estate_type){
                    $(this).prop('checked', true);
                }
            })
        }
        onChangeSetLocation(province_name, district_name, ward_name);
        $('#post-details .form-search').trigger('submit');
    })
}


// on choose province to page 
export function onChooseProvince(){
    $('.choose-province').on('click', function(e){
        e.preventDefault();
        let province_name = $(this).attr('data-province-name').trim();
        let district_name = "";
        let ward_name = "";
        let real_estate_type = $(this).attr('data-real-estate-type');
        if($('#post-details').length){
            $('.item-checkbox').each(function(){
                if($(this).val() === real_estate_type){
                    $(this).prop('checked', true);
                }
            })
        }
        onChangeSetLocation(province_name, district_name, ward_name)
        $('.form-search').trigger('submit');
    })
}

// Reset value when user on click button "Đặt lại"

function resetValue(){
    // reset checked real estate type
    let resetItemCheckbox = (is_check) => {
        if($('.item-checkbox:checked').length === 0){
            if(is_check === true){
                fireToast('error', 'Trống', 'Bạn chưa chọn loại nhà đất')
            }
            return false;
        }else{
            $('.checked-item-all').prop('checked', false);
            $('.item-checkbox').prop('checked', false);
            return true;
        }
    }
    $('.reset-item-checkbox').on('click', function(e){
        e.preventDefault()
        let is_check = resetItemCheckbox(true);
        if(is_check === true){
            $('#page .form-search').trigger('submit');
        };
    })

    // reset location choosed
    let resetChoosedLocation = (is_check) => {
        if($('input[name="location"]').length > 0){
            $('input[name="location"]').remove()
            getProvincesAPI()
            $('#districts').html('<option disabled selected>Quận/Huyện</option>')
            $('#wards').html('<option disabled selected>Xã/Phường</option>')
            let text = 'Trên toàn quốc';
            if($('#page').length) text = 'Tất cả';
            $('.show-location').text(text);
            return true;
        }else{
            if(is_check === true){
                fireToast('error', 'Thất bại', 'Bạn chưa chọn vị trí')
            }
            return false;
        }
    }
    $('.reset-select-location').on('click', function(e){
        e.preventDefault()
        let is_check = resetChoosedLocation(true);
        if(is_check === true){
            $('#page .form-search').trigger('submit');
        };
    })

    // reset value price range choosed
    let resetChoosedPriceRange = (is_check) => {
        if($('input[name="price-range"]').length  > 0){
            $('input[name="price-range"]').remove();
            activeChoosed('.choose-price-range:first', '.choose-price-range', 'text-gray-900', 'text-[#DC2D27]');
            if($(this).attr('data-style') === "0"){
                $('.show-price-range').text('Mức giá');
            }else{
                $('.show-price-range').text('Tất cả')
            }
            return true;
        }else{
            if(is_check === true){
                fireToast('error', 'Thất bại', 'Bạn chưa chọn mức giá')
            }
            return false;
        }
    }
    $('.reset-price-range').on('click', function(e){
        e.preventDefault()
        let is_check = resetChoosedPriceRange(true);
        if(is_check === true){
            $('#page .form-search').trigger('submit');
        };
    })

    // reset value area range choosed
    let resetChoosedAreRange = (is_check) => {
        if($('input[name="area-range"]').length > 0){
            $('input[name="area-range"]').remove();
            activeChoosed('.choose-area-range:first', '.choose-area-range', 'text-gray-900', 'text-[#DC2D27]');
            if($(this).attr('data-style') === "0"){
                $('.show-area-range').text('Diện tích');
            }else{
                $('.show-area-range').text('Tất cả')
            }
            return true;
        }else{
            if(is_check === true){
                fireToast('error', 'Thất bại', 'Bạn chưa chọn diện tích')
            }
            return false
        }
    }
    $('.reset-area-range').on('click', function(e){
        e.preventDefault()
        let is_check = resetChoosedAreRange(true);
        if(is_check === true){
            $('#page .form-search').trigger('submit');
        };
    })

    // Reset value in filter more
    let resetChoosedValueMore = (attribute) => {
        let class_name = '.choose-'+attribute;
        if($(class_name).hasClass('choosed')){
            $(`input[name="${attribute}[]"]`).remove();
            $(class_name).removeClass('bg-[#FFD8C2] text-[#74150F] choosed');
            return true;
        }
        return false;
    }
    $('.reset-filter-more').on('click', function(e){
        e.preventDefault()
        let is_bedroom = resetChoosedValueMore('bedroom');
        let is_toilet = resetChoosedValueMore('toilet');
        let is_house_direction = resetChoosedValueMore('house-direction')
        if(!is_bedroom && !is_toilet && !is_house_direction){
            fireToast('error', 'Thất bại', 'Chưa chọn giá trị')
        }else if(is_bedroom || is_toilet || !is_house_direction){
            $('#page .form-search').trigger('submit');
        }
    })

    // Reset all choosed value
    $('.reset-all-value').on('click', function(e){
        e.preventDefault()
        let is_real_estate_type = resetItemCheckbox(false)
        let is_location = resetChoosedLocation(false)
        let is_price = resetChoosedPriceRange(false)
        let is_area = resetChoosedAreRange(false)
        let is_bedroom = resetChoosedValueMore('bedroom');
        let is_toilet = resetChoosedValueMore('toilet');
        let is_house_direction = resetChoosedValueMore('house-direction')
        if (!is_real_estate_type && !is_location && !is_price && !is_area && !is_bedroom && !is_toilet && !is_house_direction) {
            fireToast('info', 'Trống', 'Bạn chưa nhập hay chọn thông tin tìm kiếm')
        }else if(is_real_estate_type || is_location || is_price || is_area || is_bedroom || is_toilet || is_house_direction){
            if($('#home').length > 0){
                fireToast('info', 'Đã đặt lại', 'Đã đặt lại giá trị về ban đầu')
            }else{
                fireToast('info', 'Đã đặt lại', 'Đã đặt lại giá trị về ban đầu')
                $('#page .form-search').trigger('submit');
            }
            
        }
    })
}


// Submit form to homepage
function onSubmitFormSearch(){
    let isExistsInput = () => {
        if($('input[name="location"]').length > 0 || 
        $('.item-checkbox:checked').length > 0 ||
        $('input[name="keyword"]').val() !== '' ||
        $('input[name="price-range"]').length > 0 ||
        $('input[name="area-range"]').length > 0 ||
        $('input[name="toilet[]"]').length > 0 ||
        $('input[name="bedroom[]"]').length > 0 ||
        $('input[name="home-direction[]"]').length > 0 ){
            return true;
        }
        return false;
    }
    $('#homepage #btn-submit').on('click', function(e){
        e.preventDefault();
        if(isExistsInput() === true){
            $('#homepage .form-search').trigger("submit");
        }else{
            fireToast('info', 'Thất bại', 'Bạn cần nhập hoặc chọn một thông tin để tìm kiếm')
        }
    })
}

$(document).ready(function(){
    // Submit form
    onSubmitFormSearch()
    // Set value
    onChooseCategoryToSearchBar()
    onChooseAreaRange()
    onChoosePriceRange()
    onChooseMore()
    onChooseSortBy()
    onChooseProvince()
    onChooseWardToPostDetailsPage()
    // Reset value
    resetValue()
})