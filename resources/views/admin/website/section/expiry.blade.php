<!-- Expiry & Renewal -->
<div class="card mb-4 border border-primary">
    <div class="card-header">
        <h3 class="card-title mb-3">Expiry & Renewal </h3>
    </div>
    <div class="card-body">

        <div class="row form-group">
            <div class="col col-xs-12 form-group">
                <label class="col-form-label">Start date</label>
                <div class="input-group"  >
                    <input type="text" class="form-control datepicker" value="<?php $data->start_date ?>" autocomplete="off"  placeholder="start date"  name="start_date">
                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
            </div>
            <div class="col col-xs-12 date_end form-group">
                <label class="col-form-label">End date</label>
                <div class="input-group"  >
                    <input type="text" class="form-control datepicker" value="<?php $data->end_date ?>" autocomplete="off"   placeholder="end date"  name="end_date">
                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
            </div>
        </div>


    </div>
</div>