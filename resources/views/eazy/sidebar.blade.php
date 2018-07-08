<!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu page" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                        @if (Auth::user()->user == 'admin')
                        <li class="nav-item start active open">
                            <a href="/" class="nav-link ">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        
                            <li class="heading">
                                <h3 class="uppercase">Rental</h3>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/rental/list_booking" class="nav-link ">
                                    <i class="icon-layers"></i>
                                    <span class="title">Booking</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/rental/list_car" class="nav-link ">
                                    <i class="icon-support"></i>
                                    <span class="title">Cars</span>
                                </a>
                            </li>

                            <li class="nav-item" style="display:none">
                                <a href="/admin/rental/list_car" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Rental Graphic</span>
                                </a>
                            </li>

                            <li class="heading">
                                <h3 class="uppercase">Administration</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="/admin/user/list_user" class="nav-link">
                                    <i class="icon-user"></i>
                                    <span class="title">Users</span>
                                </a>
                            </li>
                        @elseif(Auth::user()->user == 'owner')
                        <li class="nav-item start active open">
                            <a href="/" class="nav-link ">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                            <li class="heading">
                                <h3 class="uppercase">Rental</h3>
                            </li>

                            <li class="nav-item">
                                <a href="/provider/rental/list_booking" class="nav-link ">
                                    <i class="icon-layers"></i>
                                    <span class="title">Booking</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/provider/rental/list_car" class="nav-link ">
                                    <i class="icon-support"></i>
                                    <span class="title">Cars</span>
                                </a>
                            </li>              
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Rental Graphic</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/rental/history" class="nav-link ">
                                <i class="icon-clock"></i>
                                <span class="title">History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="icon-clock"></i>
                                <span class="title">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
    </div>
<!-- END SIDEBAR -->