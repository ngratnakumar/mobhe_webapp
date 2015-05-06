<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mobhe | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ web_url() }}/admin_asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ web_url() }}/admin_asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ web_url() }}/admin_asset/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href="{{ web_url() }}/admin_asset/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        
        <link href="{{ web_url() }}/admin_asset/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="{{ web_url() }}/admin_asset/css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{ web_url() }}/js/jquery.validate.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <link href="{{ web_url() }}/admin_asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="{{ web_url() }}/admin_asset/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <link href="{{ web_url() }}/admin_asset/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="{{ web_url() }}/admin_asset/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
                <!-- date-range-picker -->
        <script src="{{ web_url() }}/admin_asset/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="{{ web_url() }}/admin_asset/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $('#confirm').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                    //console.log(id);
                    // pass id to appropriate element here  
            });
        </script>
        <style type="text/css">
        .error{
            color:red;
            border-color:red;
        }
        </style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="{{ web_url() }}/admin/dashboard" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="{{ asset('/images/logo.png') }}" style="height: 35px;">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Auth::user()->name }}<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="{{ web_url() }}/admin_asset/img/avatar2.png" class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->name }}  
                                        <small>{{ Auth::user()->roll }}</small>
                                    </p>
                                </li>
                                <!-- 
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                   <!--  <div class="pull-left">
                                        <a href="{{ web_url() }}/admin/profile" class="btn btn-default btn-flat">Change Password</a>
                                    </div> --> 
                                    <div class="pull-right">
                                        <a href="{{ web_url() }}/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ web_url() }}/admin_asset/img/avatar2.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{ Auth::user()->name }}</p>

                            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                        </div>
                    </div>
                    <!-- 
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    @if( Auth::user()->roll == 'admin')
                        <li>
                            <a href="{{ web_url() }}/admin/benchmark/">
                                <i class="fa fa-home"></i><span>Benchmark</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ web_url() }}/admin/webAppUsers/">
                                <i class="fa fa-anchor"></i><span>Web App Users</span>
                            </a>
                        </li>                        
                        <li>
                            <a href="{{ web_url() }}/admin/appUsers/">
                                <i class="fa fa-group"></i><span>App Users</span>
                            </a>
                        </li>                        
                        <li>
                            <a href="{{ web_url() }}/data">
                                <i class="fa fa-dashboard"></i><span>Mobhe Leads</span>
                            </a>
                        </li>
<!--                         <li>
                            <a href="{{ web_url() }}/prana">
                                <i class="fa fa-home"></i><span>Prana</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{ web_url() }}/mdent">
                                <i class="fa fa-medkit"></i> <span>Mobident</span>
                            </a>
                        </li> 
                        <li>
                            <a href="{{ web_url() }}/admin/doctors">
                                <i class="fa fa-group"></i><span>Mobhe Doctors</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ web_url() }}/admin/labs">
                                <i class="fa fa-map-marker"></i> <span>Mobhe Labs</span>
                            </a>
                        </li>   
<!--                          <li>
                            <a href="{{ web_url() }}/admin/pharmacies" style="color: grey;">
                                <i class="fa fa-map-marker"></i> <span>Mobhe Pharmacies</span>
                            </a>
                        </li> -->     
                        <li>
                            <a href="{{ web_url() }}/admin/preSync" style="color: red;" onclick="return confirm('Need to wait few Min's !')">
                                <i class="fa fa-refresh"></i> <span>Update Data</span>
                            </a>
                        </li>     
                        @else
                                                <li>
                            <a href="{{ web_url() }}/admin/" style="color: red;" onclick="return confirm('Need to wait few Min's !')">
                                <i class="fa fa-refresh"></i> <span>Check data</span>
                            </a>
                        </li> 
                        @endif        
                    </ul>


                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                @yield('content')
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="{{{ asset('assets/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2')}}}"></script>
<script src="{{{ asset('assets/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2')}}}"></script>
        <!-- Bootstrap -->
        <script src="{{ web_url() }}/admin_asset/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{ web_url() }}/admin_asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="{{ web_url() }}/admin_asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->

        <script src="{{ web_url() }}/admin_asset/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <script src="http://cdn2.mosaicpro.biz/shared/assets/components/forms_elements_bootstrap-datepicker/bootstrap-datepicker.init.js?v=v2.0.1-rc1&sv=v0.0.1.2"></script>

            <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
            <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>

            <script type="text/javascript" src="{{web_url()}}/assets/Simple-Datetimepicker/jquery.simple-dtpicker.js"></script>
            <link type="text/css" href="{{web_url()}}/assets/Simple-Datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet" />
        
        <!-- page script -->
        

    </body>
</html>