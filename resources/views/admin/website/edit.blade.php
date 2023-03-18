
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
@endsection