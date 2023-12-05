import $, { post, toast } from 'jquery'
import { round } from 'lodash';
import { validators } from 'validate.js';
import validate from 'validate.js';
import validate from 'jquery-validation'
function validateForm() {
    return $('#postFormUser').validate({
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
};
