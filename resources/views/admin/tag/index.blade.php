
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
                            <a class="btn btn-success float-end" href="/admin/post/add/{{$website -> id}}"> Add</a>
                        </div>
                        <div class="card-body">
                            @include('admin.common.alert')
                            <form action="/admin/tag/add" method="post" class="form-edit">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="input-group mb-md">
                                            <input id="name" placeholder="Add Tags" type="text" class="form-control" name="name" value=""/>
                                            <span class="input-group-btn">
                                            <button type="submit" id="btn-submit" class="btn btn-primary">Add</button>
                                            <input type="hidden" id="tags-id" name="id" value=""/>
                                            <input type="hidden" name="user_id" value="{{$website -> user_id}}"/>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Name</th>

                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data)
                                            @foreach($data as $key => $item)
                                            <tr>
                                                <td><input type="checkbox" value="{{ $item -> id  }}"></td>
                                                <td>{{ $item -> name }}</td>



                                                <td class="text-end">
                                                    <a href="javascript:void(0)" data-value="{{$item -> name}}" data-id="{{$item -> id}}" class="edit-tags mb-1 mt-1 me-1 btn btn-xs btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <button onclick="removeRow(this,{{ $item->id  }},'{{ '/admin/tag/delete'}}')" type="button" class="mb-1 mt-1 me-1 btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->

                </div>
        <!-- card -->

            </div>
    <!-- end Col-9 -->
    </div>


@endsection
@section('addJs')
<script>
    var linkAdd = '/admin/tag/add';
    var linkEdit = '/admin/tag/edit';
</script>
<script src="/theme-admin/js/post/tag.js"></script>
@endsection