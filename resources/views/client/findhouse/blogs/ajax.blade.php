@foreach ($data as  $result)
<div class="col-lg-6">
    <div class="for_blog feat_property">
      <a href="{{getNewLink($result)}}" alt="link">
        <div class="thumb">
          <img class="img-whp" src="{{$result -> thumbnail}}" alt="{{$result -> name}}">
          <div class="blog_tag">Construction</div>
        </div>
      </a>
      <a href="{{getNewLink($result)}}" alt="link">
        <div class="details">
          <div class="tc_content">
            <h4>{{$result->name}}</h4>
            <ul class="bpg_meta">
              <li class="list-inline-item"><i class="flaticon-calendar"></i>
              </li>
              <li class="list-inline-item">January 16, 2020</li>
            </ul>
            <p>{{$result->description}}</p>
          </div>
          <div class="fp_footer">
            <ul class="fp_meta float-left mb0">
              <li class="list-inline-item"><img src="/client/findhouse/images/property/pposter1.png"
                  alt="pposter1.png"></li>
              <li class="list-inline-item">Ali Tufan</li>
            </ul>
            <span class="fp_pdate float-right text-thm">Read More <span class="flaticon-next"></span></span>
          </div>
        </div>
      </a>
    </div>
  </div>
@endforeach
