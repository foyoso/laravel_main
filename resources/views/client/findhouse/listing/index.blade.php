@extends('client.findhouse.layout.nofooter')
@section('content')

<section id="feature-property" class="our-listing bgc-f7 pt0 pb0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="listing_sidebar dn db-991">
          <div class="sidebar_content_details style3">
            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
            <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
              <div class="sidebar_advanced_search_widget">
                <h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide
                      Filter</small> <span class="flaticon-close"></span></a></h4>
                <ul class="sasw_list style2 mb0">
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="keyword">
                      <label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
                    </div>
                  </li>
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
                      <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Status</option>
                          <option>Apartment</option>
                          <option>Bungalow</option>
                          <option>Condo</option>
                          <option>House</option>
                          <option>Land</option>
                          <option>Single Family</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Property Type</option>
                          <option>Apartment</option>
                          <option>Bungalow</option>
                          <option>Condo</option>
                          <option>House</option>
                          <option>Land</option>
                          <option>Single Family</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="small_dropdown2">
                      <div id="prncgs" class="btn dd_btn">
                        <span>Price</span>
                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                      </div>
                      <div class="dd_content2">
                        <div class="pricing_acontent">
                          <!-- <input type="text" class="amount" placeholder="$52,239">
														<input type="text" class="amount2" placeholder="$985,14">
														<div class="slider-range"></div> -->
                          <span id="slider-range-value1"></span>
                          <span class="mt0" id="slider-range-value2"></span>
                          <div id="slider"></div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Bathrooms</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Bedrooms</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Garages</option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>Others</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Year built</option>
                          <option>2013</option>
                          <option>2014</option>
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2020</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li class="min_area style2 list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName2" placeholder="Min Area">
                    </div>
                  </li>
                  <li class="max_area list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName3" placeholder="Max Area">
                    </div>
                  </li>
                  <li>
                    <div id="accordion" class="panel-group">
                      <div class="panel">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse"
                              data-parent="#accordion"><i class="flaticon-more"></i> Advanced features</a>
                          </h4>
                        </div>
                        <div id="panelBodyRating" class="panel-collapse collapse">
                          <div class="panel-body row">
                            <div class="col-lg-12">
                              <ul class="ui_kit_checkbox selectable-list float-left fn-400">
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Barbeque</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Gym</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Microwave</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">TV Cable</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Lawn</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                  </div>
                                </li>
                              </ul>
                              <ul class="ui_kit_checkbox selectable-list float-right fn-400">
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck12">
                                    <label class="custom-control-label" for="customCheck12">WiFi</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck14">
                                    <label class="custom-control-label" for="customCheck14">Sauna</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">Dryer</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Washer</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck13">
                                    <label class="custom-control-label" for="customCheck13">Laundry</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck15">
                                    <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_button">
                      <button type="submit" class="btn btn-block btn-thm">Search</button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="listing_sidebar dn-991">
          <div class="sidebar_content_details is-full-width">
            <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
            <div class="sidebar_listing_list style2 mb0">
              <div class="sidebar_advanced_search_widget">
                <h4 class="mb25">Advanced Search</h4>
                <ul class="sasw_list style2 mb0">
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="keyword">
                      <label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
                    </div>
                  </li>
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
                      <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Status</option>
                          <option>Apartment</option>
                          <option>Bungalow</option>
                          <option>Condo</option>
                          <option>House</option>
                          <option>Land</option>
                          <option>Single Family</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Property Type</option>
                          <option>Apartment</option>
                          <option>Bungalow</option>
                          <option>Condo</option>
                          <option>House</option>
                          <option>Land</option>
                          <option>Single Family</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="small_dropdown2">
                      <div id="prncgs2" class="btn dd_btn">
                        <span>Price</span>
                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                      </div>
                      <div class="dd_content2">
                        <div class="pricing_acontent">
                          <input type="text" class="amount" placeholder="$52,239">
                          <input type="text" class="amount2" placeholder="$985,14">
                          <div class="slider-range"></div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Bathrooms</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Bedrooms</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Garages</option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>Others</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                          <option>Year built</option>
                          <option>2013</option>
                          <option>2014</option>
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                          <option>2018</option>
                          <option>2019</option>
                          <option>2020</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li class="min_area style2 list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName2" placeholder="Min Area">
                    </div>
                  </li>
                  <li class="max_area list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputName3" placeholder="Max Area">
                    </div>
                  </li>
                  <li>
                    <div id="accordion" class="panel-group">
                      <div class="panel">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse"
                              data-parent="#accordion"><i class="flaticon-more"></i> Advanced features</a>
                          </h4>
                        </div>
                        <div id="panelBodyRating" class="panel-collapse collapse">
                          <div class="panel-body row">
                            <div class="col-lg-12">
                              <ul class="ui_kit_checkbox selectable-list float-left fn-400">
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Barbeque</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Gym</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Microwave</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">TV Cable</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Lawn</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                  </div>
                                </li>
                              </ul>
                              <ul class="ui_kit_checkbox selectable-list float-right fn-400">
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck12">
                                    <label class="custom-control-label" for="customCheck12">WiFi</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck14">
                                    <label class="custom-control-label" for="customCheck14">Sauna</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">Dryer</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Washer</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck13">
                                    <label class="custom-control-label" for="customCheck13">Laundry</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck15">
                                    <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="search_option_button">
                      <button type="submit" class="btn btn-block btn-thm">Search</button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="sidebar_switch mobile_style dn db-991 mt30 mt0-767 mb0">
          <div id="main2">
            <span id="open2" class="flaticon-filter-results-button filter_open_btn"> Show Filter</span>
          </div>
        </div>
      </div>
      <div class="col-xl-5">
        <div class="half_map_area_content mt30">
          <div class="row">
            <div class="grid_list_search_result">
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="left_area tac-xsd">
                  <p>9 Search results</p>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 pl0 pr0">
                <div class="half_map_advsrch_navg style2 text-right tac-xsd">
                  <ul>
                    <li class="list-inline-item"><span class="stts">Sort by:</span>
                      <select class="selectpicker show-tick">
                        <option>Featured First</option>
                        <option>Featured 2nd</option>
                        <option>Featured 3rd</option>
                        <option>Featured 4th</option>
                        <option>Featured 5th</option>
                      </select>
                    </li>
                    <li class="list-inline-item"><a class="hvr-text-thm" href="#"><span
                          class="fa fa-th-large"></span></a></li>
                    <li class="list-inline-item"><a class="hvr-text-thm" href="#"><span
                          class="fa fa-th-list"></span></a></li>
                    <li class="list-inline-item"><a class="hvr-text-thm" href="#"><span
                          class="flaticon-more"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <ul class="feature_property_half_clist style2 mb0">
                @foreach ($listings as $listing)
                <li class="extrawide list-inline-item">
                  <div class="feat_property home7 style4">
                    <a href="{{getListingLink($listing)}}">
                      <div class="thumb">
                        <div class="item">
                          <img class="img-whp" src="{{$listing->thumbnail}}" alt="{{$listing->name}}">
                        </div>
                        <div class="thmb_cntnt style2">
                          <ul class="tag mb0">
                            @if ($listing->sale_or_rent == 1)
                              <li class="list-inline-item">For Rent</li>
                            @else
                              <li class="list-inline-item">For Sale</li>
                            @endif
                          </ul>
                        </div>
                        <div class="thmb_cntnt style3">
                          <!-- <ul class="icon mb0">
                            <li class="list-inline-item"><span class="flaticon-transfer-1"></span></li>
                            <li class="list-inline-item"><span class="flaticon-heart"></span></li>
                          </ul> -->
                          <span class="fp_price">${{number_format($listing->price, 0, '.', ',')}}<small>/mo</small></span>
                        </div>
                      </div>
                    </a>
                    <a href="{{getListingLink($listing)}}">
                      <div class="details">
                        <div class="tc_content">
                          <p class="text-thm">{{$listing -> listingType -> name}}</p>
                          <h4>{{$listing->name}}</h4>
                          <p><span class="flaticon-placeholder"></span> {{$listing->address}}</p>
                          <ul class="prop_details mb0">
                            <li class="list-inline-item">Beds: {{$listing->bedroom}}</li>
                            <li class="list-inline-item">Baths: {{$listing->bathroom}}</li>
                            <li class="list-inline-item">Area: {{number_format($listing->area, 0, '.', ',')}}</li>
                          </ul>
                        </div>
                        <div class="fp_footer">
                          <ul class="fp_meta float-left mb0">
                            <li class="list-inline-item"><img src="{{$listing -> user -> avatar}}" width="40px" height="40px" alt="{{$listing -> user -> name}}"></li>
                            <li class="list-inline-item">{{$listing -> user -> name}}</li>
                          </ul>
                          <div class="fp_pdate float-right">{{date_format(date_create($listing -> updated_at), 'M d, Y')}}</div>
                        </div>
                      </div>
                    </a>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-12 mb30">
              <div class="mbp_pagination">
                {{$listings -> onEachSide(1) -> links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-7">
        <div class="sidebar_switch style2 text-right dn-991">
          <div id="main2">
            <span id="open2" class="flaticon-filter-results-button sidebarClosed2 filteropen2 showBtns"> Show
              Filter</span>
          </div>
        </div>
        <div id="map"></div>
      </div>
    </div>
  </div>
</section>
<!-- <script type="text/javascript" src="/client/findhouse/js/google-maps.js"></script> -->
<script>
("use strict");

function initMap() {
  const myLatlng = {
    lat: 10.837508551344785,
    lng: 106.83894411646037
  };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: myLatlng,
  });

  <?php
  $latlng = [];
  foreach ($listings as $listing) {
    $temp = [
      'lat' => $listing->latitude,
      'lng' => $listing->longitude,
      'name' => $listing->name,
      'address' => $listing->address,
      'thumbnail' => $listing->thumbnail,
      'bedroom' => $listing->bedroom,
      'bathroom' =>$listing->bathroom
    ];
    array_push($latlng, $temp); }
  ?>

  const infoWindow = new google.maps.InfoWindow();
  let latlng = <?php echo json_encode($latlng)?>;
  latlng.map((lat, index) => {
    console.log(lat.lat, lat.lng);
    const marker = new google.maps.Marker({
      position: {
        lat: parseFloat(lat.lat),
        lng: parseFloat(lat.lng)
      },
      map,
      title: `${lat.name}`,
    });

    // Add a click listener for each marker, and set up the info window.
    marker.addListener("click", () => {
      infoWindow.close();
      infoWindow.setContent(
        `<img src="${lat.thumbnail}" alt="${lat.name}"/> <h5>Apartment</h5> <h4>${lat.name}</h4> <p>${lat.address}</p> <p><span>Beds: ${lat.bedroom}</span> <span>Baths: ${lat.bathroom}</span></p>`
      );
      infoWindow.open(marker.getMap(), marker);
    });
  });
}

window.initMap = initMap;
</script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdcQziN6k5uqihdi3oL1jTajBLFU0FJ4w&callback=initMap&v=weekly">
</script>
<style>
#map {
  height: 100%;
}
</style>
@endsection