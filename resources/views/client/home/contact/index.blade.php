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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
            allowfullscreen loading="lazy"></iframe>
        </div>
    <!-- contact-map-end -->
<!-- contact-area -->
<div class="contact-area">
    <div class="container">
        <form action="#" class="contact__form" id="contact-form">
            <input type="hidden" name="csrf-token" id="csrf-token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Enter your name*">
                </div>
                <div class="col-md-4">
                    <input type="email" id="email" name="email" placeholder="Enter your mail*">
                </div>
                <div class="col-md-4">
                    <input type="tel" id="phone" name="phone"  placeholder="Enter your phone*">
                </div>
            </div>
            <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>
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
    <div class="modal" tabindex="-1" id="notification" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Notification</h5>
            <button type="button" class="close btn-close-md" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <img class="md-image" src="/client/home/assets/img/loading.gif"/>   Sending...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-md"  data-bs-dismiss="modal">Close</button>

            </div>
        </div>
        </div>
    </div>
@endsection