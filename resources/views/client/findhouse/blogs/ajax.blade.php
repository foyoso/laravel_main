@foreach ($data as  $result)
<div class="col-lg-6">
    <div class="for_blog feat_property">
      <a href="{{getNewLink($result)}}" alt="link">
        <div class="thumb">
          <img class="img-whp" src="{{$result -> thumbnail}}" alt="{{$result -> name}}">
          @php
                $tags = $result -> getTags();
            @endphp
            @foreach ($tags as $t)
              <div class="blog_tag">{{$t-> name}}</div>
          @endforeach
        </div>
      </a>
      <a href="{{getNewLink($result)}}" alt="link">
        <div class="details">
          <div class="tc_content">
            <h4>{{$result->name}}</h4>
            <ul class="bpg_meta">
              <li class="list-inline-item"><i class="flaticon-calendar"></i>
              </li>
              <li class="list-inline-item">{{date_format(date_create($result -> publish_at), 'M d, Y')}}</li>
            </ul>
            <p>{{$result->description}}</p>
          </div>
          <div class="fp_footer">
            <ul class="fp_meta float-left mb0">
              <li class="list-inline-item"><img src="{{$result -> user -> avatar}}" width="40px" height="40px" alt="{{$result -> user -> name}}"></li>
              <li class="list-inline-item">{{$result -> user -> name}}</li>
            </ul>
            <span class="fp_pdate float-right text-thm">Read More <span class="flaticon-next"></span></span>
          </div>
        </div>
      </a>
    </div>
  </div>
@endforeach
