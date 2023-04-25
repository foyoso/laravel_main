<!-- setting -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">General Settings</h3>
    </div>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-md-12">
                <label class="control-label">Website Name <span class="text-danger"> (*)</span></label>
                <input name="name" type="text" class="form-control" id="name" value="{{$data-> name}}" maxlength="100">
            </div>
            <div class="col-sm-12">
                <label class="col-form-label">User <span class="text-danger">(*)</span></label>
                <select name="user_id" class="form-control">
                    @foreach ($user as $item )
                        <option {{$data-> user_id == $item -> id ?'selected':''}} value="{{$item -> id}}">{{$item -> name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12">
                <label class="col-form-label">Type <span class="text-danger">(*)</span></label>
                <select name="website_type_id" class="form-control">
                    @foreach ($types as $item )
                        <option value="{{$item -> id}}" {{$data-> website_type_id == $item -> id ?'selected':''}}>{{$item -> name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <label class="col-form-label">Layout Template</label>
                <select data-plugin-selecttwo="" class="form-control layout_id select2-hidden-accessible" name="layout_id" tabindex="-1" aria-hidden="true">
                    <?php foreach ($layout as  $item) {?>
                        <option value="{{$item -> id}}" {{$data-> layout_id == $item -> id ?'selected':''}}>{{$item -> name}}</option>
                    <?php }?>
                 </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label class="">Country</label>
                <select  class="form-control layout_id" name="country_id">
                    <option value="">VN</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-6 col-xs-6 col-lg-4 form-group">
                <div class="media-gallery">
                    <div class="mg-files">
                        <label class="control-label">Logo</label>
                        <div class="isotope-item document">
                            <div class="thumbnail">
                                <div class="thumb-preview">
                                    <img src="{{$data -> logo == "" ? DEFAULT_THUMBNAIL : $data-> logo}}" class="img-responsive logo">
                                </div>
                                <div class="button-add text-center">
                                    <button class="btn btn-primary btn-icon m-1" type="button" onclick="openMediaGallery('#logo', '.logo', 1)">
                                        <span class="ul-btn__icon">
                                            <i class="i-Add"></i>
                                        </span>
                                        <span class="ul-btn__text">Add</span>
                                    </button>
                                    <button class="btn btn-primary btn-icon m-1" type="button" onclick="clearImage('.logo', '#logo', '{{DEFAULT_THUMBNAIL}}')">
                                        <span class="ul-btn__icon">
                                            <i class="i-File-Trash"></i>
                                        </span>
                                        <span class="ul-btn__text">Clear</span>
                                    </button>
                                </div>
                                <input type="hidden" name="logo" id="logo" value="{{$data -> logo == "" ? DEFAULT_THUMBNAIL : $data-> logo}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xs-6 col-lg-4 form-group">
                <div class="media-gallery">
                    <div class="mg-files">
                        <label class="control-label">Favicon</label>
                        <div class="isotope-item document">
                            <div class="thumbnail">
                                <div class="thumb-preview">
                                    <img src="{{$data -> favicon == "" ? DEFAULT_THUMBNAIL : $data-> favicon}}" class="img-responsive favicon">
                                </div>

                                <div class="button-add text-center">
                                    <button class="btn btn-primary btn-icon m-1" type="button" onclick="openMediaGallery('#favicon', '.favicon', 1)">
                                        <span class="ul-btn__icon">
                                            <i class="i-Add"></i>
                                        </span>
                                        <span class="ul-btn__text">Add</span>
                                    </button>
                                    <button class="btn btn-primary btn-icon m-1" type="button" onclick="clearImage('.favicon', '#favicon', '{{DEFAULT_THUMBNAIL}}')">
                                        <span class="ul-btn__icon">
                                            <i class="i-File-Trash"></i>
                                        </span>
                                        <span class="ul-btn__text">Clear</span>
                                    </button>
                                </div>
                                <input type="hidden" name="favicon" id="favicon" value="{{$data -> favicon == "" ? DEFAULT_THUMBNAIL : $data-> favicon}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>