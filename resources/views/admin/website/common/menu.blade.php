<!-- Left sidebar -->
<div class="email-leftbar card">
    <a type="button" class="btn btn-danger btn-block waves-effect waves-light" href="{{$website -> getDomain(1)}}" target="_blank">
        {{$website -> name}} == {{ Auth::guard('admin') -> user()->name }}<i class="fas fa-external-link-alt"></i>
    </a>
    <h6 class="mt-4">Website</h6>

    <div class="mail-list mt-1">
        <a href="/admin/website/edit/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Setting</a>
        <a href="/admin/website/menu/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Menu</a>
        <a href="/admin/website/homeSection/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Home Section</a>
        <a href="/admin/contact/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Contact </a>
    </div>


    <div class="mail-list mt-4">
        <a href="#" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
        <a href="/admin/page/{{$website -> id}}"><i class="mdi mdi-star-outline me-2"></i>Page</a>
        <a href="/admin/post/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Blogs</a>
        <a href="/admin/tag/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Tag blogs</a>

        @if ($website -> website_type_id == WEB_REAL_ESTATE)
            <a href="/admin/listing/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Listing</a>
        @endif
        @if ($website -> website_type_id == WEB_BUSINESS)
            <a href="/admin/portfolio/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Portfolio</a>
            <a href="/admin/tagPortfolio/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Tag Portfolio</a>
        @endif

        @if ($website -> website_type_id == WEB_ECOMMERCE)
            <a href="/admin/portfolio/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Products</a>
            <a href="/admin/tagPortfolio/{{$website -> id}}"><i class="mdi mdi-diamond-stone me-2"></i>Product category</a>
        @endif

    </div>





</div>
<!-- End Left sidebar -->