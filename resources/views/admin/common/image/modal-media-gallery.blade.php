
<!-- Modal -->
<div id="modal-media-gallery" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h4 class="modal-title">Select image(s) from Media Gallery</h4>
                    <span class="text-info">Hold Ctrl and Click to select multiple images</span>
                </div>
               <button type="button" class="btn-close" data-bs-dismiss="modal"> </button>
            </div>
            <div class="modal-body modal-scroll">
                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <!-- list image-->

                </div>
            </div>
            <div class="modal-footer">
                <a href="#"  id="btn-modal-upload-show" class="pull-left open-upload">
                    <i class="fa fa-upload mr-xs"></i>
                    <span data-all-text="Select All" data-none-text="Select None"><strong>UPLOAD FILES</strong></span>
                </a>
                <button type="button" class="btn btn-primary btn-select-image-modal">
                    <i class="fa fa-mouse-pointer"></i> Select
                </button>
            </div>
        </div>
    </div>
  </div>
  <script src="/theme-admin/js/image/open-media-gallery.js"></script>

  <div class="modal fade" id="myModal-uploadfile" role="dialog">
     <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content" style="border-color:red; background-color: #eff3f6; ">
           <div  id="fast-upload">
             <div class="modal-header">
               <h4 class="modal-title">Image Uploader</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-12">
                          <label><i class="fa fa-upload" aria-hidden="true"></i> From Computer</label>
                            <input type="file" class="form-control" name="file-image" id="fast-upload-file">
                        </div>
                    </div>
              </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-primary btn-add-image" >Upload</button>
               <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
             </div>
            </div>
       </div>

     </div>
   </div>

  <div class="modal fade" id="progress-bars" role="dialog">
     <div class="modal-dialog modal-sm">
       <!-- Modal content-->
       <div class="modal-content">
          <div class="wrapper">
            <div class="progressbar">
              <div class="stylization"></div>
            </div>
          </div>
       </div>
     </div>
   </div>
