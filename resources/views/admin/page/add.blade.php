
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
                            <form action="/admin/page/add/{{$website -> id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group mb-2 mb-2">
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Name <span class="text-danger">(*)</span></label>
                                                <input name="name" type="text" class="form-control" id="name" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Status</label>
                                                    <label class="radio radio-outline-primary">
                                                        <input id="status_active" value="1" type="radio" name="status"><span>Active</span><span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-outline-primary">
                                                        <input id="status_inactive" value="0" type="radio" name="status" checked><span>Inactive</span><span class="checkmark"></span>
                                                    </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Page's Title <span class="text-danger">(*)</span></label>
                                                <input name="title" type="text" class="form-control" id="title" maxlength="200">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Page's Description</label>
                                                <input name="description" type="text" class="form-control" id="description" maxlength="300">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Keyword(s)</label>
                                                <input name="keyword" type="text" class="form-control" id="keyword"  maxlength="300">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Headline</label>
                                                <textarea class="form-control" name="banner_title" rows="2"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label">Headline Description</label>
                                                <textarea class="form-control" name="banner_description" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="media-gallery">
                                                <div class="mg-files">
                                                    <div class="col-sm-12 mb-2">
                                                        <div class="isotope-item document">
                                                            <div class="thumbnail">
                                                                <h5 class="mg-title text-weight-semibold">OG image
                                                                </h5>
                                                                <div class="thumb-preview">
                                                                    <a class="thumb-image" href="">
                                                                        <img src="{{DEFAULT_THUMBNAIL}}"
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
                                                                    id="image_banner2" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mt-4">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Save</button>
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
            $('#description').each(function(){
                $(this).val($(this).summernote('code'));
            });
        });
        createSummernote("#footer_text", linkImageSummerNote, 750);
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
 @endsection