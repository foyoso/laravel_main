var ID_MODAL = "#modal-media-gallery";
var BTN_SELECT_CLOSE = ".btn-select-image-modal";
var IMAGE_ITEM = ".image-item";
var BTN_ADD_ITEM_IMAGE = ".btn-add-item-image";
var input = "";
var image = "";
var MAX_FILE_SIZE = 1;

var AREA_MULTI_IMG = ".multiple-image";
var IMAGE_BOX = ".img-upload-box";
var BTN_ADD_IMG = ".btn-select-image-2";
var BTN_DELETE_IMG = ".btn-delete-image-2";

//SORT
var SORT_IMAGE_ITEM = "li.ui-state-default";
var BTN_DELETE_IMG_SORT = ".btn-delete-image-3";

// cho biet là open modal cho chọn 1 image vd: banner, thumb hay nhiều image slide
var ONE_IMAGE = 1;
var MULTI_IMAGE = 2;
var action = 0;
var sort = 0;
var cntrlIsPressed = false;
var arrSrc = "";
var isSummerNote = 0;
$(document).ready(function () {

    $(ID_MODAL).on("click", IMAGE_ITEM, function () {
        //mouse click
        if (cntrlIsPressed == false) {
            if (action == ONE_IMAGE) {
                var src = $(this).data("src");
                $(input).val(src);
                $(image).prop("src", src);
                input = "";
                image = "";
            }
            if (action == MULTI_IMAGE && sort == 0) {
                var src = $(this).data("src");
                $(insertImage(src)).insertBefore(BTN_ADD_ITEM_IMAGE);
            }
            if (action == MULTI_IMAGE && sort == 1) {
                var src = $(this).data("src");
                //$(insertImage(src)).insertBefore(BTN_ADD_ITEM_IMAGE);
                $(insertImageSort(src)).insertBefore(BTN_ADD_ITEM_IMAGE);
            }

            $(ID_MODAL).modal("hide");
        } else {
            //ctr + mouse click
            arrSrc += "," + $(this).data("src");
            $(this).closest(".thumbnail-selected").addClass("active");
        }
    });
    $('#btn-modal-upload-show').on('click', function(){
        $('#myModal-uploadfile').modal("show");
    })
    $(BTN_SELECT_CLOSE).on("click", function () {
        if (action == ONE_IMAGE && arrSrc != "") {
            arrSrc = arrSrc.substr(1).split(",");
            var src = arrSrc[0];
            $(input).val(src);
            $(image).prop("src", src);
            input = "";
            image = "";
        }
        if (action == MULTI_IMAGE && sort == 0 && arrSrc != "") {
            arrSrc = arrSrc.substr(1).split(",");
            arrSrc.forEach(function (item, index) {
                $(insertImage(item)).insertBefore(BTN_ADD_ITEM_IMAGE);
            });
        }
        if (action == MULTI_IMAGE && sort == 1 && arrSrc != "") {
            arrSrc = arrSrc.substr(1).split(",");
            arrSrc.forEach(function (item, index) {
                $(insertImageSort(item)).insertBefore(BTN_ADD_ITEM_IMAGE);
            });
        }
        arrSrc = "";
        $(ID_MODAL).modal("hide");
    });

    $(AREA_MULTI_IMG).on("click", BTN_DELETE_IMG, function (e) {
        e.preventDefault();
        $(this).closest(IMAGE_BOX).remove();
    });
    $(AREA_MULTI_IMG).on("click", BTN_DELETE_IMG_SORT, function (e) {
        e.preventDefault();
        $(this).closest(SORT_IMAGE_ITEM).remove();
    });

    //ctr + click image
    $(document).keydown(function (event) {
        if (event.which == "17") cntrlIsPressed = true;
    });

    $(document).keyup(function () {
        cntrlIsPressed = false;
    });

    // upload
    $(".btn-add-image").on("click", function () {
        $("#fast-upload label.error").remove();
        var input = $("#fast-upload-file"),
            file = input[0].files[0];
        var fileSize = file.size / 1024 / 1024;
        if (fileSize > MAX_FILE_SIZE) {
            $(
                "<label class='error'>File size larger than 1Mb</label>"
            ).insertAfter($("#fast-upload-file"));
            return false;
        }
        var fd = new FormData();
        fd.append("file", file);
        fd.append("image_url", $("#image_url").val());
        fd.append("folder", imageFolder);
        fd.append("ajax", 1);

        callAjax1("/admin/image/save", fd);
        $("#myModal-uploadfile").modal("hide");
        $("#progress-bars").modal("show");
        setTimeout(function () {
            if (isSummerNote == 0) {
                var data = callAjax("/admin/image/list", {
                    folder: imageFolder,
                });
                $(ID_MODAL).find(".modal-body").html(data.html);
                $(ID_MODAL)
                    .find(".modal-body .thumbnail-selected-custom:first")
                    .addClass("active");
                arrSrc +=
                    "," +
                    $(ID_MODAL)
                        .find(".modal-body .thumbnail-selected-custom:first a")
                        .data("src");

            } else {
                if (
                    typeof linkImageSummerNote !== "undefined" &&
                    linkImageSummerNote !== null
                ) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        type: "POST",
                        datatype: "JSON",
                        data: { folder: imageFolder },
                        url: linkImageSummerNote,
                        success: function (html) {
                            $(".modal-image-summernote .modal-body").html(
                                html.html
                            );
                            $(
                                ".modal-image-summernote .modal-body .thumbnail-custom:first"
                            ).addClass("selected-img");
                        },
                        error: function (error) {
                            console.log("error loading from " + error);
                        },
                    });
                }
            }
            $("#progress-bars").modal("hide");
        }, 800);
    });
    $(".open-upload").on("click", function () {
        $("#fast-upload").trigger("reset");
        isSummerNote = 0;
    });

    $("body").on("click", "a.open-upload1", function () {
        $("#fast-upload").trigger("reset");
        $(".modal-image-summernote").css("z-index", 9998);
        $("#myModal-uploadfile").css("z-index", 9999);
        $("#myModal-uploadfile").modal("show");
        isSummerNote = 1;
    });

    /*
  $("body ").on('click', '.modal-image-summernote img', function(){
          $(this).toggleClass(self.select_class);
      });*/
    $("body").on("click", ".modal-image-summernote img", function () {
        if ($(this).hasClass("selected-img")) {
            $(this).removeClass("selected-img");
        } else {
            $(this).addClass("selected-img");
        }
    });
});

function openMediaGallery(_input, _image, _action, _sort = 0) {
    var imgTitle = $(".note-image-title-text");
    if (imgTitle.length > 0) {
        imgTitle.closest(".modal").css("z-index", "1049");
    }
    action = _action;
    sort = _sort;
    if (action == ONE_IMAGE) {
        input = _input;
        image = _image;
    }

    var data = callAjax("/admin/image/list", { folder: imageFolder });
    $(ID_MODAL).find(".modal-body").html(data.html);
    $(ID_MODAL).modal("show");
}
function callAjax(url, data) {
    result = "";
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        async: false,
        dataType: "json",
        beforeSend: function () {},
        success: function (data) {
            result = data;
        },
        error: function (error) {
            flg = false;
            console.log(data);
            console.log("fail");
        },
    });
    return result;
}
function callAjax1(url, data) {
    result = "";
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        async: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        /*dataType : "json",*/
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (data) {
            result = data;
        },
        error: function (error) {
            flg = false;
            console.log(data);
            console.log("fail");
        },
    });
    return result;
}

function createOneImage() {
    strHtml = '<div class="img-upload-box form-group">';
    strHtml += ' <div class="image-1 one-image">';
    strHtml +=
        '     <input class="postImage img2 btn-select-image-2" type="file">';
    strHtml += '     <div class="image-upload">';
    strHtml +=
        '         <i class="fa fa-picture-o" aria-hidden="true" style="font-size: 55px;"></i>';
    strHtml +=
        '         <span><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>';
    strHtml += "     </div>";
    strHtml += '     <div class="image-success-2 image-up-success hide">';
    strHtml +=
        '         <img class="show-image-upload" src="/admin/images/project-1.jpg">';
    strHtml += '         <div class="img-delete btn-delete-image-2">';
    strHtml +=
        '             <i class="fa fa-times-circle" aria-hidden="true"></i>';
    strHtml += "         </div>";
    strHtml += "     </div>";
    strHtml += " </div>";
    strHtml += "</div>";
    return strHtml;
}

function insertImage($url) {
    strHtml = '<div class="img-upload-box form-group">';
    strHtml += '  <div class="image-1 one-image">';
    strHtml +=
        '     <input class="image_slides" type="hidden" name="image_slides[]" value="' +
        $url +
        '">';
    strHtml += '     <div style="display: none" class="image-upload">';
    strHtml +=
        '         <span><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>';
    strHtml += "     </div>";
    strHtml += '     <div class="image-success-2 image-up-success">';
    strHtml += '         <img class="show-image-upload" src="' + $url + '">';
    strHtml += '         <div class="img-delete btn-delete-image-2">';
    strHtml +=
        '             <i class="fa fa-times-circle" aria-hidden="true"></i>';
    strHtml += "         </div>";
    strHtml += "     </div>";
    strHtml += " </div>";
    strHtml += "</div>";
    return strHtml;
}
function insertImageSort($url) {
    strHtml =
        '<li class="ui-state-default"><div class="img-upload-box form-group">';
    strHtml += '  <div class="image-1 one-image">';
    strHtml +=
        '     <input class="image_slides" type="hidden" name="image_slides[]" value="' +
        $url +
        '">';
    strHtml += '     <div style="display: none" class="image-upload">';
    strHtml +=
        '         <span><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>';
    strHtml += "     </div>";
    strHtml += '     <div class="image-success-2 image-up-success">';
    strHtml += '         <img class="show-image-upload" src="' + $url + '">';
    strHtml += '         <div class="img-delete btn-delete-image-3">';
    strHtml +=
        '             <i class="fa fa-times-circle" aria-hidden="true"></i>';
    strHtml += "         </div>";
    strHtml += "     </div>";
    strHtml += " </div>";
    strHtml += "</div></li>";
    return strHtml;
}
