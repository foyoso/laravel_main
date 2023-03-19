
@extends('admin.layout')
@section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{$data -> name}}</h4>

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
                            <form action="/admin/website/edit/{{$data -> id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        @include('admin.website.section.setting')
                                        @include('admin.website.section.contact')
                                        @include('admin.website.section.social-media')
                                        @include('admin.website.section.footer')
                                    </div>
                                    <!-- col 2-->
                                    <div class="col-md-6">

                                        @include('admin.website.section.domain')
                                        @include('admin.website.section.expiry')
                                        @include('admin.website.section.ads')

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-danger">Save</button>
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
    var imageFolder ='website/website_{{$data -> id}}';
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

<style>
    .tag-content span {
        font-weight: normal;
        cursor: pointer;
    }
    span.active {
        background-color: #1F7DBB;
        color: white;
    }
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
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
    }
    li.ui-state-default:hover{
        cursor: move;
    }
</style>
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