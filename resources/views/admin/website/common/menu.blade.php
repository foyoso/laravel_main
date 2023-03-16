<!-- Left sidebar -->
<div class="email-leftbar card">
    <a type="button" class="btn btn-danger btn-block waves-effect waves-light" href="{{$data -> getDomain(1)}}" target="_blank">
        {{$data -> name}} <i class="fas fa-external-link-alt"></i>
    </a>
    <div class="mail-list mt-4">
        <a href="#" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
        <a href="#"><i class="mdi mdi-star-outline me-2"></i>Page</a>
        <a href="#"><i class="mdi mdi-diamond-stone me-2"></i>News</a>
        <a href="#"><i class="mdi mdi-diamond-stone me-2"></i>Contact</a>
    </div>

    <h6 class="mt-4">Website</h6>

    <div class="mail-list mt-1">
        <a href="/website/edit/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Setting</a>
        <a href="#"><i class="mdi mdi-star-outline me-2"></i>Menu</a>
        <a href="#"><i class="mdi mdi-star-outline me-2"></i>Banner</a>
    </div>

</div>
<!-- End Left sidebar -->