<!-- setting -->
<?php
    if (!empty($setting -> st_customization_template)) {
        $custom = json_decode($setting -> st_customization_template, true);
    } else {
        $custom = "";
    }
    //echo $custom['website_type']; exit;
?>
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">General Settings</h3>
    </div>
    <div class="card-body">
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

    </div>
</div>