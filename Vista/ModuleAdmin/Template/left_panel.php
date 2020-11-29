<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">

    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Options</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="active">
            <a href="?menu=index">
                <span style="background-color: #C0392B;" class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.main">Homepage</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="pcoded-hasmenu active">
            <a href="javascript:void(0)">
                <span style="background-color: #C0392B;" class="pcoded-micon"><i class="ti-agenda"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Documents</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="?menu=books">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Books</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=articles">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Articles</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=presentations">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Presentations</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

            </ul>
        </li>
        <?php if($user->getCod_t_usuario()!=4){?>
        <li class="pcoded-hasmenu active">
            <a href="javascript:void(0)">
                <span style="background-color: #C0392B;" class="pcoded-micon"><i class="ti-user"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Users</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="?menu=administrators">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Administrators</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=readers">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Readers</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=clients">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Clients</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=authors">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Authors</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=editorials">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Editorials</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="pcoded-hasmenu active">
            <a href="javascript:void(0)">
                <span style="background-color: #C0392B;"  class="pcoded-micon"><i class="ti-pie-chart"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Document Statistics</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="?menu=statisticDocumentQuantity">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Document Quantity</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=statisticDocumentStatus">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Document Status</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="pcoded-hasmenu active">
            <a href="javascript:void(0)">
                <span style="background-color: #C0392B;" class="pcoded-micon"><i class="ti-pie-chart"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">User Statistics</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="?menu=statisticUserDoc">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Users Top documents</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=statisticUserReservation">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Users Top reservations</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="?menu=statisticsUserStatus">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Users Status</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

            </ul>
        </li>
        <?php } ?>
    </ul>
</div>