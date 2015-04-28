@extends('app')

@section('content')
<section class="content-header">
    <h1>
        {{ $title }}
        <small>Control panel</small>
    </h1>

    
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {{ $total_orders }}
                    </h3>
                    <p>
                        Total Orders
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ web_url() }}/admin/orders" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        $ {{ $total_sale }}
                    </h3>
                    <p>
                        Total Sale
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ web_url() }}/admin/orders" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        {{ $total_users }}
                    </h3>
                    <p>
                        Total Users
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ web_url() }}/admin/customers" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        {{ $total_products   }}

                    </h3>
                    <p>
                        Total Products
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ web_url() }}/admin/stores" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>

         </div>

                 <div class="col-xs-12">

            <div class="box box-primary">
                <div class="box-header" style="cursor: move;">
                                    <h3 class="box-title"><i class="ion ion-bag"></i> Recent Orders</h3>
                                                                    </div>
                <div class="box-body table-responsive">
                    <table id="coupons-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total Products</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->total_products }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>
                                @if($order->status == 'Delivered')
                                <span class="badge bg-green">Delivered</span>                              
                                @elseif($order->status == 'Cancelled')
                                <span class="badge bg-red">Cancelled</span>
                                @elseif($order->status == 'Initiated')
                                <span class="badge bg-yellow">Initiated</span>
                                @else
                                <span class="badge bg-green">In Progress</span>
                                @endif
                                </td>
                                <td>{{ date("d M Y",strtotime($order->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Action</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ web_url() }}/admin/order/{{ $order->id }}/details">View Details</a></li>
                                            <!--<li class="divider"></li>
                                            <li><a href="{{ web_url() }}/admin/list/delete/{{ $order->id }}">Delete</a></li>-->
                                        </ul>
                                    </div>
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


@stop