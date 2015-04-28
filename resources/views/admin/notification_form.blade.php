
@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <h1>
        {{ $title }}
        <small>Control panel</small>
    </h1>
    
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $sub_title }}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="main-form" action="{{ web_url() }}/admin/notification/save" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="id" value="{{$notification->id}}"> 
                        <div class="form-group">
                            <label>Article</label>
                            @if(!$notification->article_id)
                            <select name="article_id" class="form-control">
                                @foreach($articles as $article)
                                    <option value="{{$article->id}}">{{$article->title}}</option>
                                @endforeach
                            </select>
                            @else
                            <input type="hidden" value="{{$notification->article_id}}" name="article_id">
                            <input type="text" value="{{$article_title}}" readonly="true" class="form-control">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Push Time</label>
                            <input type="text" name="push_time" value="{{$notification->push_time}}" class="form-control">
                            <script type="text/javascript">
                                $(function(){
                                    $('*[name=push_time]').appendDtpicker({
                                        "onShow": function(handler){
                                            //window.alert('Picker is shown!');
                                        },
                                        "onHide": function(handler){
                                            //window.alert('Picker is hidden!');
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label>Push Type</label>
                            <select name="push_type" class="form-control" id="push_type">
                            @if($notification->push_type == 'to_specified_users')
                                <option value="to_all"> To All </option>
                                <option value="to_specified_users" selected="selected"> To Specified Users </option>
                            @else
                                <option value="to_all" selected="selected"> To All </option>
                                <option value="to_specified_users" > To Specified Users </option>
                            @endif
                            </select>
                        </div>
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">


            $(function () {
                $('#datetimepicker1').datetimepicker();
                $('#date').val("{{$notification->push_time}}");
            });
</script>

@stop