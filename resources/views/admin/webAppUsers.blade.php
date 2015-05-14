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
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service Requested For</th>
                                <th>Role</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->service_type }}</td>
                                <td>                                    
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #084425">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/admin">Admin</a></li>
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/prana">Prana</a></li>
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/mdent">Mobi-Dent</a></li>
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/pharmacy">Pharmacy</a></li>
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/lab">Lab</a></li>
                                            <li><a href="{{ web_url() }}/admin/roles/{{ $request->id }}/Canceled" style="color: red;">Cancel User</a></li>
                                        </ul>
                                    </div>
                                    {{ $request->roll }}
                                </td>
                                <td>{{ $request->created_at }}</td>
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