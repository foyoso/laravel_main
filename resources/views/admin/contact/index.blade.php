
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
                            <a class="btn btn-success float-end" href="/admin/listing/add/{{$website -> id}}"> Add</a>
                        </div>
                        <div class="card-body">
                            <form class="mb-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="tex" class="form-control" name="name" value="{{request() -> name}}" placeholder="name">
                                    </div>



                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item ->id}}</th>
                                            <td>
                                                {{$item -> name}}
                                            </td>
                                            <td>
                                                {{$item -> email}}
                                            </td>
                                            <td>
                                                {{$item -> phone}}
                                            </td>
                                            <td>
                                                {{$item -> message}}
                                            </td>
                                            <td>
                                                <a class="text-danger mr-2" href="#" onclick="removeRow(this,{{  $item->id  }},'{{ '/admin/contact/delete'}}')" ><i class="fas fa-trash-alt"></i></a>
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
            </div><!-- end card -->

        </div>
        <!-- card -->

    </div>
    <!-- end Col-9 -->

</div>
<!-- end row -->

@endsection