
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
                            <a class="btn btn-success float-end" href="/admin/portfolio/add/{{$website -> id}}"> Add</a>
                        </div>
                        <div class="card-body">
                            <form class="mb-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="tex" class="form-control" name="name" value="{{request() -> name}}" placeholder="name">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="limit">
                                            <option value="10" {{request() -> limit == 10?'selected':''}}>Show 10 rows</option>
                                            <option value="30"  {{request() -> limit == 30?'selected':''}}>Show 30 rows</option>
                                            <option value="50" {{request() -> limit == 50?'selected':''}}>Show 50 rows</option>
                                            <option value="60"  {{request() -> limit == 60?'selected':''}}>Show 60 rows</option>
                                        </select>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Link Demo</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <th scope="row">{{$item ->id}}</th>
                                                <td>
                                                    <img src="{{$item -> thumbnail}}" height="50px"/>
                                                </td>
                                                <td>
                                                    <a href="/admin/portfolio/edit/{{$website->id}}/{{  $item->id }}">
                                                        {{$item ->name}} <i class="fas fa-pen"></i>
                                                    </a> <br/>
                                                    @php
                                                        $tags = $item -> getTags();
                                                    @endphp
                                                    @foreach ($tags as $t)
                                                    <label class="badge bg-info"><i class="fa fa-hashtag"></i> {{$t-> name}}</label>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{$website-> getDomain(1)}}{{getNewLink($item)}} "
                                                        target="_blank">
                                                        {{$website-> getDomain(1)}}{{getNewLink($item)}} <i class="fas fa-external-link-alt"></i>
                                                    </a><br/>
                                                    Publish at: {{date_format(date_create($item -> publish_at), 'Y-m-d')}}
                                                </td>
                                                <td>
                                                    <a class="text-success mr-2" href="/admin/portfolio/edit/{{$website->id}}/{{  $item->id }}"><i class="fas fa-pen"></i></a>
                                                    <a class="text-danger mr-2" href="#" onclick="removeRow(this,{{  $item->id  }},'{{ '/admin/portfolio/delete'}}')" ><i class="fas fa-trash-alt"></i></a>
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