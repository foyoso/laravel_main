<!-- Social Media -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Social Media</h3>
        </div>
    <div class="card-body">
        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Facebook</label>
            <div class="col-md-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >https://www.facebook.com/</span>
                    </div>
                    <input class="form-control" name="facebook" id="facebook" value="{{$data ->facebook}}" type="text" placeholder="facebook page id here">
                </div>
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Youtube</label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text">https://www.youtube.com/</span>
                    </span>
                    <input name="youtube" type="text" class="form-control" value="{{$data ->youtube}}" id="" placeholder="Youtube page id here">
                </div>
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Instagram</label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text">https://www.instagram.com/</span>
                    </span>
                    <input name="instagram" type="text" class="form-control" value="{{$data ->instagram}}" id="instagram" placeholder="Instagram page id here">
                </div>
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Linkedin</label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text">https://www.linkedin.com/</span>
                    </span>
                    <input name="linkedin" type="text" class="form-control" value="{{$data ->linkedin}}" id="linkedin" placeholder="Linkedin page id here">
                </div>
            </div>
        </div>

        <div class="row form-group mb-3">
            <label class="col-md-3 col-form-label">Twitter</label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text">https://twitter.com/</span>
                    </span>
                    <input name="twitter" type="text" class="form-control" value="{{$data ->twitter}}" id="twitter" placeholder="Twitter page id here">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->