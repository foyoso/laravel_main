@extends('client.home.layout.index')
@section('content')

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
  <div class="container custom-container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="breadcrumb__wrap__content">
          <h2 class="title">{{$page -> title}}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$page -> name}}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb__wrap__icon">
    <ul>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon01.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon02.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon03.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon04.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon05.png" alt=""></li>
      <li><img src="/client/home/assets/img/icons/breadcrumb_icon06.png" alt=""></li>
    </ul>
  </div>
</section>
<!-- breadcrumb-area-end -->
<!-- contact-map -->
<div id="contact-map">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15893.612720163508!2d106.82793966880048!3d10.834238181379837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317521a29c137cc1%3A0x8aab4c5d3304b446!2sVinhomes%20Grand%20Park%20Qu%E1%BA%ADn%209!5e0!3m2!1sen!2s!4v1682522838621!5m2!1sen!2s"
    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- contact-map-end -->
<!-- contact-area -->
<div class="contact-area">
  <div class="container">
    <form action="#" class="contact__form" id="contact-form">
      <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-4 formfield">
          <input type="text" id="name" name="name" placeholder="Enter your name*">
        </div>
        <div class="col-md-4 formfield">
          <input type="email" id="email" name="email" placeholder="Enter your mail*">
        </div>
        <div class="col-md-4 formfield">
          <input type="tel" id="phone" name="phone" placeholder="Enter your phone*">
        </div>
      </div>
      <textarea name="message" id="message" placeholder="Enter your massage"></textarea>
      <button type="button" id="btn-submit" class="btn">send massage</button>
    </form>
  </div>
</div>
<!-- contact-area-end -->

<!-- contact-info-area -->
<section class="contact-info-area">
  <div class="container">
    {!!$page -> html_content!!}
  </div>
</section>
<!-- contact-info-area-end -->



@include('client.home.common.contact-question')
@endsection
@section('addJs')
<script src="/client/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/client/home/assets/js/page.contact.js"></script>

<div class="modal fade" id="notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="md-image" src="/client/home/assets/img/loading.gif" /> Sending...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-close-md" data-bs-dismiss="modal"
          aria-label="Close">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection