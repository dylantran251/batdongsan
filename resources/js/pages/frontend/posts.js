import $, { post, toast } from 'jquery'

import { validators } from 'validate.js';
import validate from 'jquery-validation'
import { activeChoosed } from '../common'
import '../../common/posts.js'

import { validateForm, inputPostsData } from '../../common/posts'

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
    handleForm()
})