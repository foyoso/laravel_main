/*var imported = document.createElement('script');
imported.src = '/themeadmin/summernote/summernote-image-title.js';
document.head.appendChild(imported);*/

function createSummernote(id, linkGallery, height) {
    $(id).summernote({
        toolbar: [
            ["insert", ["gallery", "link", "video", "table", "hr"]],
            [
                "font style",
                [
                    "fontname",
                    "fontsize",
                    "color",
                    "bold",
                    "italic",
                    "underline",
                    "strikethrough",
                    "superscript",
                    "subscript",
                    "clear",
                ],
            ],
            ["paragraph style", ["style", "ol", "ul", "paragraph", "height"]],
            ["misc", ["fullscreen", "codeview", "undo", "redo", "help"]],
        ],
        popover: {
            image: [
                ["custom", ["imageTitle"]],
                ["imagesize", ["imageSize100", "imageSize50", "imageSize25"]],
                ["float", ["floatLeft", "floatRight", "floatNone"]],
                ["remove", ["removeMedia"]],
            ],
        },
        lang: "en-US",
        imageTitle: {
            specificAltField: true,
        },
        callbacks: {
            onInit: function () {
                //$(this).data('image_dialog_images_html', '<div class="row"..');
                $(this).data("image_dialog_images_url", linkGallery);
                $(this).data("image_dialog_title", "Choose image");
                $(this).data("image_dialog_close_btn_text", "Close");
                $(this).data("image_dialog_ok_btn_text", "Ok");
            },
        },
        height: height,
        dialogsInBody: true,
        // tabsize: 4,
        // codemirror: {
        //     theme: 'monokai',
        //     mode: "text/html",
        //     lineNumbers: true,
        //     tabMode: 'indent',
        //     lineWrapping:true,
        //   }
    });

    $("body").on("click", ".close-md-gallery", function () {
        $(".modal-backdrop").remove();
    });
    $("body").on("click", ".save-md-gallery", function () {
        $(".modal-backdrop").remove();
    });
    $("body").on("click", ".close-md", function () {
        $(".modal-backdrop").remove();
    });
}
