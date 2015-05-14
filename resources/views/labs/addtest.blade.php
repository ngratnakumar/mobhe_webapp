@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Control Panel</small>
        </h1>
    </section>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="btn-group btn-group-sm" role="group" aria-label="">
                                <a class="btn btn-primary btn-lg" href="{{ web_url() }}/lab/viewTests">View Tests</a>
                            </div>
                            <form action="{{ web_url() }}/lab/addTest" method="post" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                                <div class="col-xs-9">
                                    <div class="form-group">
                                        <label for="">Test Name</label>
                                        <input type="text" class="form-control input-sm" name="test_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alias Names</label>
                                        <input type="text" class="form-control input-sm" name="alias_name">
                                    </div>
                                    <button class="btn btn-sm btn-danger">Add Test</button>                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop