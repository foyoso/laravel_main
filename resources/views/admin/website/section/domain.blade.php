 <!-- domain-->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Domain Mapping</h3>
        </div>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-md-3">
                <label class="control-label">Protocol</label>
                <select class="form-control valid" name="protocol" aria-invalid="false">
                    <option value="https" {{$data -> protocol == 'https'?'selected':''}} >https://</option>
                    <option  value="http" {{$data -> protocol == 'http'?'selected':''}}>http://</option>
                </select>
            </div>
            <div class="col-md-9">
                <label class="control-label">Domain</label>
                <input type="text" name="domain" value="{{$data -> domain}}" placeholder="Domain" class="form-control">
            </div>
        </div>
    </div>
</div>