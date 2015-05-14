@extends('admin.layout')

@section('content')
<section class="content-header">
    <h1>
        {{ $title }}
        <small>Control panel</small>
    </h1>

</section>
        <style type="text/css">
            #map-canvas{
                width: 100%;
                height: 250px;
            }
        </style>
<div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <div class="row">
                    <div class="col-xs-12">
                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                        <a class="btn btn-primary btn-lg" href="{{ web_url() }}/map/add">Add Map</a>
                    </div>
                    <div>.</div>
                        <div id="map" style="width: 1000px; height: 300px"></div>
                        <div><h3>Map Data</h3></div>
                        <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Service Type</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>Address Line 3</th>
                                <th>GeoLocation</th>
                                <th>Phone</th>
                                <th>Open Timing</th>
                                <th>Add Tests</th>
                                <th>View Tests</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->type }}</td>
                                <td>{{ $request->addressLine1 }}</td>
                                <td>{{ $request->addressLine2 }}</td>
                                <td>{{ $request->addressLine3 }}</td>
                                <td>{{ $request->lat }},{{ $request->lng }}</td>
                                <td>{{ $request->phone }}</td>
                                <td>{{ $request->openTimings }}</td>
                                @if($request->type == "Lab")
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal">
                                      Add Tests
                                    </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewModal">
                                      View Tests
                                    </button>
                                    </div>
                                </td>
                                @else
                                <td>NA</td>
                                @endif
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                    </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
<!-- addModal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
      if(empty($request->objectId)){
        $labid = "";
        $labname = "";
       }
        else {
        $labid = $request->objectId;
        $labname = $request->name;
    }
      ?>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Tests to {{ $labname }}</h4>
      </div>
      <div class="modal-body">
            <form action="{{ web_url() }}/lab/addLTData" method="post" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <input type="hidden" value="{{ $labid }}" name="labobjid" />
                <select name="selectData[]" multiple style="min-height: 200px; width: 50%;">
                @foreach($tests as $request)
                    <div class="form-group">
                          <option value="{{ $request->objectId }}">{{ $request->test_name }}</option>
                    </div>
                @endforeach
                </select>
                @foreach($tests as $request)
                    @foreach($labrequests as $labreq)
                        @if( $request->objectId == $labreq->testObjectId && $labid == $labreq->labObjectId)
                            <div class="form-group">
                                  {{ $request->test_name }}</option>
                            </div>
                        @endif
                    @endforeach
                @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- viewModal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Tests to {{ $labname }}</h4>
      </div>
      <div class="modal-body">
                        <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Test Name</th>
                                <th>Cost at Lab</th>
                                <th>Cost at Home</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="{{ web_url() }}/lab/updateTests" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to Save Changes?');">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                           @foreach($labrequests as $request)
                           @if($request->labObjectId == $labid)
                            <tr>
                            <input value="{{ $request->objectId }}" type="hidden" name="testid[]"/>
                                <td>{{ $request->id }}</td>
                                @foreach($tests as $requests)
                                    @if($request->testObjectId == $requests->objectId)
                                        <td>{{ $requests->test_name }}</td>
                                    @endif
                                @endforeach
                                <td><input value="{{ $request->lab_cost }}" type="text" name="lab_cost[]"/></td>
                                <td><input value="{{ $request->homevisit_cost }}" type="text" name="homevisit_cost[]"/></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(function() { 
        // DataTable
        var table = $('#locations-table').DataTable();
    });
</script>
@stop