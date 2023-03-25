
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
        <div class="col-lg-12 mb-4">
            <a href="/admin/user/add" class="btn btn-success waves-effect waves-light">
                <i class="fas fa-folder-plus mr-1"></i> Add User
            </a>
        </div>
        <div class="col-lg-12">
            @include('admin.common.alert')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{$item ->id}}</th>
                                        <td>{{$item ->name}}</td>
                                        <td>{{$item ->email}}</td>
                                        <td>
                                            @foreach($item->roles as $role)
                                            <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                            @endforeach</td>

                                        <td>
                                            <a class="text-success mr-2" href="/admin/user/edit/{{  $item->id }}"><i class="fas fa-pen"></i></a>
                                            <a class="text-danger mr-2" href="#" onclick="removeRow(this,{{  $item->id  }},'{{ '/admin/user/delete'}}')" ><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            {!! $data->links('vendor.pagination.bootstrap-5') !!}

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection