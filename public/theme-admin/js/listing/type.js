$('document').ready(function() {
    $('#btn-submit').on('click', function(e) {
        $(".form-edit").find("label.error").remove();
        var name = $('#name').val();
        var strError = "";
        if (name == "") {
            strError += 'This field is required.';
        }
        // if (uniqueName() == false) {
        //     strError += 'This Tag is exist.';
        // }

        if (strError != "") {
            $('<label class="error">' + strError + '</label>').insertAfter($('#name').closest('div.input-group'));
            e.preventDefault(e);
            return false;
        }

        return true;
    });

    $('.form-edit').on('click', '#btn-cancel', function(e) {
        $(".form-edit").find("label.error").remove();
        $(".form-edit").attr('action', linkAdd);
        $('#btn-submit').html("Add");
        $('#name').val($(this).data(""));
        $('#tags-id').val(0);
        $('.form-edit').find('#btn-cancel').remove();
    });

    $('table').on('click', '.edit-tags', function() {
        $(".form-edit").find("label.error").remove();
        $(".form-edit").attr('action', linkEdit + '/' + $(this).data('id'));
        $('.form-edit').find('#btn-cancel').remove();
        $('#name').val($(this).data('value'));
        $('#tags-id').val($(this).data('id'));
        $('#btn-submit').html("Edit");
        $('<button type="input" id="btn-cancel" class="btn btn-danger">cancel</button>').insertAfter('#tags-id');
    });

});

function uniqueName() {
    var url = "/admin/managetags/uniquename";
    var data = {
        'name' : $('#name').val(),
        'id' : $('#tags-id').val(),
        'websiteId': websiteId
    };
    var result = callAjax1(url, data);
    return result.unique;
}

function callAjax(url,  data) {
    console.log((data));
    var result = false;
    $.ajax({
      type: "POST",
      async: false,
      dataType : "json",
      data: data,
      url: url,

      success: function (result) {
        if (result.success === true) {
            result = true;
        }
      },
    });
    return result;
}