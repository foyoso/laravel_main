
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
                            <a class="btn btn-success float-end" href="/admin/page/add/{{$website -> id}}"> Add</a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item ->id}}</th>
                                            <td> <a href="/admin/page/edit/{{$website->id}}/{{  $item->id }}">{{$item ->name}} <i class="fas fa-pencil-alt"></i></a></td>
                                             <td><a href="{{$website-> getDomain(1)}}{{$item-> slug}}" target="_blank">{{$website-> getDomain(1)}}{{$item-> slug}} <i class="fas fa-external-link-alt"></i></a> </td>

                                            <td>
                                                <a class="text-success mr-2" href="/admin/page/edit/{{$website->id}}/{{  $item->id }}"><i class="fas fa-pen"></i></a>
                                                <a class="text-danger mr-2" href="#" onclick="removeRow(this,{{  $item->id  }},'{{ '/admin/page/delete'}}')" ><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div><!-- end card -->



                <div class="card border border-danger">
                    <div class="card-header bg-transparent border-danger">
                        <h5 class="my-0 text-danger"><i class="mdi-alarm-panel-outline me-3"></i>Page default</h5>

                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Url</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pageDefault as $item)
                                    <tr>
                                        <th scope="row">{{$item ->id}}</th>
                                        <td>
                                            <a href="/admin/page/edit/{{$website->id}}/{{  $item->id }}" target="_blank">{{$item ->name}} <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{$website-> getDomain(1)}}{{$item-> slug}}"
                                                target="_blank">
                                                {{$website-> getDomain(1)}}{{$item-> slug}} <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="text-success mr-2" href="/admin/page/edit/{{$website->id}}/{{  $item->id }}"><i class="fas fa-pen"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div><!-- end card -->




    </div>
    <!-- end Col-9 -->

    </div>
    <!-- end row -->

@endsection