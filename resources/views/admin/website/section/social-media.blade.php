<!-- Social Media -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Social Media</h3>
        </div>
    <div class="card-body">
        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Facebook</label>
            <div class="col-md-9">
                <input class="form-control" name="facebook" id="facebook" value="{{$data ->facebook}}" type="text" placeholder="facebook page here">
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Youtube</label>
            <div class="col-md-9">
                <input name="youtube" type="text" class="form-control" value="{{$data ->youtube}}" id="" placeholder="Youtube page here">
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Instagram</label>
            <div class="col-md-9">
                <input name="instagram" type="text" class="form-control" value="{{$data ->instagram}}" id="instagram" placeholder="Instagram page here">
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Linkedin</label>
            <div class="col-md-9">
                <input name="linkedin" type="text" class="form-control" value="{{$data ->linkedin}}" id="linkedin" placeholder="Linkedin page here">
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Zalo</label>
            <div class="col-md-9">
                <input name="zalo" type="text" class="form-control" value="{{$data ->zalo}}" id="zalo" placeholder="Zalo page here">
            </div>
        </div>
    </div>
</div>
<!-- end -->