<!-- Google Ads & Facebook Ads Settings -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Google Ads & Facebook Ads Settings</h3>
    </div>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-md-12 form-group">
                <label class="col-form-label">Google Global Site Tag : Google Analytics | Google Ads
                    <span class="tag label label-primary">(Copy Full Global Site Tag from Google)</span><br>
                    (code will be placed in head tag)</label>
                <textarea rows="8" name="google_analytic" id="google_analytic" class="form-control">{{$data -> google_analytic }}</textarea>
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label"> Google Seach Console: Site Verification
                    <span class="tag label label-primary">(Copy Full Meta Tags from Google)</span>
                    <br>(code will be placed in head
                    tag)</label>
                <textarea rows="2" name="google_site_verification" id="google_site_verification" class="form-control">{{$data -> google_site_verification}}</textarea>
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Google Remarketing Tag <span class="tag label label-primary">(Copy full script from
                        Google)</span><br>(code will be placed in body tag)</label>
                <textarea rows="5" class="form-control" name="remarketing_tag">{{$data -> remarketing_tag}}</textarea>
            </div>
            <div class="col-md-12 form-group">
                <label class="col-form-label">Facebook Pixel Code <span class="tag label label-primary">(Copy full script from
                        Facebook)</span><br>(code will be placed in head tag)</label>
                <textarea class="form-control" rows="10" name="facebook_pixel_code">{{$data -> facebook_pixel_code}}</textarea>
            </div>
            <div class="col-md-12 form-group">
                <label class="checkbox checkbox-outline-primary">
                    <input type="checkbox"  name="enable_custom_robots" id="enable_custom_robots-cb" {{$data ->enable_custom_robots ==1?'checked':''}}>
                    <span>Enable Custom Robots.txt</span><span class="checkmark"></span>
                </label>

            </div>
        </div>
        <div class="row form-group" id="robots" style="display: none;">
            <div class="col-md-12 form-group">
                <textarea class="form-control" rows="6" name="robots"></textarea>
            </div>
        </div>
        <div class="row form-group" id="robots" style="">
            <div class="col-md-12 form-group">
                <textarea class="form-control valid" rows="6" name="robots" aria-invalid="false">{{$data -> robots}}</textarea>
            </div>
        </div>
    </div>
</div>
<!-- end -->