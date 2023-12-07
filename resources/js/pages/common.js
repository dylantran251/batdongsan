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

