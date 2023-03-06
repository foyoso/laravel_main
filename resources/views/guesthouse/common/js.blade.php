<!-- JS -->
<script src="/client/js/jquery-3.6.0.min.js"></script>
<script src="/client/js/jquery-migrate-3.4.0.min.js"></script>

<script src="/client/js/mfn.menu.js"></script>
<script src="/client/js/jquery.plugins.js"></script>
<script src="/client/js/jquery.jplayer.min.js"></script>
<script src="/client/js/animations/animations.js"></script>
<script src="/client/js/translate3d.js"></script>
<script src="/client/js/scripts.js"></script>

<script>
jQuery(window).on('load', function() {
  var retina = window.devicePixelRatio > 1 ? true : false;
  if (retina) {
    var retinaEl = jQuery("#logo img.logo-main");
    var retinaLogoW = retinaEl.width();
    var retinaLogoH = retinaEl.height();
    retinaEl.attr("src", "/content/guesthouse/images/retina-guesthouse.png").width(retinaLogoW).height(
      retinaLogoH);
    var stickyEl = jQuery("#logo img.logo-sticky");
    var stickyLogoW = stickyEl.width();
    var stickyLogoH = stickyEl.height();
    stickyEl.attr("src", "/content/guesthouse/images/retina-guesthouse.png").width(stickyLogoW).height(
      stickyLogoH);
    var mobileEl = jQuery("#logo img.logo-mobile");
    var mobileLogoW = mobileEl.width();
    var mobileLogoH = mobileEl.height();
    mobileEl.attr("src", "/content/guesthouse/images/retina-guesthouse.png").width(mobileLogoW).height(
      mobileLogoH);
    var mobileStickyEl = jQuery("#logo img.logo-mobile-sticky");
    var mobileStickyLogoW = mobileStickyEl.width();
    var mobileStickyLogoH = mobileStickyEl.height();
    mobileStickyEl.attr("src", "/content/guesthouse/images/retina-guesthouse.png").width(mobileStickyLogoW).height(
      mobileStickyLogoH);
  }
});
</script>