<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/Status_User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoStatus_User.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);
ManejoUser_Type::setConexionBD($conexion);
ManejoStatus_User::setConexionBD($conexion);

$codigoUsuario = $_SESSION['codUser'];

$codigoUsuarioActual = ManejoUser::consultUser($codigoUsuario);
$t_user = ManejoUser_Type::consult($codigoUsuarioActual->getCod_t_usuario());
$statusUser = ManejoStatus_User::consult($codigoUsuarioActual->getEstado());

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-6 col-lg-2">
            <div class="logo">
                <a href="index.php">
                    <img src="boighor/images/logo/logo.png" alt="logo images">
                </a>
            </div>
        </div>
        <div class="col-lg-8 d-none d-lg-block">
            <nav class="mainmenu__nav">
                <ul class="meninmenu d-flex justify-content-start">
                    <li class="drop with--one--item"><a href="?menu=index">Home</a>
                    </li>
                    <li class="drop with--one--item"><a href="?menu=MyProfile">My Profile</a>
                    </li>
                    <li class="drop with--one--item"><a href="?menu=create">New Document</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-6 col-sm-6 col-6 col-lg-2">
            <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                <li class="setting__bar__icon"><a class="cartbox_active" href="#"></a>
                    <!-- Start Shopping Cart -->
                    <div class="block-minicart minicart__active">
                        <div class="minicart-content-wrapper">
                            <div class="micart__close">
                                <span>close</span>
                            </div>
                            <div class="single__items">
                                <div class="miniproduct">
                                    <div class="item01 d-flex mt--20">
                                        <div class="content">
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Full names:</span>
                                                <h6><a><?php echo $codigoUsuarioActual->getNombre(); ?></a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Type of user:</span>
                                                <h6><a><?php echo $t_user->getNom_t_usuario(); ?></a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Status profile:</span>
                                                <h6><a> <?php echo $statusUser->getNom_estado(); ?> </a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Address:</span>
                                                <h6><a><?php echo $codigoUsuarioActual->getDireccion(); ?></a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Phone:</span>
                                                <h6><a><?php echo $codigoUsuarioActual->getTelefono(); ?></a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Number of documents:</span>
                                                <h6><a><?php echo $codigoUsuarioActual->getCantidad_documentos(); ?></a></h6>
                                            </div>
                                            <div class="product_prize d-flex justify-content-between">
                                                <span class="prize">Email: </span>
                                                <h6><span class="qun"><?php echo $codigoUsuarioActual->getCorreo(); ?></span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mini_action checkout">
                                <a class="checkout__btn" href="?menu=modifyUser">Modify your data</a>
                            </div>
                            <div class="mini_action checkout">
                                <a class="checkout__btn" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Shopping Cart -->
                </li>
            </ul>
        </div>
    </div>
    <!-- Start Mobile Menu -->
    <div class="row d-none">
        <div class="col-lg-12 d-none">
            <nav class="mobilemenu__nav">
                <ul class="meninmenu">
                    <li><a href="index.html">Home</a>
                        <ul>
                            <li><a href="index.html">Home Style Default</a></li>
                            <li><a href="index-2.html">Home Style Two</a></li>
                            <li><a href="index-box.html">Home Box Style</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="about.html">About Page</a></li>
                            <li><a href="portfolio.html">Portfolio</a>
                                <ul>
                                    <li><a href="portfolio.html">Portfolio</a></li>
                                    <li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                </ul>
                            </li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="cart.html">Cart Page</a></li>
                            <li><a href="checkout.html">Checkout Page</a></li>
                            <li><a href="wishlist.html">Wishlist Page</a></li>
                            <li><a href="error404.html">404 Page</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="team.html">Team Page</a></li>
                        </ul>
                    </li>
                    <li><a href="shop-grid.html">Shop</a>
                        <ul>
                            <li><a href="shop-grid.html">Shop Grid</a></li>
                            <li><a href="shop-list.html">Shop List</a></li>
                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                            <li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
                            <li><a href="single-product.html">Single Product</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="blog.html">Blog Page</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Mobile Menu -->
    <div class="mobile-menu d-block d-lg-none">
    </div>
    <!-- Mobile Menu -->
</div>