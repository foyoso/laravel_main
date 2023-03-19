var fileName = "";
var filePdf = 0;
var MAX_FILE_SIZE = 1;
$(document).ready(function() {
    $('.btn-delete-pdf').on('click', function() {
        fileName = $(this).data('url');
        $('#modal-confirm').modal('show');
        filePdf = 1;
    });

    $('.btn-delete-image').on('click', function() {
        fileName = $(this).data('url');
        $('#modal-confirm').modal('show');
        filePdf = 0;

    });
    $('.btn-delete-image-modal').on('click', function(){
        var linkDelete = '/admin/managegallery/delete';
        if(filePdf == 1){
            linkDelete = '/admin/managegallery/deletepdf';
        }
        var data = callAjax(linkDelete, {image:fileName, siteId:siteId, siteType:siteType});
        $('#modal-confirm').modal('hide');
        if (data.error == 0) {
            location.reload();
        } else {
            showModal(data.message);
        }
        console.log(data);
    });

    $("form.upload-file-gallery button[type='submit']").on('click', function(e) {
        $(".upload-file-gallery label.error").remove();
        var filesize = $(".upload-file-gallery input[type='file']")[0].files[0].size/1024/1024;
        if (filesize > MAX_FILE_SIZE) {
            $("<label class='error'>File size larger than 1Mb</label>").insertAfter($(".upload-file-gallery input[type='file']"));
            //e.preventdefault();
            return false;
        }
        return true;
    });
});

function callAjax(url, data) {
    result = "";
     $.ajax({
        url : url,
        type : "POST",
        data : data,
        async: false,
        dataType : "json",
        beforeSend: function() {
        },
        success: function(data) {
          result = data;
        },
        error: function(error) {
            flg = false;
            console.log(data);
            console.log("fail");
        }
    });
    return result;
}
function showModal(text){
    $('#modal-confirm1 .modal-body').html(text);
    $('#modal-confirm1').modal('show');

}
