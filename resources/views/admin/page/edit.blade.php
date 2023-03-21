
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
                            <form action="/admin/page/edit/{{$website->id}}/{{$data->id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2">
                                            <div class="col-sm-12">
                                                <label class="">Name <span class="text-danger">(*)</span></label>
                                                <input name="name" value="{{$data -> name}}" type="text" class="form-control" id="name" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Status</label>
                                                    <label class="radio radio-outline-primary">
                                                        <input id="status_active" {{$data -> status == 1?'checked':''}} value="1" type="radio" name="status"><span>Active</span><span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-outline-primary">
                                                        <input id="status_inactive" {{$data -> status == 0?'checked':''}} value="0" type="radio" name="status"><span>Inactive</span><span class="checkmark"></span>
                                                    </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Page's Title <span  class="text-danger">(*)</span></label>
                                                <input name="title" value="{{$data -> title}}" type="text" class="form-control" id="title" maxlength="200">
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Page's Description</label>
                                                <input name="description" type="text" value="{{$data ->description}}" class="form-control" id="description" maxlength="300">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Keyword(s)</label>
                                                <input name="keyword" type="text" value="{{$data ->keyword}}" class="form-control" id="keyword" maxlength="300">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Headline</label>
                                                <textarea class="form-control" name="banner_title" rows="2">{{$data ->banner_title}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="">Headline Description</label>
                                                <textarea class="form-control" name="banner_description"
                                                    rows="4">{{$data ->banner_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label>Page Header</label>
                                                <select id="slide_setting" name="banner_type" class="form-control">
                                                    <option value="0" <?php echo $data ->banner_type == 0?'selected':'';?>> Hide Banner</option>
                                                    <option value="1" <?php echo $data ->banner_type == 1?'selected':'';?>> Use Single Image</option>
                                                    <option value="2" <?php echo $data ->banner_type == 2?'selected':'';?>> Use Image Sliders</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 banner-image">
                                            <div class="media-gallery">
                                                <div class="mg-files">
                                                    <div class="isotope-item document">
                                                        <div class="thumbnail">
                                                            <h5 class="mg-title text-weight-semibold">Banner Image
                                                            </h5>
                                                            <div class="thumb-preview">
                                                                <a class="thumb-image" href="">
                                                                    <img src="{{$data -> image_banner !=''? $data -> image_banner : DEFAULT_THUMBNAIL}}"
                                                                        class="img-responsive thumb" alt="Project">
                                                                </a>

                                                            </div>
                                                            <div class="button-add text-center">
                                                                <button
                                                                    onclick="openMediaGallery('#image_banner', '.thumb', 1)"
                                                                    type="button"
                                                                    class="btn btn-primary btn-icon m-1 btn-add-one-image">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    Add image
                                                                </button>
                                                            </div>
                                                            <input type="hidden" name="image_banner" id="image_banner" value="{{$data -> image_banner}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4 slider-image">
                                            <section class="card card-modern mb-4">
                                                <div class="card-header">
                                                    <span class="card-title"><strong>Images</strong></span>
                                                </div>
                                                <div class="card-body">
                                                    <div class=" multiple-image">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <ul id="sortable">
                                                                        <?php if ($data -> image_slider != "") { ?>
                                                                            <?php $listImages = explode(',', $data -> image_slider); ?>
                                                                            <?php if (count($listImages) > 0) { ?>
                                                                            <?php foreach($listImages as $image) { ?>
                                                                                <li class="ui-state-default">
                                                                                <div class="img-upload-box form-group mb-2">
                                                                                <div class="image-1 one-image">
                                                                                    <input class="image_slides" type="hidden" name="image_slides[]" value="<?php echo $image ?>">
                                                                                    <div style="display: none" class="image-upload">
                                                                                        <span><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>
                                                                                    </div>
                                                                                    <div class="image-success-2 image-up-success">
                                                                                        <img class="show-image-upload" src="<?php echo $image ?>">
                                                                                        <div class="img-delete btn-delete-image-3">
                                                                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </li>
                                                                            <?php } ?>
                                                                            <?php } } ?>


                                                                            <div class="img-upload-box form-group mb-2 btn-add-item-image">
                                                                                <div class="image-1 one-image" onclick="openMediaGallery('', '', 2, 1)">
                                                                                    <input class="postImage img2 btn-select-image-2" type="text">
                                                                                    <div class="image-upload">
                                                                                        <i class="fas fa-image" style="font-size: 55px;"></i>

                                                                                        <span><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>
                                                                                    </div>
                                                                                    <div class="image-success-2 image-up-success" style="display: none">
                                                                                        <img class="show-image-upload" src="">
                                                                                        <input type="hidden" name="images[]" class="images" value="" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="">Review </label>
                                                <input name="review" value="{{$data -> review}}" type="number" class="form-control" id="review" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="">Rating </label>
                                                <input name="rating" value="{{$data -> rating}}" type="number" class="form-control" id="rating" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="media-gallery">
                                                <div class="mg-files">
                                                    <div class="col-sm-12 mb-4">
                                                        <div class="isotope-item document">
                                                            <div class="thumbnail">
                                                                <h5 class="mg-title text-weight-semibold">OG image
                                                                </h5>
                                                                <div class="thumb-preview">
                                                                    <a class="thumb-image" href="">
                                                                        <img src="{{$data -> og_image !=''? $data -> og_image : DEFAULT_THUMBNAIL}}"
                                                                            class="img-responsive thumb2"
                                                                            alt="Project" />
                                                                    </a>
                                                                </div>
                                                                <div class="button-add text-center">
                                                                    <button
                                                                        onclick="openMediaGallery('#image_banner2', '.thumb2', 1)"
                                                                        type="button"
                                                                        class="btn btn-primary btn-icon m-1 btn-add-one-image">
                                                                        <i class="fa fa-plus"
                                                                            aria-hidden="true"></i>
                                                                        Add image
                                                                    </button>
                                                                </div>
                                                                <input type="hidden" name="og_image"
                                                                    id="image_banner2" value="{{$data -> og_image}}" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 ">
                                    <div class="col-md-12 ">
                                        <div class="col-sm-12">
                                             <textarea name="html_content" id="content">{{$data -> html_content}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 ">
                                    <div class="col-md-12 ">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Save</button>
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
        $('#slide_setting').on('change', function(){
                $('.slider-image').removeClass('d-none');
                $('.banner-image').removeClass('d-none');
                var val = $(this).val();
                activeBanner(val);
            });
            activeBanner($('#slide_setting').val());
    });
    function activeBanner(val){
            if(val == 0){
                $('.slider-image').addClass('d-none');
                $('.banner-image').addClass('d-none');
            } else if( val == 1){
                $('.slider-image').addClass('d-none');
                $('.banner-image').removeClass('d-none');
            } else {
                $('.slider-image').removeClass('d-none');
                $('.banner-image').addClass('d-none');

            }
        }
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


 @endsection