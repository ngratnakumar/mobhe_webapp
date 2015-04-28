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
                    
                <div class="col-xs-3">
                    
            <form action="{{ web_url() }}/admin/benchmark" method="post">
            <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
              <div class="form-group">
                <label for="date">Select Date</label>
                <input type="date" class="form-control" id="date" name="date">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
                </div>
                </div>
                    <table id="locations-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Doctor</th>
                                <th>Nurse</th>
                                <th>Care Taker</th>
                                <th>Callback from doctor</th>
                                <th>Pharmacy Delivery</th>
                                <th>Lab</th>
                                <th>Physiotherapist</th>
                                <th>Dentist</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->createdAt }}</td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Total">{{ $request->Total }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Doctor">{{ $request->Doctor }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Nurse">{{ $request->Nurse }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/ct">{{ $request->ct }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/cfm">{{ $request->cfm }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/pd">{{ $request->pd }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Lab">{{ $request->Lab }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Physiotherapist">{{ $request->Physiotherapist }}</a></td>
                                <td><a href="{{ web_url() }}/admin/benchmarkSelectedData/{{ $request->createdAt }}/Dentist">{{ $request->Dentist }}</a></td>
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