<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Document_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument_Type.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Book.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoBook.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Presentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoPresentation.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Article.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoArticle.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoUser.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Editorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoEditorial.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/State.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoState.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoCategory.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoDocument_Type.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

//$codigoUsuarioActual = $_SESSION['codDocumento'];


ManejoDocument::setConexionBD($conexion);
ManejoDocument_Type::setConexionBD($conexion);
ManejoBook::setConexionBD($conexion);
ManejoPresentation::setConexionBD($conexion);
ManejoArticle::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);
ManejoEditorial::setConexionBD($conexion);
ManejoState::setConexionBD($conexion);
ManejoCategory::setConexionBD($conexion);

$codigoUsuario = $_SESSION['codUser'];
$codigoUsuarioActual = ManejoUser::consultUser($codigoUsuario);
$tipos = ManejoDocument_Type::getList();

$categorias = ManejoCategory::obtenerLista();
$documentos = ManejoDocument::getList();

$listDoc = ManejoDocument::consultDocumentsByUser($codigoUsuarioActual->getCod_usuario());
?>
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">My Profile</h2>
                    <nav class="bradcaump-content">
                        <span class="breadcrumb_item active">Home</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Product Categories</h3>
                        <ul>
                            <?php
                            foreach ($categorias as $c) {
                                echo '<li><a href="#">' . $c->getNom_categoria() . '<span>(3)</span></a></li>';
                            }
                            ?>
                        </ul>
                    </aside>
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Documents That<br>I've Reserved</h3>
                        <div class="price--filter">
                            <a href="?menu=myProfileReserved">View reserved section</a>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                            <div class="shop__list nav justify-content-center" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                            </div>
                            <p>Showing results</p>
                            <div class="orderby__wrapper">
                                <span>Document Type</span>
                                <select class="shot__byselect">
                                    <option>All</option>
                                    <?php
                                    foreach ($tipos as $t) {
                                        echo '<option>' . $t->getNom_t_documento() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab__container">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        <div class="row">
                            <!-- Start Single Product -->
                            <?php
                            foreach ($listDoc as $d) {
                                $tipo = ManejoDocument_Type::consult($d->getCod_t_documento());

                                if ($tipo->getCod_t_documento() == 1) {
                                    echo '                                    
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product">
                                            <div class="product__thumb">
                                                <a class="first__img" href="?menu=infoBook' . $d->getCod_documento() . '"><img src="boighor/images/product/1.jpg" alt="product image"></a>
                                                <a class="second__img animation1" href="?menu=infoBook:' . $d->getCod_documento() . '"><img src="boighor/images/product/2.jpg" alt="product image"></a>
                                                <div class="new__box">
                                                    <span class="new-label">'. $tipo->getNom_t_documento() .'</span>
                                                </div>
                                                <ul class="prize position__right__bottom d-flex">
                                                    <li>' . $tipo->getNom_t_documento() . '</li>
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart" href="cart.html"></a></li>
                                                            <li><a class="wishlist" href="wishlist.html"></a></li>
                                                            <li><a class="compare" href="compare.html"></a></li>
                                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h4><a href="single-product.html">' . $d->getTitulo() . '</a></h4>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                if ($tipo->getCod_t_documento() == 2) {

                                    echo '                                    
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product">
                                            <div class="product__thumb">
                                                <a class="first__img" href="?menu=infoArticle' . $d->getCod_documento() . '"><img src="boighor/images/product/1.jpg" alt="product image"></a>
                                                <a class="second__img animation1" href="?menu=infoArticle:' . $d->getCod_documento() . '"><img src="boighor/images/product/2.jpg" alt="product image"></a>
                                                <div class="new__box">
                                                    <span class="new-label">Hot</span>
                                                </div>
                                                <ul class="prize position__right__bottom d-flex">
                                                    <li>' . $tipo->getNom_t_documento() . '</li>
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart" href="cart.html"></a></li>
                                                            <li><a class="wishlist" href="wishlist.html"></a></li>
                                                            <li><a class="compare" href="compare.html"></a></li>
                                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h4><a href="single-product.html">' . $d->getTitulo() . '</a></h4>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                if ($tipo->getCod_t_documento() == 3) {

                                    echo '                                    
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product">
                                            <div class="product__thumb">
                                                <a class="first__img" href="?menu=infoPresentation' . $d->getCod_documento() . '"><img src="boighor/images/product/1.jpg" alt="product image"></a>
                                                <a class="second__img animation1" href="?menu=infoPresentation:' . $d->getCod_documento() . '"><img src="boighor/images/product/2.jpg" alt="product image"></a>
                                                <div class="new__box">
                                                    <span class="new-label">Hot</span>
                                                </div>
                                                <ul class="prize position__right__bottom d-flex">
                                                    <li>' . $tipo->getNom_t_documento() . '</li>
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart" href="cart.html"></a></li>
                                                            <li><a class="wishlist" href="wishlist.html"></a></li>
                                                            <li><a class="compare" href="compare.html"></a></li>
                                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__content">
                                                <h4><a href="single-product.html">' . $d->getTitulo() . '</a></h4>
                                            </div>
                                        </div>
                                    </div>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <!-- End Single Product -->
                        </div>
                        <ul class="wn__pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>