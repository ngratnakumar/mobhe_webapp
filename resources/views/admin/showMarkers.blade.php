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
                <p>Assign Diagnostics/Pharmacy to Request id {{ $reqid }}</p>
                    <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SP Id</th>
                                <th>Supplier Name</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td><a href="{{ web_url() }}/checkUserData/{{ $request->id }}">{{ $request->name }}</a></td>
                                <td>{{ $request->address }}</td>
                                <td>{{ $request->type }}</td>
                                <td><li><a href="{{ web_url() }}/admin/updateDataMarkers/{{ $reqid }}/{{ $request->type }}-{{ $request->name }}/{{ $request->id }}">Pass Lead</a></li></td>
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