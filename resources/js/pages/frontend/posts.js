import $, { post, toast } from 'jquery'

import { validators } from 'validate.js';
import validate from 'jquery-validation'
import { activeChoosed } from '../common'
import { dropzone } from '../../components/dropzone';
// import { onChooseLegalDocuments, onChooseInterior, onButtonAddOtherProperties, onChooseCategory } from '../common'

import { validateForm, inputPostsData } from '../../common/posts'



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

function handleForm() {
    const post_form = $("#create-post-page #post-form");
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    $("#create-post-page #submit-form").on('click', function (e) {
        e.preventDefault();
        alert('dmm')
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