
@extends('admin.layout')
@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-8">
            <div class="card border border-danger">
                <div class="card-header bg-transparent border-danger">
                    <h5 class="my-0 text-danger"><i class="mdi-alarm-panel-outline me-3"></i>{{$title}}</h5>
                </div>
                <div class="card-body">
                    @include('admin.common.alert')
                    <form action="/admin/user/edit/{{$data -> id}}" method="POST">
                        @csrf
                        <div class="row form-group mb-4">
                            <div class="col-sm-12">
                                <label class="col-form-label"> Name <span class="text-danger">(*)</span></label>
                                <input type="text" value="{{$data -> name}}" name="name" id="name" class="form-control" aria-required="true">
                            </div>
                            <div class="col-sm-12">
                                <label class="col-form-label"> Role <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="role">
                                    @foreach ($roles as $item )
                                    <option value="{{$item -> id}}" {{$data -> role ==$item -> id?'checked':'' }}>{{$item -> name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-form-label"> Email <span class="text-danger">(*)</span></label>
                                <input type="email" value="{{$data -> email}}" name="email" id="email" class="form-control" aria-required="true">
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->


    </div><!-- end row -->

@endsection