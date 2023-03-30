
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
                        <form action="/admin/listing/edit/{{$website->id}}/{{$data->id}}" method="POST" id="addPost">
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
                                                <input value="{{$data -> name}}" type="text" name="name" id="name" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-12">
                                                <label class="">Listing Type<span class="text-danger"> (*)</span></label>
                                                <div class="col-lg-12">
                                                    <label class="radio-inline">
                                                        <input name="sale_or_rent" type="radio" value="1" id="inlineCheckbox1" <?php echo $data -> sale_or_rent == 1?'checked':''?>>
                                                        Sale </label>
                                                    <label class="radio-inline">
                                                        <input name="sale_or_rent" type="radio" value="2" id="inlineCheckbox2" <?php echo $data -> sale_or_rent == 2?'checked':''?>>
                                                        Rent </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Address<span class="text-danger"> (*)</span></label>
                                                <input type="text" name="address" id="address" class="form-control" value="{{$data -> address}}">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Province<span class="text-danger"> (*)</span></label>
                                                <select name="province" id="province" class="form-control select2">
                                                    <option value="0">select Province </option>
                                                    @foreach ($province as $item )
                                                        <option value="{{$item -> idProvince}}" {{$data -> province == $item -> idProvince?'selected':''}}>{{$item -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">District<span class="text-danger"> (*)</span></label>
                                                <select name="district" id="district" class="form-control select2">
                                                    <option value="0">select district </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Commune<span class="text-danger"> (*)</span></label>
                                                <select name="commune" id="commune" class="form-control select2">
                                                    <option value="0">select commune </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3">
                                                <label>Price<span class="text-danger"> (*)</span></label>
                                                <input value="{{$data -> price}}" type="text" name="price" id="price" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="">Bedroom(s)<span class="text-danger"> (*)</span></label>
                                                <select data-plugin-selectTwo class="form-control" id="bedroom" name="bedroom">

                                                    <?php foreach($beds as  $item){?>
                                                        <option value="{{$item -> id}}" {{$item -> id == $data ->bedroom?'selected':'' }} > {{$item -> name}}</option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="">Bathroom(s)<span class="text-danger"> (*)</span></label>
                                                <select data-plugin-selectTwo class="form-control" id="bathroom" name="bathroom">
                                                    <?php foreach($baths as  $item){?>
                                                        <option value="{{$item -> id}}" {{$item -> id == $data ->bathroom?'selected':'' }} > {{$item -> name}}</option>
                                                    <?php }?>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label>Area(m2)<span class="text-danger"> (*)</span></label>
                                                <input value="{{$data -> area}}" type="text" name="area" id="area" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group mb-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Content<span class="text-danger"> (*)</span></label>
                                                <textarea cols="3" name="description" class="form-control" id="description">{{$data -> description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 multiple-image">
                                                    <ul id="sortable">
                                                        <?php if ($data -> images != "") { ?>
                                                            <?php $listImages = explode(',', $data -> images); ?>
                                                            <?php if (count($listImages) > 0) { ?>
                                                            <?php foreach($listImages as $image) { ?>
                                                                <li class="ui-state-default">
                                                                <div class="img-upload-box form-group">
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


                                                            <div class="img-upload-box form-group btn-add-item-image">
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
                                                                    <a class="thumb-image" href="javascript:void(0)"> <img src="{{$data -> thumbnail==''?'/theme-admin/images/default-thumbnail.jpeg':$data -> thumbnail}}" class="img-responsive thumb" alt="Project"> </a>

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

<script src="/theme-admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<link href="/theme-admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

<link href="/theme-admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<script src="/theme-admin/libs/select2/js/select2.min.js"></script>

<link rel="stylesheet" href="/theme-admin/libs/summernote8/summernote.css">
<script type="text/javascript" src="/theme-admin/libs/summernote8/summernote.js"></script>
<script type="text/javascript" src="/theme-admin/libs/summernote8/summernote-gallery-extension.js"></script>
<script type="text/javascript" src="/theme-admin/js/image/open-media-gallery-file.js"></script>
<script src="/theme-admin/js/listing/add.js"></script>
<script>
var imageFolder ='listing/listing_{{$website -> id}}';
var linkImageSummerNote = "/admin/image/getForAjax?folder=" + imageFolder ;
var province = '{{$data -> province}}';
var commune = '{{$data -> commune}}';
var district = '{{$data -> district}}';
$(document).ready(function() {
    $('#vertical-menu-btn').click();
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd"
    });
    $('#btnSubmit').on('click', function(){
        $('#content').each(function(){
            $(this).val($(this).summernote('code'));
        });
    });
    createSummernote("#description", linkImageSummerNote, 750);
    $('.select2').select2()

    $('#province').on('change', function(){
        var val = $(this).val();
        var data = getLocation('/location/getDistrict', {id:val});
        $('#district').html(createOption(data, 'district', 'idDistrict'));
    })
    $('#district').on('change', function(){
        var val = $(this).val();
        var data = getLocation('/location/getCommune', {id:val});
        $('#commune').html(createOption(data, 'commune', 'idCommune'));
    })
    $('#province').change();
    $('#district').val(district);
    $('#district').change(),
    $('#commune').val(commune);

});

function getLocation(url, dataajax){
    $res = null;
    $.ajax({
        url,
        type: 'POST',
        data: dataajax,
        dataType: 'json',
        async: false,
        success: function (data) {
            // gọi function append vào html
            if (data.status) {
                res =  data.data;
            }
        }
    });
    return res;
}
function createOption(data, text, id){
    var html = '<option value="0"> Select '+text+' </option>';
    data.forEach(element => {
        html += '<option value="'+element[id]+'">'+element.name+' </option>';
    });
    return html;
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