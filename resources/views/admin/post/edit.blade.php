
@extends('admin.layout')
@section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{$title}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                            <li class="breadcrumb-item active">Read Email</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @include('admin.website.common.menu')
                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">
                    <div class="card border border-danger">
                        <div class="card-header bg-transparent border-danger">
                            <h5 class="my-0 text-danger"><i class="mdi-alarm-panel-outline me-3"></i>{{$title}}</h5>
                        </div>
                        <div class="card-body">
                            @include('admin.common.alert')
                    <form action="/admin/post/edit/{{$website->id}}/{{$data->id}}" method="POST" id="addPost">
                        @csrf
                        <div class="row form-group mb-4">
                            <div class="col-sm-9">

                                <section class="card card-modern">
                                    <div class="card-header">
                                        <span class="card-title"><strong>Detail</strong></span>
                                    </div>
                                    <div class="card-body">



                                        <div class="row form-group mb-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Name<span class="text-danger"> (*)</span></label>
                                                <input value="{{$data -> name}}" type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group mb-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Description<span class="text-danger"> (*)</span></label>
                                                <input value="{{$data -> description}}"  type="text" name="description" id="description" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group mb-4">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Publish Day<span class="text-danger"> (*)</span></label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control datepicker"  value="{{$data ->publish_at}}" type="text" placeholder="publish at"  name="publish_at" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row form-group mb-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Content<span class="text-danger"> (*)</span></label>
                                                <textarea cols="3" name="content" class="form-control" id="content">{{$data -> content}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-sm-3">
                                <section class="card card-modern">
                                    <div class="card-header">
                                        <span class="card-title"><strong>Images</strong></span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="media-gallery">
                                                <div class="mg-files">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <h5 class="text-center">Thumbnail</h5>
                                                        <div class="isotope-item document">
                                                            <div class="thumbnail">
                                                                <div class="thumb-preview">
                                                                    <a class="thumb-image" href=""> <img src="{{$data -> thumbnail==''?'/theme-admin/images/default-thumbnail.jpeg':$data -> thumbnail}}" class="img-responsive thumb" alt="Project"> </a>
                                                                    <div class="mg-thumb-options">
                                                                        <div class="mg-zoom1 btn-delete-one-image">
                                                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="button-add text-center">
                                                                    <button onclick="openMediaGallery('#image_thumbnail', '.thumb', 1)" type="button" class="btn btn-primary btn-add-one-image">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                        Add image
                                                                    </button>
                                                                </div>
                                                                <input type="hidden" name="thumbnail" id="image_thumbnail" value="{{$data -> thumbnail}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="">Select tags</label>
                                                    <div class="tag-content">
                                                        <?php foreach ($tags as $item) {?>
                                                        <span class="badge bg-secondary" data-name="{{$item -> name}}" data-id="{{$item -> id}}">{{$item -> name}}</span>
                                                        <?php } ?>
                                                        <input type="hidden" value="{{$data -> tags}}" name="tags" class="tags" id="tags"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-4">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end card -->

        </div>
        <!-- card -->

    </div>
    <!-- end Col-9 -->

</div>
<!-- end row -->
@endsection
@section('addJs')
<script>
$(document).ready(function(){
    $('#vertical-menu-btn').click();
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });

    $(".tag-content").on("click", 'span', function() {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            } else {
                $(this).addClass("active");
            }
            var value = "";
            $(".tag-content span.active").each(function() {
                value = value + "," + $(this).data("id");
            });

            if (value != "") {
                $(".tags").val(value + ",");
            } else {
                $(".tags").val(value);
            }

        });

        var updateTagsValue = $(".tags").val();
        if (updateTagsValue != "") {
            var arrValue = updateTagsValue.split(",");
            arrValue.forEach(function(id) {
                $(".tag-content span[data-id='"+id+"']").addClass("active");
            });
        }
})
</script>
<script src="/theme-admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<link href="/theme-admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">



<link rel="stylesheet" href="/theme-admin/libs/summernote8/summernote.css">
<script type="text/javascript" src="/theme-admin/libs/summernote8/summernote.js"></script>
<script type="text/javascript" src="/theme-admin/libs/summernote8/summernote-gallery-extension.js"></script>
<script type="text/javascript" src="/theme-admin/js/image/open-media-gallery-file.js"></script>
<script>
var imageFolder ='website/website_{{$website -> id}}';
var linkImageSummerNote = "/admin/image/getForAjax?folder=" + imageFolder ;

$(document).ready(function() {
$('#btnSubmit').on('click', function(){
        $('#content').each(function(){
            $(this).val($(this).summernote('code'));
        });
    });
    createSummernote("#content", linkImageSummerNote, 750);

});
</script>
@include('admin.common.image.modal-media-gallery')


<div class="modal fade modal-image-summernote" data-keyboard="false" data-backdrop="static" role="dialog">
<div class="modal-lg modal-dialog ">
<div class="modal-content">
  <div class="modal-header">
     <button type="button" class="btn-close close-md" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
     <h4 class="modal-title">Image gallery</h4>
  </div>
  <div class="modal-body modal-scroll">
     <p class="text-danger" >no image was set. open the browser console to see if there is any errors messages. if not dig into source file to see what\s wrong.</p>

     <small class="text-muted">Or open an issue on github</small>
  </div>
  <div class="modal-footer">
     <a href="javascript:void(0);" class="pull-left open-upload1">
     <i class="fa fa-upload mr-xs"></i><span>Upload Files</span></a>
     <button type="button" id="close" class="btn btn-default close-md-gallery" data-bs-dismiss="modal">Close</button>
     <button type="button" id="save" class="btn btn-primary save-md-gallery">Add</button>
  </div>
</div>
</div>
</div>
<style>
#sortable li {
    margin: 3px 3px 3px 0;
    padding: 1px;
    float: left;
    width: 125px;
    height: 116px;
    font-size: 4em;
    text-align: center;
    background: transparent;
    border: none;
    list-style: none;
}
.badge.bg-secondary.active{
    background-color: #0f9cf3!important;
}


@endsection