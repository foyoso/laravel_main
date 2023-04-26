
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
                    <form action="/admin/portfolio/add/{{$website->id}}" id="addPost" method="POST">
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
                                                <label class="col-form-label">Description<span class="text-danger"> (*)</span></label>
                                                <input type="text" name="description" id="description" maxlength="155" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group mb-2">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Publish Day<span class="text-danger"> (*)</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input class="form-control datepicker"  value="{{date('Y-m-d')}}" type="text" placeholder="publish at"  name="publish_at" aria-describedby="basic-addon1">
                                                </div>
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
})
</script>
<script src="/theme-admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<link href="/theme-admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection