<?php
    foreach ($data as $item) {
        if (count($item -> subFiles) > 0) {
            continue;
        }
?>
<div class="file">
    <div class="thumbnail thumbnail-selected thumbnail-selected-custom">
        <div class="thumb-preview">
            <div class="imgpad10px">
                <a class="thumb-image bgimg image-item" href="javascript:void(0);"
                data-src="{{$item->path}}"
                style="background-image: url('{{$item->thumb}}');"> </a>
            </div>
            <div class="mg-toolbar mg-toolbar-custom">
                <div class="nameimg" title="">
                    {{$item->name}}
                </div>
            </div>
        </div>
    </div>
</div>
<?php    } ?>
