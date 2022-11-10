<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{url('/redirect')}}"><img src="admin/assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{url('/redirect')}}"><img src="admin/assets/images/logo.png"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                       
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <!-- <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div> -->
            </div>
        </li>
       
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/redirect')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Tổng Quan</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Sản Phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <!-- view_product = product.balde.php -->
                    <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Thêm Sản Phẩm</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Xem Sản Phẩm</a></li>
                </ul>
            </div>
        </li>


        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_category')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Danh Mục</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_status')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-box"></i>
                </span>
                <span class="menu-title">Trạng Thái</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Hóa Đơn</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/add_hd')}}">Thêm Hóa Đơn</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_hd')}}">Xem Hóa Đơn</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Người Dùng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_kh')}}"> Khách Hàng</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_nv')}}"> Nhân Viên </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/add_user')}}">Thêm User</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-clipboard-text"></i>
                </span>
                <span class="menu-title">Chi Tiết Hóa Đơn</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/add_cthd')}}">Thêm Chi Tiết Hóa Đơn</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_cthd')}}">Xem Chi Tiết Hóa Đơn</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
        <!-- view_cart = show_cart.balde.php -->
            <a class="nav-link" href="{{url('view_cart')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-cart"></i>
                </span>
                <span class="menu-title">Giỏ hàng</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document"></i>
                </span>
                <span class="menu-title">Báo Cáo Thống Kê</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('/baocao')}}"> Báo Cáo
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/show_nv')}}"> Biểu Đồ Thống Kê </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/add_user')}}"> Thêm User </a></li>

                </ul>
            </div>
        </li>

    </ul>
</nav>