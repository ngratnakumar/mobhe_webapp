@extends('admin.layout')

@section('content')
<section class="content-header">
    <h1>
        {{ $title }}
        <small>Control panel</small>
    </h1>

</section>
<div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <div class="row">
                    <div class="col-xs-9">
                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                        <a class="btn btn-primary btn-lg" href="{{ web_url() }}/lab/addTestsForm">Add Lab Test</a>
                    </div>
                    <div>.</div>
                        <div><h3>Lab Tests Data</h3></div>
                        <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Test Name</th>
                                <th>Alias Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->test_name }}</td>
                                <td>{{ $request->alias_name }}</td>
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
<script type="text/javascript">
    $(function() { 
        // DataTable
        var table = $('#locations-table').DataTable();
    });
</script>
@stop