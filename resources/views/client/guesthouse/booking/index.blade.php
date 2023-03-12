@extends('client.guesthouse.layout.index')
@section('content')

<div class="sections_group">
  <div class="entry-content">
    <div class="section mcb-section"
      style="padding-top:240px; padding-bottom:40px; background-color:#41332c; background-image:url(/content/<?= $directory ?>/images/home_guesthouse_sectionbg4.jpg); background-repeat:no-repeat; background-position:center top;">
      <div class="section_wrapper mcb-section-inner">
        <div class="wrap mcb-wrap one  valign-top clearfix">
          <div class="mcb-wrap-inner">
            <div class="column mcb-column one column_column">
              <div class="column_attr clearfix align_center">
                <h1 style="color:#fff">Book a room</h1>
              </div>
            </div>
            <div class="column mcb-column one column_divider">
              <hr class="no_line" style="margin: 0 auto 150px;">
            </div>
            <div class="column mcb-column one-sixth column_placeholder">
              <div class="placeholder">
                &nbsp;
              </div>
            </div>
            <div class="column mcb-column two-third column_column">
              <div class="column_attr clearfix">
                <h4 style="color: #fff; text-align: center;">Vivamus in diam turpis:</h4>
                <hr class="no_line" style="margin: 0 auto 10px">
                <div id="contactWrapper">
                  <form id="contactform">
                    <!-- One Second (1/2) Column -->
                    <div class="column one-second">
                      <input placeholder="Your name" type="text" name="name" id="name" size="40" aria-required="true"
                        aria-invalid="false" />
                    </div>
                    <!-- One Second (1/2) Column -->
                    <div class="column one-second">
                      <input placeholder="Your e-mail" type="email" name="email" id="email" size="40"
                        aria-required="true" aria-invalid="false" />
                    </div>
                    <div class="column one">
                      <input placeholder="Subject" type="text" name="subject" id="subject" size="40"
                        aria-invalid="false" />
                    </div>
                    <div class="column one">
                      <textarea placeholder="Message" name="body" id="body" style="width:100%;" rows="10"
                        aria-invalid="false"></textarea>
                    </div>
                    <div class="column one">
                      <input type="button" value="Send A Message" id="submit" onClick="return check_values();">
                    </div>
                  </form>
                </div>
                <p style="color:#fff">
                  In condimentum maximus tristique. Maecenas non laoreet odio. Fusce lobortis porttitor purus, vel
                  vestibulum libero pharetra vel. Pellentesque lorem augue, fermentum nec nibh et, fringilla
                  sollicitudin orci. Integer pharetra magna non ante blandit lobortis. Sed mollis consequat eleifend.
                  Aliquam consectetur orci eget dictum tristique.
                </p>
                <hr class="no_line" style="margin: 0 auto 15px">
                <div
                  style="background: url(/content/<?= $directory ?>/images/home_guesthouse_pic2.png) no-repeat 0 35px; border-top: 1px solid rgba(255,255,255, .3); padding: 30px 0 0 50px; color: rgba(255,255,255,.7);">
                  <p>
                    Curabitur sed iaculis dolor, non congue ligula. Maecenas imperdiet ante eget hendrerit posuere. Nunc
                    urna libero, congue porta nibh a, semper feugiat.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section mcb-section full-width no-margin-h no-margin-v" style="padding-top:0px; padding-bottom:0px">
      <div class="section_wrapper mcb-section-inner">
        <div class="wrap mcb-wrap one  valign-top clearfix">
          <div class="mcb-wrap-inner">
            <div class="column mcb-column one column_map">

              <div class="google-map-wrapper no_border">
                <div class="google-map" id="google-map-area-58d827165df9c" style="width:100%; height:600px;">
                  &nbsp;
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="http://maps.google.com/maps/api/js?sensor=false&ver=5.9"></script>
<script src="../../js/email.js"></script>

<script>
function google_maps_58d827165df9c() {
  var latlng = new google.maps.LatLng(-33.8710, 151.2039);
  var draggable = true;
  var myOptions = {
    zoom: 13,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{
      "featureType": "all",
      "elementType": "labels",
      "stylers": [{
        "visibility": "on"
      }]
    }, {
      "featureType": "administrative",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [{
        "color": "#544842"
      }, {
        "visibility": "simplified"
      }]
    }, {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "road",
      "elementType": "all",
      "stylers": [{
        "visibility": "on"
      }]
    }, {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [{
        "color": "#544842"
      }, {
        "lightness": "30"
      }, {
        "saturation": "-10"
      }]
    }, {
      "featureType": "road",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "on"
      }]
    }, {
      "featureType": "road",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#544842"
      }, {
        "lightness": "80"
      }]
    }, {
      "featureType": "road",
      "elementType": "labels.text.stroke",
      "stylers": [{
        "color": "#544842"
      }, {
        "lightness": "0"
      }]
    }, {
      "featureType": "road",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "transit",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }, {
        "color": "#544842"
      }, {
        "lightness": "50"
      }]
    }, {
      "featureType": "transit.station",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "water",
      "elementType": "all",
      "stylers": [{
        "color": "#544842"
      }, {
        "lightness": "-20"
      }]
    }],
    draggable: draggable,
    zoomControl: true,
    mapTypeControl: false,
    streetViewControl: false,
    scrollwheel: false
  };
  var map = new google.maps.Map(document.getElementById("google-map-area-58d827165df9c"), myOptions);
  var marker = new google.maps.Marker({
    position: latlng,
    icon: "/content/<?= $directory ?>/images/home_guesthouse_pin.png",
    map: map
  });
}
jQuery(document).ready(function($) {
  google_maps_58d827165df9c();
});
</script>

@endsection