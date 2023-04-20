
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
                                        <select class="form-control" name="sale_or_rent">
                                            <option value="0">All type</option>
                                            <option value="1"  {{request() -> sale_or_rent == 1?'selected':''}}>Sale</option>
                                            <option value="2" {{request() -> sale_or_rent == 2?'selected':''}}>Rent</option>
                                        </select>
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
                                        <th>Thumb</th>
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
                                                <a href="/admin/listing/edit/{{$website->id}}/{{  $item->id }}">
                                                    {{$item ->name}} <i class="fas fa-pen"></i>
                                                </a><br/>
                                                <i class="fas fa-map-marker-alt"></i> {{$item -> address}}
                                            </td>

                                            <td>
                                                <a href="{{$website-> getDomain(1)}}{{getListingLink($item)}} "
                                                    target="_blank">
                                                    {{$website-> getDomain(1)}}{{getListingLink($item)}} <i class="fas fa-external-link-alt"></i>
                                                </a> <br/>
                                                @if ($item->sale_or_rent == 1)
                                                <label  class="badge bg-info">For Sale </label>
                                                @endif
                                                @if ($item->sale_or_rent == 2)
                                                <label  class="badge bg-warning">For Rent</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="text-success mr-2" href="/admin/listing/edit/{{$website->id}}/{{  $item->id }}"><i class="fas fa-pen"></i></a>
                                                <a class="text-danger mr-2" href="#" onclick="removeRow(this,{{  $item->id  }},'{{ '/admin/listing/delete'}}')" ><i class="fas fa-trash-alt"></i></a>
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