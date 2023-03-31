
@extends('admin.layout')
@section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Menu</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                            <li class="breadcrumb-item active">Read Email</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @include('admin.website.common.menu')
                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">
                    <div class="card border border-danger">
                        <div class="card-header bg-transparent border-danger">
                            <h5 class="my-0 text-danger"><i class="mdi-alarm-panel-outline me-3"></i>{{$title}}</h5>
                        </div>
                        <div class="card-body">
                            @include('admin.common.alert')
                            <div class="row">
                                <div class="form-group searchstyle">
                                    <form action="/admin/website/menu/{{$website ->id}}" id="menu_type" method="GET" >
                                        <div class="col-md-2 col-lg-2">
                                            <label class="padding7px"><b style="white-space: nowrap;">Choose menu:</b></label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="form-control menu-type" name="sType" >
                                                <option value="0" <?php echo $sType == 0 ? "selected" : "" ?>>Main Menu</option>
                                                <option value="1" <?php echo $sType == 1 ? "selected" : "" ?>>Footer Menu</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <section class="card mb-4 tag-for-propertysite">
                                        <header class="card-header">
                                            <h2 class="card-title mb-3">Add Menu Item</h2>
                                        </header>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input class="form-control name-ct" name="name-ct" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control page-type">
                                                        <option value="1">Pages</option>
                                                        <option value="4">Links</option>
                                                        <option value="2">Tag news</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control hide" id="link">
                                                        <option value="#">Empty link(#)</option>
                                                        <option value="1">External Link</option>
                                                        <option value="2">#Other Id</option>
                                                    </select>
                                                    <select class="form-control hide" id="tags">

                                                    </select>
                                                    <select class="form-control select-pages">
                                                        <?php foreach ($pages as $item) { ?>
                                                            @if ($item -> page_default ==1)
                                                                <option data-ids="" data-name="{{$item->name}}" value="{{$item->slug}}">{{$item->name}} ({{$item->slug}})</option>
                                                            @else
                                                                <option data-ids="" data-name="{{$item->name}}" value="{{$item->slug}}-{{$item -> id}}">{{$item->name}} ({{$item->slug}}-{{$item -> id}})</option>
                                                            @endif

                                                        <?php }?>
                                                    </select>
                                                    <div class="tag-content"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control page-ids">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col col-md-2 col-md-offset-5">

                                                </div>
                                            </div>


                                        </div>
                                        <footer class="card-footer">
                                            <div class="row">
                                                <div class="col col-sm-2 col-sm-offset-5">
                                                    <button type="button" class="btn btn-primary btn-add-menu">Add</button>
                                                </div>
                                            </div>
                                          </footer>
                                    </section>
                                </div>
                                <!-- col 2-->
                                <div class="col-md-6">
                                    <section class="card ">
                                        <header class="card-header">
                                            <h2 class="card-title mb-3"><?php echo $sType == 0 ? "Main Menu" : "Footer Menu" ?></h2>
                                        </header>
                                        <div class="card-body">
                                            @include('admin.common.alert')

                                            <div class="row">
                                                <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="dd" id="nestable">
                                                        <ol class="dd-list dd-list1">
                                                            <?php $domain = $website -> getDomain(1);
                                                            if ($menu != "") {

                                                                $menu1 = json_decode($menu, true);
                                                                menuTree($menu1, $domain);
                                                            }
                                                            ?>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="card-footer">
                                          <div class="row">
                                              <div class="col col-sm-2 col-sm-offset-5">
                                                 <form action="/admin/website/saveMenu/{{$website->id}}" method="post" class="margin-top-10" id="form-submit">
                                                    @csrf
                                                  <input type="hidden" name='menu-data' class='menu-data' value='{{$menu}}'/>
                                                  <input type="hidden" name='type'value='{{$sType}}'/>

                                                  <button type="submit" class="btn btn-primary btn-save">Save</button>
                                                 </form>
                                              </div>
                                          </div>
                                        </footer>
                                  </section>
                                </div>
                            </div>

                        </div>
                    </div><!-- end card -->

                </div>
                <!-- card -->

            </div>
            <!-- end Col-9 -->

        </div>
        <!-- end row -->
@endsection
@section('addJs')
<script>
    $(document).ready(function(){
        $('#vertical-menu-btn').click();
        $('.menu-type').on('change', function(){
            $(this).closest('form').submit();
        })
    })
</script>
<style>
    .dd-item .btn-remove {
      display: block;
      margin-top: -35px;
      float: right;
      padding: 3px;
      margin-right: 10px;
  }
  .dd-item .btn-remove:hover{
      cursor: pointer;
      color: blue;
  }
</style>

<!-- Specific Page Vendor -->
<script src="/theme-admin/libs/jquery-nestable/jquery-nestable.js"></script>
<script src="/theme-admin/js/menu/menu_nestable_single.js"></script>

  <!-- Modal -->
  <div id="md-external-link" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">External link</h4>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
                <div class="col-md-12">
                    <label class="">External link(ex: http://google.com)<span class="text-danger">(*)</span></label>
                    <input class="form-control" type="text" value="" id="external-link">
                </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                 <div class="radio-inline d-inline-block">
                     <label><input type="radio" class="is_blank" id="is_blank_true" name="optradio">New window</label>
                   </div>
                   <div class="radio-inline d-inline-block">
                     <label><input type="radio" class="is_blank" id="is_blank_false" name="optradio">Self</label>
                   </div>
            </div>
          </div>
        </div>
        <div class="modal-footer text-left">
            <button type="button" class="btn btn-primary btn-save-external-link" data-dismiss="modal">Ok</button>
            <button type="button" class="btn btn-default btn-close-external-link" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="md-other-id" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">#Other Id</h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">

                          <label class="">Id<span class="text-danger">(*)</span></label>
                          <input class="form-control" type="text" value="" id="otherId">

                      </div>

                  </div>
              </div>
              <div class="modal-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <button type="button" class="btn btn-default btn-save-md-id" data-dismiss="modal">Ok</button>
                          <button type="button" class="btn btn-warning btn-close-md-id" data-dismiss="modal">Cancel</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 @endsection

 <?php
function menuTree($menu) {
    foreach ($menu as $item) {
         if(empty($item['children'])){
             if (!empty($item['blank'])) {
                $blank = "data-blank = " . $item['blank'];
            } else {
                $blank = "";
            }
         echo '<li class="dd-item" '.getDataTag($item).' data-name="'.$item['name'].'" data-url="'.$item['url'].'" '.$blank.'>';
         echo '    <div class="dd-handle dd-handle-custom">'.$item['name'].'('.$item['url'].')</div>';
         echo '<div class="btn-remove"><i class="fa fa-times" aria-hidden="true"></i></div></li>';
     }else {
            echo '<li class="dd-item" '.getDataTag($item).' data-name="'.$item['name'].'" data-url="'.$item['url'].'">';

            echo '    <div class="dd-handle">'.$item['name'].'</div><div class="btn-remove"><i class="fa fa-times" aria-hidden="true"></i></div>';
            echo '    <ol class="dd-list">';
                    menuTree($item['children']);
            echo '    </ol>';
            echo '</li>';
     }}}
function getDataTag($item){
    if(!empty($item['tagid'])){
        return 'data-tagid="'.$item['tagid'].'"';
    }
    if(!empty($item['taglistingid'])){
        return 'data-taglistingid="'.$item['taglistingid'].'"';
    }
    if(!empty($item['tagnewsid'])){
        return 'data-tagnewsid="'.$item['tagnewsid'].'"';
    }
}
?>