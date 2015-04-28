@extends('admin.layout')
@section('content')
<section class="content-header">
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
                <form role="form" method="post" id="main-form" action="{{ web_url() }}/admin/article/save" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="id" value="{{$article->id}}"> 
                        <div class="form-group">
                            <label>Article Name</label>
                            <input type="text" class="form-control" id="" name="title" placeholder="Enter article Name " value="{{$article->title}}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" placeholder="enter a brief description about this article" value='{{$article->description}}' rows="4">{{$article->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Article Image</label>
                            @if($article->image)
                                <img src="{{$article->image}}" height="50px" width="50px">
                            @endif
                                <input type="file" class="form-control" id="" name="image">
                        </div>
                        <div class="form-group">
                            <label>Notification To Users</label>
                            @if($article->is_push_type == 0)
                            <select name="notification" class="form-control">
                                <option value="1"> Enable </option>
                                <option value="0" selected="selected"> Disable </option>
                            </select>
                            @else
                            <select name="notification" class="form-control">
                                <option value="1" selected="selected"> Enable </option>
                                <option value="0"> Disable </option>
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Article Content</label>
                            <textarea class="ckeditor" name="editor1" id="editor1" >{{$article->article_content}}</textarea>
                        </div>
                        <div class="form-group">
                        @if($article->type == '')
                            <label>Article Type</label>
                            <select name="article_type" class="form-control" id="article_type">
                                <option value="events"> Events </option>
                                <option value="dinner_conversations"> Dinner Conversation </option>
                                <option value="services"> Services </option>
                                <option value="reviews"> Reviews </option>
                                <option value="easy_tips"> Easy Tips </option>
                                <option value="recipes"> Recipes </option>
                            </select>
                        @else
                            <input type="hidden" name="article_type" value="{{$article->type}}">
                        @endif
                        </div>
                        <div id="events">
                            <h3><strong>Events</strong></h3><br>
                            <div class="form-group">
                                <label>Venue</label>
                                <input type="text" class="form-control" name="venue" placeholder='Enter A Venue' value="{{$article_meta->venue}}">
                            </div>
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="text" class="form-control" name="cost" placeholder='Enter Amount' value="{{$article_meta->cost}}">
                            </div>
                            <div class="form-group">
                                <label>Contact 1</label>
                                <input type="text" class="form-control" name="contact1" placeholder='Enter Contact information' value="{{$article_meta->contact1}}">
                            </div>
                            <div class="form-group">
                                <label>Contact 2</label>
                                <input type="text" class="form-control" name="contact2" placeholder='Enter Contact Information' value="{{$article_meta->contact2}}">
                            </div>
                            <div class="form-group">
                                <label>Link to Buy</label>
                                <input type="text" class="form-control" name="link_to_buy" placeholder='Enter Link' value="{{$article_meta->link_to_buy}}">
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="text" name="start_date" value="{{$article_meta->start_date}}" class="form-control">
                                <script type="text/javascript">
                                    $(function(){
                                        $('*[name=start_date]').appendDtpicker({
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
                                <label>End Date</label>
                                <input type="text" name="end_date" value="{{$article_meta->end_date}}" class="form-control">
                                <script type="text/javascript">
                                    $(function(){
                                        $('*[name=end_date]').appendDtpicker({
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
                        </div>
                        <div id="easy_tips">
                        <h3><strong>Easy Tips</strong></h3><br>
                            <div class="form-group">
                                <label>Tip 1</label>
                                <input type="text" class="form-control" name="tip1" placeholder='Enter Tip 1' value="{{$article_meta->tip1}}">
                            </div>
                            <div class="form-group">
                                <label>Tip 2</label>
                                <input type="text" class="form-control" name="tip2" placeholder='Enter Tip 2' value="{{$article_meta->tip2}}">
                            </div>
                            <div class="form-group">
                                <label>Duration1</label>
                                <input type="text" class="form-control" name="duration1" placeholder='Enter Duration' value="{{$article_meta->duration1}}">
                            </div>
                            <div class="form-group">
                                <label>Duration 2</label>
                                <input type="text" class="form-control" name="duration2" placeholder='Enter Duration2' value="{{$article_meta->duration2}}">
                            </div>
                        </div>
                        <div id="recipes">
                        <h3><strong>Recipes</strong></h3><br>
                            <div class="form-group">
                                <label>Veg / Non-veg</label>
                                <select class="form-control" name="is_veg">
                                @if($article_meta->is_veg == 0)
                                    <option value="1"> Veg </option>
                                    <option value="0" selected="selected"> Non Veg</option>
                                @else
                                    <option value="1"> Veg </option>
                                    <option value="0"> Non Veg</option>
                                @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control" name="type" placeholder='Enter Type' value="{{$article_meta->type}}">
                            </div>
                            <div class="form-group">
                                <label>Numbers To be Served</label>
                                <input type="number" class="form-control" name="number_served" placeholder='Enter Numbers to be served' value="{{$article_meta->number_served}}">
                            </div>
                            <div class="form-group">
                                <label>Cooking Method</label>
                                <input type="text" class="form-control" name="cooking_method" placeholder='' value="{{$article_meta->cooking_method}}">
                            </div>
                            <div class="form-group">
                                <label>Ingrediants</label>
                                <textarea class="form-control" name="ingrediants" rows="3" value="{{$article_meta->ingrediants}}">{{$article_meta->ingrediants}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Procedure</label>
                                <textarea class="form-control" name="procedure" rows="3" value="{{$article_meta->procedure}}">{{$article_meta->procedure}}</textarea>
                            </div>
                        </div>
                        <div id="dinner_conversation">
                        <h3><strong>Dinner Conversation</strong></h3><br>
                            <div class="form-group">
                                <label>External link</label>
                                <input type="text" class="form-control" name="external_link" placeholder='' value="{{$article_meta->external_links}}">
                            </div>
                            <div class="form-group">
                                <label>Forum link</label>
                                <input type="text" class="form-control" name="forum_link" placeholder='' value="{{$article_meta->forum_link}}">
                            </div>
                        </div>
                        <div id="services">
                        <h3><strong>Services</strong></h3><br>
                            <div class="form-group">
                                <label>Affiliated link</label>
                                <input type="text" class="form-control" name="affiliated_link" value="{{$article_meta->affiliated_link}}" placeholder=''>
                            </div>
                        </div>
                        <div id="reviews">
                        <h3><strong>Reviews</strong></h3><br>
                            <!-- <div class="form-group">
                                <label>Movie Images</label>
                                <input type="file" name="file[]" id="file" class="form-control" multiple>
                            </div> -->
                            <div class="form-group">
                                <label>Image 2</label>
                                @if($article_meta->img2)
                                    <img src="{{$article_meta->img2}}" height="50px" width="50px">
                                @endif
                                <input type="file" name="image2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image 3</label>
                                @if($article_meta->img3)
                                    <img src="{{$article_meta->img3}}" height="50px" width="50px">
                                @endif
                                <input type="file" name="image3" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <input type="text" class="form-control" name="language" placeholder='' value="{{$article_meta->language}}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_released">
                                @if($article_meta->is_released == 0)
                                    <option value='1'> Released </option>
                                    <option value="0" selected="selected"> Yet to be Released </option>
                                @else
                                    <option value='1'> Released </option>
                                    <option value="0"> Yet to be Released </option>
                                @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type of Movie</label>
                                <input type="text" class="form-control" name="type_of_movie" placeholder='' value="{{$article_meta->language}}">
                            </div>
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
$("#main-form").validate({
  rules: {
    name: "required",
    kg: {
      required: true,
      number: true,
    },
    cost:{
        required:true,
        number:true,
    },
    cost_per_kg : {
        required:true,
        number:true,
    }
  }
});

    $(function(){
  $('#date_picker').dtpicker();
});

    $(document).ready(function () {
        $('#events').hide();
        $('#easy_tips').hide();
        $('#recipes').hide();
        $('#reviews').hide();
        $('#dinner_conversation').hide();
        $('#services').hide();
        if ('{{$article->type}}' == 'events') {
            $('#events').show();
        }else if ('{{$article->type}}' == 'easy_tips') {
            $('#easy_tips').show();
        }else if ('{{$article->type}}' == 'recipes') {   
            $('#recipes').show();
        }else if ('{{$article->type}}' == 'reviews') {
            $('#reviews').show();
        }else if ('{{$article->type}}' == 'dinner_conversations') {
            $('#dinner_conversation').show();
        }else if ('{{$article->type}}' == 'services') {
            $('#services').show();
        }else{
            $('#events').show();
        }
    })

    $(function () {
        $('#datetimepicker2').datetimepicker();
        $('#datetimepicker3').datetimepicker();
        $('#start_date').val("{{$article_meta->start_date}}");
        $('#end_date').val("{{$article_meta->end_date}}");
    });

    function article_type () {
        /*var selected_type = $('#article_type').find(':selected').text();
        console.log(selected_type);*/
    }

    $('#article_type').change(function () {
        var selected_type = $('#article_type').find(':selected').val();
        if (selected_type == 'events') {
            $('#events').show();
            $('#easy_tips').hide();
            $('#recipes').hide();
            $('#reviews').hide();
            $('#dinner_conversation').hide();
            $('#services').hide();
        }else if (selected_type == 'easy_tips') {
            $('#events').hide();
            $('#easy_tips').show();
            $('#recipes').hide();
            $('#reviews').hide();
            $('#dinner_conversation').hide();
            $('#services').hide();
        }else if (selected_type == 'recipes') {
            $('#events').hide();
            $('#easy_tips').hide();
            $('#recipes').show();
            $('#reviews').hide();
            $('#dinner_conversation').hide();
            $('#services').hide();
        }else if (selected_type == 'reviews') {
            $('#events').hide();
            $('#easy_tips').hide();
            $('#recipes').hide();
            $('#reviews').show();
            $('#dinner_conversation').hide();
            $('#services').hide();
        }else if (selected_type == 'dinner_conversation') {
            $('#events').hide();
            $('#easy_tips').hide();
            $('#recipes').hide();
            $('#reviews').hide();
            $('#dinner_conversation').show();
            $('#services').hide();
        }else if (selected_type == 'services') {
            $('#events').hide();
            $('#easy_tips').hide();
            $('#recipes').hide();
            $('#reviews').hide();
            $('#dinner_conversation').hide();
            $('#services').show();
        };
    })
</script>

@stop