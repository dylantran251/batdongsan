import $ from 'jquery'
import FroalaEditor from "froala-editor";
import 'froala-editor/css/froala_editor.pkgd.css'
import 'froala-editor/js/plugins/align.min.js'
import 'froala-editor/js/plugins/char_counter.min.js'
import 'froala-editor/js/plugins/code_beautifier.min.js'
import 'froala-editor/js/plugins/code_view.min.js'
import 'froala-editor/js/plugins/colors.min.js'
import 'froala-editor/js/plugins/cryptojs.min.js'
import 'froala-editor/js/plugins/draggable.min.js'
import 'froala-editor/js/plugins/edit_in_popup.min.js'
import 'froala-editor/js/plugins/emoticons.min.js'
import 'froala-editor/js/plugins/entities.min.js'
import 'froala-editor/js/plugins/file.min.js'
import 'froala-editor/js/plugins/fullscreen.min.js'
import 'froala-editor/js/plugins/files_manager.min.js'
import 'froala-editor/js/plugins/forms.min.js'
import 'froala-editor/js/plugins/font_size.min.js'
import 'froala-editor/js/plugins/paragraph_format.min.js'
import 'froala-editor/js/plugins/help.min.js'
import 'froala-editor/js/plugins/video.min.js'
import 'froala-editor/js/plugins/url.min.js'
import 'froala-editor/js/plugins/word_paste.min.js'
import 'froala-editor/js/plugins/trim_video.min.js'
import 'froala-editor/js/plugins/track_changes.min.js'
import 'froala-editor/js/plugins/table.min.js'
import 'froala-editor/js/plugins/save.min.js'
import 'froala-editor/js/plugins/special_characters.min.js'
import 'froala-editor/js/plugins/print.min.js'
import 'froala-editor/js/plugins/quote.min.js'
import 'froala-editor/js/plugins/quick_insert.min.js'
import 'froala-editor/js/plugins/paragraph_style.min.js'
import 'froala-editor/js/plugins/markdown.min.js'
import 'froala-editor/js/plugins/lists.min.js'
import 'froala-editor/js/plugins/link.min.js'
import 'froala-editor/js/plugins/line_height.min.js'
import 'froala-editor/js/plugins/line_breaker.min.js'
import 'froala-editor/js/plugins/inline_style.min.js'
import 'froala-editor/js/plugins/inline_class.min.js'
import 'froala-editor/js/plugins/image.min.js'
import 'froala-editor/js/plugins/image_manager.min.js'
import 'froala-editor/js/plugins/font_family.min.js'
import 'froala-editor/js/plugins/help.min.js'
import 'froala-editor/js/plugins/edit_in_popup.min.js'
$(document).ready(function () {
    let container = $("#content");
    if(container.length){
        let editor = new FroalaEditor("#content", {
            heightMin: 500,
            heightMax: 600,
            toolbarSticky: false,
            placeholderText: "Nhập nội dung bài viết..."
        })
    }
})
