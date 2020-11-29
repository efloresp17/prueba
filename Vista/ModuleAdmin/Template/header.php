
<div class="navbar-wrapper">
    <div class="navbar-logo">
        <a class="mobile-menu" id="mobile-collapse" href="#!">
            <i class="ti-menu"></i>
        </a>
        <a class="mobile-search morphsearch-search" href="#">
            <i class="ti-search"></i>
        </a>
        <a href="index.html">
            <img class="img-fluid" src="master/assets/images/logo.png" alt="Theme-Logo" />
        </a>
        <a class="mobile-options">
            <i class="ti-more"></i>
        </a>
    </div>
    <div class="navbar-container container-fluid">
        <ul class="nav-right">

            <li class="user-profile header-notification">
                <a href="#!">
                    <img src="master/assets/images/perfil.png" class="img-radius" alt="User-Profile-Image">
                    <span><?php echo $user->getNombre(); ?></span>
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="show-notification profile-notification">
                    <li>
                        <a href="logout.php">
                            <i class="ti-layout-sidebar-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
