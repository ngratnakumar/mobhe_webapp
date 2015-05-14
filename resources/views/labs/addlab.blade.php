@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Control Panel</small>
        </h1>
    </section>
    <style type="text/css">
        #map-canvas{
            width: 100%;
            height: 450px;
        }
    </style>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="btn-group btn-group-sm" role="group" aria-label="">
                                <a class="btn btn-primary btn-lg" href="{{ web_url() }}/map/view">View Maps</a>
                            </div>
                            <form action="{{ web_url() }}/map/addmap" method="post" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                <div class="col-xs-9">
                                    <div class="form-group">
                                        <label for="">Map | Search Name</label>
                                        <input type="text" id="searchmap" class="form-control input-sm">
                                        <div id="map-canvas"></div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control input-sm" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Type</label>
                                        <input type="text" class="form-control input-sm" name="type" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control input-sm" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lat</label>
                                        <input type="text" class="form-control input-sm" name="lat" id="lat">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lng</label>
                                        <input type="text" class="form-control input-sm" name="lng" id="lng">
                                    </div>                
                                    <div class="form-group">
                                        <label for="">Address Line1</label>
                                        <input type="text" class="form-control input-sm" name="addressLine1">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address Line2</label>
                                        <input type="text" class="form-control input-sm" name="addressLine2">
                                    </div>                                                                                    
                                    <div class="form-group">
                                        <label for="">Address Line3</label>
                                        <input type="text" class="form-control input-sm" name="addressLine3">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Open Timings</label>
                                        <input type="text" class="form-control input-sm" name="openTimings">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Facilities</label>
                                        <input type="text" class="form-control input-sm" name="facilities">
                                    </div>                            
                                    <button class="btn btn-sm btn-danger">Add Map</button>                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
            lat: 12.971598700000001,
            lng: 77.59370439311522
        },
        zoom:12
    });

    var marker = new google.maps.Marker({
        position: {
            lat: 12.971598700000001,
            lng: 77.59370439311522
        },
        map: map,
        draggable: true
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox,'places_changed', function(){

        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        for(i=0; place=places[i];i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(15);

    });

    google.maps.event.addListener(marker, 'position_changed',function(){

        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);

    });

</script>

@stop