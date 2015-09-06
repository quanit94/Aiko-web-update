      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ url('public/admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{Cookie::get('dataFromSever')['data']['name']}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#" <?php if(Request::is("admin/home/*")){ echo "style='background: #1e282c; border-left-color: #3c8dbc' ";} ?>>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu" <?php if(Request::is("admin/home/*")){ echo "style='display: block' ";} ?>>
                <li <?php if(Request::is("admin/home/dashboard01*")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.home.dashboard_01') }}"><i class="fa fa-circle-o"></i> Dashboard 01</a></li>
                <li <?php if(Request::is("admin/home/dashboard02*")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.home.dashboard_02') }}"><i class="fa fa-circle-o"></i> Dashboard 02</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#" <?php if(Request::is("admin/user/*")){ echo "style='background: #1e282c; border-left-color: #3c8dbc' ";} ?>>
                <i class="fa fa-files-o" style="display: none"></i>
                <span>Manage User</span>
                <span class="label label-primary pull-right">New</span>
              </a>
              <ul class="treeview-menu" <?php if(Request::is("admin/user/*")){ echo "style='display: block' ";} ?>>
                <li <?php if(Request::is("admin/user/list") || Request::is("admin/user/list/*")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.user.list') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li <?php if(Request::is("admin/user/create")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.user.create') }}"><i class="fa fa-circle-o"></i> Create</a></li>
                <li <?php if(Request::is("admin/user/activate")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.user.activate') }}"><i class="fa fa-circle-o"></i> Activate</a></li>
                <li <?php if(Request::is("admin/user/deactivate")){ echo "class='active' ";} ?>><a href="{{ route('get.admin.user.deactivate') }}"><i class="fa fa-circle-o"></i> Deactivate</a></li>
              </ul>
            </li>
            <?php
              if($perInfo['role']['partner']){
                  echo "<li><a href='".route('get.partner.home.dashboard_01')."'><i class='fa fa-circle-o text-aqua'></i> <span>Restaurant</span></a></li>";
              }
            ?>
            {{--<li>--}}
              {{--<a href="pages/widgets.html">--}}
                {{--<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>--}}
              {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
              {{--<a href="#">--}}
                {{--<i class="fa fa-pie-chart"></i>--}}
                {{--<span>Charts</span>--}}
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
              {{--</a>--}}
              {{--<ul class="treeview-menu">--}}
                {{--<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
                {{--<li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
              {{--<a href="#">--}}
                {{--<i class="fa fa-share"></i> <span>Multilevel</span>--}}
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
              {{--</a>--}}
              {{--<ul class="treeview-menu">--}}
                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
                {{--<li>--}}
                  {{--<a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>--}}
                  {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                    {{--<li>--}}
                      {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>--}}
                      {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                      {{--</ul>--}}
                    {{--</li>--}}
                  {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>