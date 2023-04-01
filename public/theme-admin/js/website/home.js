$(document).ready(function() {
    // $(".btn-add").on("click", function(){
    //     $(".unselect input:checked").each(function(){
    //         var ip = $(this).closest('.col-sm-6');
    //         ip.find("input").prop("checked", false);
    //         $(".selected .row .clearfix").before(ip);
    //     });
    //     updateFeatured()

    // });

    // $(".btn-remove").on("click", function(){
    //     $(".selected input:checked").each(function(){
    //         var ip = $(this).closest('.col-sm-6');
    //         ip.find("input").prop("checked", false);
    //         $(".unselect .row .clearfix").before(ip);
    //     });
    //     updateFeatured();
    // });

    $('.btn-add-project').on('click', function(){
        var htmlFormat = $.validator.format( $(".li-item").val());
        $('.ck-box:not(:disabled):checked').each(function(){
            var html = htmlFormat($(this).val(), $(this).data('name'));
            $('#sortable').append(html);
            $(this).prop('disabled', 'disabled');
        });
    });
    $('.btn-save').on('click', function(){
        var microid = new Array();
        $('li.ui-state-default').each(function() {
            microid.push($(this).data('id'))
        });

        if(microid.length > 0){
            arrVal = microid.toString();
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list: arrVal, col:'home_property'})
        } else {
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list:"", col:'home_property'})
        }
        location.reload();
    });

    $('#sortable').on('click','.btn-remove', function(){
        $(this).closest('li').remove();
    });


    // LISTING
    $('.btn-add-listing').on('click', function(){
        var htmlFormat = $.validator.format( $(".li-item").val());
        $('.ck-box:not(:disabled):checked').each(function(){
            var html = htmlFormat($(this).val(), $(this).data('name'));
            $('#sortable-listing').append(html);
            $(this).prop('disabled', 'disabled');
        });
    });
    $('.btn-save-listing').on('click', function(){
        var microid = new Array();
        $('#sortable-listing li.ui-state-default').each(function() {
            microid.push($(this).data('id'))
        });

        if(microid.length > 0){
            arrVal = microid.toString();
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list: arrVal, col:'home_listings'})
        } else {
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list: "", col:'home_listings'})
        }
        location.reload();
    });
    $('#sortable-listing').on('click','.btn-remove', function(){
        $(this).closest('li').remove();
    });
    // news
    $('.btn-add-news').on('click', function(){
        var htmlFormat = $.validator.format( $(".li-item").val());
        $('.ck-box:not(:disabled):checked').each(function(){
            var html = htmlFormat($(this).val(), $(this).data('name'));
            $('#sortable-news').append(html);
            $(this).prop('disabled', 'disabled');
        });
    });
    $('.btn-save-news').on('click', function(){
        var microid = new Array();
        $('#sortable-news li.ui-state-default').each(function() {
            microid.push($(this).data('id'))
        });

        if(microid.length > 0){
            arrVal = microid.toString();
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list: arrVal, col:'home_posts'})
        } else {
            callAjax('/admin/website/saveHomeSection/'+websiteId, {list: "", col:'home_posts'})
        }
        location.reload();
    });

    $('#sortable-news').on('click','.btn-remove', function(){
        $(this).closest('li').remove();
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
