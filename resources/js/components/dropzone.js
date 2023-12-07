import $ from 'jquery'
import Dropzone from 'dropzone';
export function dropzone(){
    let UpdateInputImages = function (file) {
        let container = $('.image-container');
        let response = file.xhr.response;
        let fileUrl = JSON.parse(response).data;
        let imageInput = $("<input>").attr({
            type: 'hidden',
            name: 'images[]',
            value: fileUrl,
            fileName: file.name
        });
        container.append(imageInput);
    };
    let RemoveInputImage = function (fileName) {
        $('input[fileName="'+fileName+'"]').remove();
    };
    $('.dropzone-custom').each(function () {
        new Dropzone(this, {
            url: '/file/upload?_token=' + $('meta[name="csrf-token"]').attr('content'),
            method: 'POST',
            addRemoveLinks: true,
            removedfile: function (file) {
                var fileName = file.name;
                let value = $(`input[name="images[]"][fileName="${fileName}"]`).val();   
                const csrfToken = $('meta[name="csrf-token"]').attr('content');             
                $.ajax({
                    url: '/file/remove',
                    method: 'DELETE',
                    data: {
                        fileName: value,
                        _token: csrfToken
                    },
                    success: function(response){
                        console.log('Thành công', response.message);
                        RemoveInputImage(fileName)
                    },
                    error: function(xhr){
                        console.log('Lỗi trạng thái '+ xhr.status);
                    }
                })
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }, 
            success: function (file) {
                UpdateInputImages(file);
            }
        });
    });
}
$(document).ready(function () {
    dropzone()
})
