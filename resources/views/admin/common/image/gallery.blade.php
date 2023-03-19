<div class="row">
    <?php
        foreach ($data as $item) {
          if (count($item ->
    subFiles) == 0) { ?>
    <div class="col-md-2 img-item">
        <img
            class="col-md-12 thumbnail thumbnail-custom"
            data-src="{{$item->path}}"
            alt=""
            style="background-image: url('{{$item->path}}'); "
        />
        <i class="fa fa-check"></i>
    </div>
    <?php }}?>
</div>
<style media="screen">
    .selected-img {
        background-color: #eee;
        border-color: #0088cc;
    }
    .thumbnail {
        padding: 0px;
    }
    .img-item .fa-check {
        position: absolute;
        top: -5px;
        right: 30px;
        font-size: 20px;
        color: #337ab7;
    }
    .thumbnail-custom {
        width: 100px;
        height: 95px;
        background-size: 100px auto;
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</style>
