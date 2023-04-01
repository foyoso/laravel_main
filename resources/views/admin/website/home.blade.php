
@extends('admin.layout')
@section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Menu</h4>

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


                            <!-- LISTING -->
                            <section class="card mt-4">
                                <header class="card-header">
                                    <h2 class="card-title mb-3">Listing</h2>
                                </header>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <section class="card ">
                                                <header class="card-header">
                                                    <h2 class="card-title mb-3">Available Listings</h2>
                                                </header>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php
                                                        foreach ($listingEnable as $item) {?>
                                                            <div class="col-sm-6">



                                                                <div class="form-check mb-3">
                                                                    <input
                                                                    data-name="{{$item ->name}}"   <?php echo in_array($item->id, $arrIdsListing) == true? ' checked disabled':''?>
                                                                    value="{{$item ->id}}" name="home_listing[]" id="checkboxExample{{$item ->id}}"
                                                                    class="form-check-input ck-box" type="checkbox" >
                                                                    <label class="form-check-label" for="checkboxExample{{$item ->id}}">
                                                                        {{$item ->name}}
                                                                    </label>
                                                                </div>


                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <button class="btn btn-primary btn-add-listing pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add to Home Listing</button>
                                                </footer>
                                            </section>
                                        </div>
                                        <div class="col-md-6">
                                            <section class="card ">
                                                <header class="card-header">
                                                    <h2 class="card-title mb-3">Sort Listing</h2>
                                                </header>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <ul id="sortable-listing"  class="sortable-ui"  style="width:100%">
                                                        <?php
                                                            foreach ($listingHome as $item) {?>
                                                                <li data-id="{{$item ->id}}" id="index-{{$item ->id}}" class="ui-state-default index row">
                                                                    <div class="col-md-9">
                                                                        <span class="ui-icon ui-icon-arrowthick-2-n-s "></span>
                                                                        {{$item ->name}}
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button type="button" data-id ="{{$item ->id}}"  class="btn-remove mb-xs mt-xs mr-xs btn btn-default float-end top"><i class="fa fa-times" aria-hidden="true"></i> </button>
                                                                    </div>
                                                                </li>
                                                            <?php }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <button class="btn btn-primary btn-save-listing pull-center"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save </button>
                                                </footer>
                                            </section>
                                        </div>

                                    </div>
                                </div>
                            </section>

                            <!-- NEWS -->
                            <section class="card mt-4">
                                <header class="card-header">
                                    <h2 class="card-title mb-3">News</h2>
                                </header>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <section class="card ">
                                                <header class="card-header">
                                                    <h2 class="card-title mb-3">Available News</h2>
                                                </header>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <?php
                                                        foreach ($newsEnable as $item) {?>
                                                            <div class="col-sm-6">
                                                                <div class="form-check mb-3">
                                                                    <input
                                                                    data-name="{{$item ->name}}"   <?php echo in_array($item->id, $arrIdsNews) == true? ' checked disabled':''?>
                                                                    value="{{$item ->id}}" name="home_post[]" id="new{{$item ->id}}"
                                                                    class="form-check-input ck-box" type="checkbox" >
                                                                    <label class="form-check-label" for="new{{$item ->id}}">
                                                                        {{$item ->name}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <button class="btn btn-primary btn-add-news pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add to Home News</button>
                                                </footer>
                                            </section>
                                        </div>
                                        <div class="col-md-6">
                                            <section class="card ">
                                                <header class="card-header">
                                                    <h2 class="card-title mb-3">Sort News</h2>
                                                </header>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <ul id="sortable-news"  class="sortable-ui" style="width:100%">
                                                        <?php
                                                            foreach ($newsHome as $item) {?>
                                                                <li data-id="{{$item ->id}}" id="index-{{$item ->id}}" class="ui-state-default index row">
                                                                    <div class="col-md-9">
                                                                        <span class="ui-icon ui-icon-arrowthick-2-n-s "></span>
                                                                        {{$item ->name}}
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button type="button" data-id ="{{$item ->id}}"  class="btn-remove mb-xs mt-xs mr-xs btn btn-default float-end top"><i class="fa fa-times" aria-hidden="true"></i> </button>
                                                                    </div>
                                                                </li>
                                                            <?php }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <footer class="card-footer">
                                                    <button class="btn btn-primary btn-save-news pull-center"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save </button>
                                                </footer>
                                            </section>
                                        </div>

                                    </div>
                                </div>
                            </section>






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

<script language="javascript" src="/theme-admin/libs/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script language="javascript" src="/theme-admin/libs/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
<script language="javascript" src="/theme-admin/js/website/home.js" type="text/javascript"></script>
<style>
    .select-protocal li:hover {
        background-color: #d4dce1;
    }
    .select-protocal li {
        cursor: pointer;
        padding-left: 5px;
    }
    .btn-content{
        height:100%;
        display: table-row;
    }
    .btn-action{
        text-align: center;
        margin-top: calc(50%);
    }
    .btn-action a{
        width: 100%;
    }

    .btn-action a i{
        font-size: 20px;
        color: #deab15;
    }

</style>
<script>
    var websiteId = {{$website -> id}};
    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();

        $( "#sortable-listing" ).sortable();
        $( "#sortable-listing" ).disableSelection();

        $( "#sortable-news" ).sortable();
        $( "#sortable-news" ).disableSelection();
    } );

</script>



<style>
        .sortable-ui li:hover {
            cursor: move;
        }
        .sortable-ui li {
            height: 50px;
        }
        .sortable-ui li span {
            position: inherit;
        }
    </style>
<textarea class="hide li-item">
    <li data-id="{0}" id="index-{0}" class="ui-state-default index row">
        <div class="col-md-9">
            <span class="ui-icon ui-icon-arrowthick-2-n-s "></span>
            {1}
        </div>
        <div class="col-md-3">
            <button type="button" data-id ="{0}"  class="btn-remove mb-xs mt-xs mr-xs btn btn-default float-end top"><i class="fa fa-times" aria-hidden="true"></i> </button>
        </div>
    </li>
</textarea>
@endsection