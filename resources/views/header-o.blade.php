<!-- Main Header -->
<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="{{ url('/') }}" style="margin-left: 84px; background-color: #3C8DBC;" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>UDSM </b>IERS</span>
        </a>
        <!-- Navbar Right Menu -->
        <ul class="nav navbar-nav navbar-right navbar-welcome">
            <!-- Authentication Links -->
            @if (Auth::guest())

            @else
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>Bsc in Computer Science</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">PROFILE</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">LOGOUT</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
        </ul>
    </nav>
</header>