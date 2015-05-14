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
                    <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Id</th>
                                <th>Patient Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->userId }}</td>
                                <td>{{ $request->Name }}</td>
                                <td>{{ $request->Gender }}</td>
                                <td>{{ $request->Age }}</td>
                                <td>{{ $request->Mobile }}</td>
                                <td>{{ $request->Address }},{{ $request->City }}</td>
                                <td>{{ $request->createdAt }}</td>
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