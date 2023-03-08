<script src="/client/js/jquery-3.6.0.min.js"></script>
<script src="/client/js/jquery-migrate-3.4.0.min.js"></script>

<script src="/client/js/mfn.menu.js"></script>
<script src="/client/js/jquery.plugins.js"></script>
<script src="/client/js/jquery.jplayer.min.js"></script>
<script src="/client/js/animations/animations.js"></script>
<script src="/client/js/translate3d.js"></script>
<script src="/client/js/scripts.js"></script>

<script src="/content/plugins/rs-plugin-6.custom/js/revolution.tools.min.js"></script>
<script src="/content/plugins/rs-plugin-6.custom/js/rs6.min.js"></script>

<script type="text/javascript">
var revapi1, tpj;

function revinit_revslider11() {
  jQuery(function() {
    tpj = jQuery;
    revapi1 = tpj("#rev_slider_1_1");
    if (revapi1 == undefined || revapi1.revolution == undefined) {
      revslider_showDoubleJqueryError("rev_slider_1_1");
    } else {
      revapi1.revolution({
        sliderLayout: "fullwidth",
        duration: "2000ms",
        visibilityLevels: "1240,1240,778,778",
        gridwidth: "1140,1140,778,778",
        gridheight: "900,900,610,610",
        spinner: "spinner8",
        perspective: 600,
        perspectiveType: "local",
        spinnerclr: "#8bafd1",
        editorheight: "900,768,610,720",
        responsiveLevels: "1240,1240,778,778",
        progressBar: {
          disableProgressBar: true
        },
        navigation: {
          onHoverStop: false
        },
        fallbacks: {
          allowHTML5AutoPlayOnAndroid: true
        },
      });
    }

  });
} // End of RevInitScript

var once_revslider11 = false;
if (document.readyState === "loading") {
  document.addEventListener('readystatechange', function() {
    if ((document.readyState === "interactive" || document.readyState === "complete") && !once_revslider11) {
      once_revslider11 = true;
      revinit_revslider11();
    }
  });
} else {
  once_revslider11 = true;
  revinit_revslider11();
}
</script>