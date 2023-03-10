/* Add here all your JS customizations */

$(function(){
  var current = location.pathname;
  $('.inbox-main-nav li a').each(function(){
      var $this = $(this);
      // if the current path is like this link, make it active
      if($this.attr('href').indexOf(current) !== -1){
          $this.addClass('active');
      }
  })
})
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
  },
});

function removeRow(btn, id, url) {
  if (confirm("Xóa mà không thể khôi phục. Bạn có chắc ?")) {
    $.ajax({
      type: "DELETE",
      datatype: "JSON",
      data: { id },
      url: url,
      success: function (result) {
        console.log(result);
        if (result.error === false) {
          alert(result.message);
          //location.reload();
          $(btn).closest("tr").remove();
        } else {
          alert("Xóa lỗi vui lòng thử lại");
        }
      },
    });
  }
}

$("#btnSave").on("click", function () {
  $("#btnSubmit").click();
});
