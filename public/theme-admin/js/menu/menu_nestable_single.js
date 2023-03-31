var tagIds = "";
var tagListingIds = "";
var currentLi = '';
$(document).ready(function() {

    $('#nestable').nestable({
        group: 1
    });


    $('#nestable').on('click','.fa-times', function(event){
          event.preventDefault();
          var li = $(this).closest('li');
          $('.checkbox_item[value="'+li.data("url")+'"]').prop('checked', false);
          li.remove();
    });
    $('#nestable').on('click','.fa-pencil', function(event){
          event.preventDefault();
          $('#urlname').val('');
          currentLi = $(this).closest('li');
          $('#mdeditname').modal('show');

    });
    $('.btn-editname').on('click', function(){
        var name = $('#urlname').val();
        if(name != ''){
            currentLi.attr('data-name', name);
            currentLi.find('.dd-handle-custom').html(name + '<span>(' + currentLi.attr('data-url') + ')</span>');
        }
    });

    $('.dd-item').each(function() {
        $('.checkbox_item[value="'+ $(this).data("url")+'"]').prop('checked', true);
    });


    $('.page-type').on('change', function(){
        var val = $(this).val();
        $('.tagLink').val('');
        $('.tag-content').html('');

        $('#md-tag-property input:checked').prop('checked', false);
        $('#md-tag-listing input:checked').prop('checked', false);

        if (val == 2) {
            $("#md-tag-listing").modal('hide');
            //$("#md-tag-property").modal('show');
            $('.select-pages').addClass('hide');
            $('#tags').removeClass('hide');
            $('#link').addClass('hide');
            $('.page-ids').hide();
        }  else if (val == 1) {
            $('.select-pages').removeClass('hide');
            $('#link').addClass('hide');
            $('#tags').addClass('hide');


        } else {
            $('.page-ids').hide();
            $('#tags').addClass('hide');
            $('#link').removeClass('hide');
            $('.select-pages').addClass('hide');
        }
    });

    $('.btn-add-tag-property').on('click', function() {
        var link = '';
        var tag = '';
        $('#md-tag-property input:checked').each(function(){
            if (link == "") {
                 //link = '?tags[]=' + $(this).val();
                link = '/'+$(this).data('slug');
                tagIds = $(this).val();

            } else {
                //link +='&tags[]=' + $(this).val();
                link += '-' + $(this).data('slug');
                tagIds += "," + $(this).val();
            }

            tag += '<span class="tag label label-info lb-tag lb-tag-custom" data-id="' + $(this).val() + '">'+$(this).data('name')+'</span>';

        });

        if (link != "") {
            link = '/projects' + link;
        }

        $('.tagLink').val(link);

        $('.tag-content').html(tag);
    });

    $('.btn-add-tag-listing').on('click', function() {
        var link = '';
        var tag = '';
        $('#md-tag-listing input:checked').each(function(){
            if (link == "") {
                 //link = '?tags[]=' + $(this).val();
                link = '/'+$(this).data('slug');
                tagListingIds = $(this).val();
            } else {
                //link +='&tags[]=' + $(this).val();
                link += '-' + $(this).data('slug');
                tagListingIds += "," + $(this).val();
            }
            tag += '<span class="tag label label-info lb-tag lb-tag-custom" data-id="' + $(this).val() + '">'+$(this).data('name')+'</span>';
        });

        if (link != "") {
            link = '/listings' + link;
        }
        $('.tagLink').val(link);

        $('.tag-content').html(tag);
    });



    $('.btn-add-menu').on('click', function() {
        $('.name-ct').closest('div.form-group').removeClass('has-error');
        var val = $('.page-type').val();
        var name = $('.name-ct').val();
        var is_blank = "";

        if (name == "") {
             $('.name-ct').closest('div.form-group').addClass('has-error');
             $('.name-ct').focus();
             return false;
        }
        var link = "";
        if (val == 1 ) {
            link = $('.select-pages').val();
            if($('.select-pages option:selected').data('ids')!=''){
                link =  $('.page-ids').val();
            }
            if($('#generate_bookmarks').is(':checked')){
                $('.page-ids option:not(:selected)').each(function(){
                    var opLink = '';
                    var id='';
                    if($(this).val()!='/'){
                        opLink = $(this).val();
                        id = opLink.split("#")[1];
                    } else {
                        opLink = '/';
                        id = '/';
                    }
                    html  = '<li class="dd-item" data-name="'+ id +'" data-url="' + opLink + '"' + '>';
                    html += '  <div class="dd-handle dd-handle-custom">' + id + ' <span>('+opLink+')</span></div>';
                    html += '<div class="btn-remove"><i class="fa fa-pencil" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i></div></li>';
                    $('.dd-list1').append(html);
                })
            }
        } else if(val== 4) {
            link = $('#link').val();
            if (link == 1) {
                link = $("#external-link").val();
                blank = $("#is_blank_true_false").val();
                is_blank = ' data-blank = "' + blank + '"';
                //link = link.trim().toLowerCase();
                link = link.trim();
            }
            if(link == 2){
                link = $("#otherId").val();
                //link = link.trim().toLowerCase();
                link = link.trim();
            }
        } else {
            link = $('#tags').val();
        }
        var textTagId = "";
        if (tagIds != "") {
            textTagId = 'data-tagid="'+tagIds+'"';
        }

        if (tagListingIds != "") {
            textTagId = 'data-taglistingid="'+tagListingIds+'"';
        }
        html  = '<li class="dd-item" '+textTagId+' data-name="'+ name +'" data-url="' + link + '"' + is_blank +'>';
        html += '  <div class="dd-handle dd-handle-custom">' + name + ' <span>('+link+')</span></div>';
        html += '<div class="btn-remove"><i class="fa fa-pencil" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i></div></li>';
        $('.dd-list1').append(html);
        $('.name-ct').val('');
        $('.page-type').val(1);
        $('.page-type').change();
        $("#link").val("#");
        $("#external-link").val("");
        $("#is_blank_true_false").val('_blank');
        tagIds = "";
        tagListingIds = "";
    });


    $('.btn-save').on('click', function(){
        $('.menu-data').val(JSON.stringify($('#nestable').nestable('serialize')));
        return true;
    });

    $("#link").on("change", function() {
        var val = $(this).val();
        if (val == 1) {
            $("#md-external-link").modal("show");
        }
        if (val == 2) {
            $("#md-other-id").modal("show");
        }
    });
    $(".btn-save-md-id").on("click", function(){
        $("#btn-save-md-id label.error").remove();
        if($("#otherId").val() == "") {
            $("<label class='error '>Please, enter link</label>").insertAfter($("#otherId"));
            return false;
        }
    });


    $(".btn-save-external-link").on("click", function(){
        $("#md-external-link label.error").remove();
        if($("#external-link").val() == "") {
            $("<label class='error '>Please, enter link</label>").insertAfter($("#external-link"));
            return false;
        }

        if($("#external-link").val().indexOf("http") == -1) {
            $("<label class='error'>Link not valid</label>").insertAfter($("#external-link"));
            return false;
        }


    });


    if ($("#is_blank_true_false").val() == '_blank') {
         $('#is_blank_true').prop('checked', true);;
    } else {
         $('#is_blank_false').prop('checked', true);;
    }



    $('.is_blank').click(function () {
        if ($('#is_blank_true').is(':checked')) {
            $("#is_blank_true_false").val('_blank');
        } else {
            $("#is_blank_true_false").val('_self');
        }
    });

    $(".btn-close-external-link").on('click', function() {
        $("#md-external-link").modal("hide");
        $("#external-link").val("");
        $("#link").val("#");
    });

    $(".btn-close-md-id").on('click', function() {
        $("#md-other-id").modal("hide");
        $("#otherId").val("");
        $("#link").val("#");
    });

    $('.create-default').on('click', function(){
        var htmloption = '';
        var template = jQuery.validator.format($('#item-menu-template').val());
        $('.select-pages option').each(function(){
            if($(this).val() == '/' || $(this).val() == '/contact' || $(this).val() == '/news'){
                return true;
            }

            htmloption += template($(this).data('name'), $(this).val());
        });
        htmloption = template('Home', '/') + htmloption;
        htmloption += template('News', '/news');
        htmloption += template('Contact Us', '/contact');

        $('.dd-list1').html(htmloption);
    });

    $('.select-pages').on('change', function(){
        var arrIds = $(this).find('option:selected').data('ids');
        if(arrIds != ''){
            var arr = arrIds.split(',');
            var str = '';
            arr.forEach(function(element) {
                str +='<option value="'+element+'">'+element+'</option>';
            });
            $('.page-ids').html(str);
            $('.page-ids').show();
        } else {
            $('.page-ids').hide();
        }
    });
    $('.select-pages').change();
});

/*
function clickLabelTag(content, link) {

    $(content + ' .lb-tag').on('click', function() {
        var tagId = $(this).data('id');
        var url = $(content).find('.url');
        var name = $(content).find('.name');
        var urlVal = url.val();
        if (urlVal == "") {
             urlVal = link + '?tags[]=' + tagId;
        } else {
            urlVal +='&tags[]=' + tagId;
        }
        url.val(urlVal);
    });

    $(content + ' .btn-reset').on('click', function() {
        var url = $(content).find('.url');
        var name = $(content).find('.name');
        name.val('');
        url.val('');
    });

    $(content + ' .btn-submit').on('click', function() {
        var url = $(content).find('.url');
        var name = $(content).find('.name');
        if(url.val() != "" && name.val() != ""){
            html  = '<li class="dd-item" data-name="'+ name.val() +'" data-url="' + url.val() + '">';
            html += '  <div class="dd-handle">' + name.val() + '</div>';
            html += '<div class="btn-remove"><i class="fa fa-times" aria-hidden="true"></i></div></li>';
            $('.dd-list1').append(html);
            name.val('');
            url.val('');
        }

    });

    $('.btn-save').on('click', function(){
        $('.menu-data').val(JSON.stringify($('#nestable').nestable('serialize')));
        return true;
    });
}*/

