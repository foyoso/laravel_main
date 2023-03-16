<!--contact -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Contact</h3>
    </div>
    <div class="card-body">
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-md-6">
                    <label class="col-form-label">Phone Number for Call</label>
                    <input name="phone" value="{{$data -> phone}}" type="text" class="form-control" id="phone" maxlength="20">
                </div>
                <div class="col-md-6">
                    <label class="col-form-label">Email Address <span class="text-danger"> (*)</span></label>
                    <input name="email" value="{{$data -> email}}" type="text" class="form-control" id="email" maxlength="100" aria-required="true">
                </div>
            </div>
        </div>
    </div>
</div>