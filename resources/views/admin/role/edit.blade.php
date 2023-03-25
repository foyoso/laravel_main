
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
                    <form action="/admin/role/edit/{{$data -> id}}" method="POST">
                        @csrf
                        <div class="row form-group mb-4">
                            <div class="col-sm-12">
                                <label class="col-form-label"> Name <span class="text-danger">(*)</span></label>
                                <input type="text" name="name" value="{{$data -> name}}" id="name" class="form-control" aria-required="true">
                            </div>
                            <div class="col-sm-12">
                                <label class="col-form-label"> Guard name <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="guard_name" disabled>
                                    <option value="user" {{$data -> guard_name == 'user'?'selected':''}}>user</option>
                                    <option value="admin" {{$data -> guard_name == 'admin'?'selected':''}}>admin</option>
                                </select>
                            </div>

                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12">
                                <h5>List permission</h5>
                            </div>
                        </div>
                        @foreach ($permissionGroups as $item)
                        <div class="row form-group mb-4">
                            <div class="col-md-4">
                                @php
                                $permissions = App\Models\User::getpermissionByGroupName($item->group_name, $data -> guard_name);
                                @endphp
                                <div class="form-check mb-3" >
                                    <input class="form-check-input" type="checkbox" value="{{$item -> group_name}}" id="formCheck_{{$item ->group_name}}"
                                    {{ App\Models\User::roleHasPermissions($data, $permissions) ? 'checked' : '' }} >
                                    <label class="form-check-label" for="formCheck_{{$item->group_name}}">
                                        {{$item ->group_name}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                @foreach($permissions as $permission)
                                <div class="form-check permission-ck {{$permission->guard_name}}">
                                    <input class="form-check-input"
                                    name="permission[]"
                                    type="checkbox" value="{{$permission->id}}"
                                    id="flexCheckDefault{{$permission->id}}"
                                    {{$data->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault{{$permission->id}}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
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