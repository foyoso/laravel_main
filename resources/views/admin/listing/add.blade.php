
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
                    <form action="/admin/listing/add/{{$website->id}}" id="addPost" method="POST">
                        @csrf
                        <div class="row form-group mb-2">
                            <div class="col-sm-9">

                                <section class="card card-modern">
                                    <div class="card-header">
                                        <span class="card-title"><strong>Detail</strong></span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Name<span class="text-danger"> (*)</span></label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Address<span class="text-danger"> (*)</span></label>
                                                <input type="text" name="address" id="address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Province<span class="text-danger"> (*)</span></label>
                                                <select name="province" id="province" class="form-control select2">
                                                    <option value="0">select Province </option>
                                                    @foreach ($province as $item )
                                                        <option value="{{$item -> idProvince}}">{{$item -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="col-form-label">District<span class="text-danger"> (*)</span></label>
                                                <select name="district" id="district" class="form-control select2">
                                                    <option value="0">select district </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Commune<span class="text-danger"> (*)</span></label>
                                                <select name="commune" id="commune" class="form-control select2">
                                                    <option value="0">select commune </option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-2">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary">Next <i class="fas fa-save"></i></button>
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

})
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
<script src="/theme-admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<link href="/theme-admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/theme-admin/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<script src="/theme-admin/libs/select2/js/select2.min.js"></script>

@endsection