<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo"><b>MEDIA</b>MENTIONS</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">




                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="{!! url('profiles') !!}/{!! Sentinel::getUser()->id !!}" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{!! Sentinel::getUser()->gravatar !!}" class="user-image" alt="User Image"/>

                        
                        
                        
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Sentinel::getUser()->full_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{!! Sentinel::getUser()->gravatar !!}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Sentinel::getUser()->name }}  
                                <small>Last Login: {{ Sentinel::getUser()->last_login }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        	  @if (Sentinel::check())
                            <div class="pull-left">
                                <a href="/admin/profiles/{!! Sentinel::getUser()->id !!}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>



