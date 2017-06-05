<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if( Auth::User()->hasRole(['Admin']) )
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span> MANAGE</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-chevron-circle-right"></i> MANAGE USERS</a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/list/admins') }}"><i class="fa fa-arrow-right"></i> Administrators</a>
                            </li>
                            <li><a href="{{ url('/list/instructors') }}"><i class="fa fa-arrow-right"></i>
                                    Instructors</a></li>
                            <li><a href="{{ url('/list/students') }}"><i class="fa fa-arrow-right"></i> Students</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/list/colleges') }}"><i class="fa fa-chevron-circle-right"></i> MANAGE COLLEGES</a>
                    </li>
                    <li><a href="{{ url('/list/courses') }}"><i class="fa fa-chevron-circle-right"></i> MANAGE
                            COURSES</a></li>
                </ul>
            </li>
            @endif
                <li class="active"><a href="{{ url('/list/forms') }}"><i class="fa fa-link"></i> <span> FORMS</span></a></li>
                @if( Auth::User()->hasRole(['Admin']) )
                <li class="active"><a href="{{ url('report') }}"><i class="fa fa-link"></i> <span> REPORTS</span></a></li>
                @endif

            </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>