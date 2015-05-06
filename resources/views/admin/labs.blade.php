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
                                <th>Id</th>
                                <th>Doctor Name</th>
                                <th>Specilization</th>
                                <th>KMC No.</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Consultaion Fee</th>
                                <th>Online Timings</th>
                                <th>GP Consultaion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->expertise }}</td>
                                <td>{{ $request->kmc }}</td>
                                <td>{{ $request->mobile }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->practiceAddressLine1 }},{{ $request->practiceAddressLine2 }},{{ $request->practiceAddressLine3 }}</td>
                                <td>{{ $request->consultationFee }}</td>
                                <td>{{ $request->time_from }} - {{ $request->time_to }}, {{ $request->time_from2 }} - {{ $request->time_to2 }}</td>
                                <td>
                                @if( $request->gp_status == 1) 
                                Accepted
                                @else
                                Not Accepted
                                @endif
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