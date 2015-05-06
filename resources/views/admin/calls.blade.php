@extends('admin.layout')

@section('content')
<section class="content-header">
    <h1>
        {{ $title }}
        <small>Control panel</small>
    </h1>
    
<!--     <span class="breadcrumb" style="top:0px">
        <a href="{{ web_url() }}/admin/article/add">
        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
        </a>
    </span> -->
    
</section>

<!-- <section class="content">
    @if(Session::has('message') )
@if(Session::get('type') == 'success')
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Alert!</b> {{ Session::get('message') }}
</div>
@else
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Alert!</b> {{ Session::get('message') }}
</div>
@endif
@endif -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <div class="row">
                    <div class="col-xs-9"></div>

                            <div class="col-xs-6"><p>Total Records Found {{ count($requests) }}</p></div>
                        <div class="btn-group" role="group" aria-label="data-filter">
                            <div class="col-xs-3">

                        </div>
                        </div>
                    </div>
                    <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient Name</th>
                                <th>Doctor Name</th>
                                <th>Doctor Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->rid }}</td>
                                <td>{{ $request->rdatetime }}</td>
                                <td>{{ $request->Type }}</td>
                                <td>{{ $request->transferedTo }}</td>
                                <td>{{ $request->Name }}</td>
                                <td>{{ $request->Gender }}</td>
                                <td>{{ $request->Age }}</td>
                                <td>{{ $request->Mobile }}</td>
                                <td>{{ $request->Address }},{{ $request->City }}</td>
                                @if( $request->OTCData == "null" || $request->OTCData == "[]")
                                <td></td>
                                @else
                                <td>{{ $request->OTCData }}</td>
                                @endif
                                @if($request->Prescription == " ")
                                <td></td>
                                @else
                                <td><a class="thumb" href="#"><img src="{{ str_replace('"]', '', str_replace('["', '', $request->Prescription))}}" height="25px"/><span><img src="{{ str_replace('"]', '', str_replace('["', '', $request->Prescription))}}"/></span></a></td>
                                @endif
                                @if( $request->LabTestNames == "[null]" || $request->LabTestNames == "null")
                                <td></td>
                                @else
                                <td>{{ $request->LabTestNames }}</td>
                                @endif
                                @if($request->LabTestPrescription == " ")
                                <td></td>
                                @else
                                <td><a class="thumb" href="#"><img src="{{ str_replace('"]', '', str_replace('["', '', $request->LabTestPrescription))}}" height="25px"/><span><img src="{{ str_replace('"]', '', str_replace('["', '', $request->LabTestPrescription))}}"/></span></a></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #084425">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="admin/data/mdent/{{ $request->rid }}">Mobident</a></li>
                                            <li><a href="admin/data/prana/{{ $request->rid }}">Prana</a></li>
                                            <li><a href="admin/showMarkers/{{ $request->rid }}">SP</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <a href="admin/data/delete/{{ $request->rid }}" style="color: red;" onclick="return confirm('Delete Request {{ $request->id }} ?')"><i class="fa fa-times" style="font-size: 110%;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function() { 
        // DataTable
        var table = $('#locations-table').DataTable();
    });
</script>


@stop