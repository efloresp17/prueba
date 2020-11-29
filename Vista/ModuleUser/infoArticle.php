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
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoBook.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoAuthor_Document.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoCategory.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoDocument::setConexionBD($conexion);
ManejoDocument_Type::setConexionBD($conexion);
ManejoArticle::setConexionBD($conexion);
ManejoUser::setConexionBD($conexion);
ManejoEditorial::setConexionBD($conexion);
ManejoState::setConexionBD($conexion);
ManejoAuthor_Document::setConexionBD($conexion);
ManejoCategory::setConexionBD($conexion);

$documento =  $_SESSION['codDocumento'];
//$documento =  1;
$listDoc = ManejoDocument::consult($documento);
$user = ManejoUser::consultUser($listDoc->getSubido_por());
$editorial = ManejoEditorial::consult($listDoc->getCod_editorial());
$autores = ManejoAuthor_Document::consult($documento);
$t_documento = ManejoDocument_Type::consult($listDoc->getCod_t_documento());
$categorias = ManejoCategory::obtenerLista();
if ($t_documento->getCod_t_documento() == 2) {
    $variable = ManejoArticle::consultArticle($documento);
}
$estado = ManejoState::consult($listDoc->getCod_estado());
?>
<!-- Start main Content -->
<div class="maincontent bg--white pt--80 pb--55">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="wn__fotorama__wrapper">
                                <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                    <a href="1.jpg"><img src="boighor/images/product/1.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product__info__main">
                                <h1><?php echo $listDoc->getTitulo(); ?></h1>
                                <div class="product-info-stock-sku d-flex">
                                    <p>Availability: <span><?php echo $estado->getNom_estado(); ?></span></p>
                                    <p>Uploaded: <span> <?php echo $listDoc->getFecha_creacion(); ?></span></p>
                                </div>
                                <div class="product-info-stock-sku d-flex">
                                    <p>Autor: <span></span></p>
                                </div>
                                <div class="product-info-stock-sku d-flex">
                                    <p>Editorial: <span><?php echo $editorial->getNom_editorial(); ?></span></p>
                                </div>
                                <div class="product-info-stock-sku d-flex">
                                    <?php
                                    if ($t_documento->getCod_t_documento() == 1) {
                                        echo '<p>Publication Date: <span>' . $variable->getFecha_publicacion() . '</span></p>';
                                    } else if ($t_documento->getCod_t_documento() == 2) {
                                        echo '<p>Publication Date: <span>' . $variable->getFecha_publicacion() . '</span></p>';
                                    } else if ($t_documento->getCod_t_documento() == 3) {
                                        echo '<p>Publication Date: <span>' . $variable->getFecha_publicacion() . '</span></p>';
                                    }

                                    ?>
                                </div>
                                <div class="product-info-stock-sku d-flex">
                                    <?php
                                    if ($t_documento->getCod_t_documento() == 1) {
                                        echo '<p>Pages: <span>' . $variable->getTotal_paginas() . '</span></p>';
                                    } else if ($t_documento->getCod_t_documento() == 2) {
                                        echo '<p>SSN: <span>' . $variable->getSsn() . '</span></p>';
                                    } else if ($t_documento->getCod_t_documento() == 3) {
                                        echo '<p>ISBN: <span>' . $variable->getIsbn() . '</span></p>';
                                    }

                                    ?>
                                </div>
                                <?php
                                if ($t_documento->getCod_t_documento() == 1) {
                                    echo '<div class="product-info-stock-sku d-flex">';
                                    echo '<p>ISBN: <span>' . $variable->getIsbn() . '</span></p>';
                                    echo '</div>';
                                } else if ($t_documento->getCod_t_documento() == 2) {
                                } else if ($t_documento->getCod_t_documento() == 3) {
                                    echo '<div class="product-info-stock-sku d-flex">';
                                    echo '<p>Congress Name: <span>' . $variable->getNombre_Congreso() . '</span></p>';
                                    echo '</div>';
                                }

                                ?>
                                <div class="box-tocart d-flex">
                                    <div class="addtocart__actions">
                                        <button class="tocart" type="submit" onclick="window.location='?menu=modify&cod_doc=<?php echo $listDoc->getCod_documento() ?>'" title="Modify">Modify</button>
                                        <button class="tocart" type="submit" onclick="window.location='?menu=deleteArticle&cod_doc=<?php echo $listDoc->getCod_documento() ?>'" title=" Delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__info__detailed">
                    <div class="pro_details_nav nav justify-content-start" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-review" role="tab">Creator User</a>
                    </div>
                    <div class="tab__container">
                        <!-- End Single Tab Content -->
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane show active" id="nav-review" role="tabpanel">
                            <div class="review__attribute">
                                <h1>User Information</h1>
                                <h2><?php echo $user->getNombre(); ?></h2>
                                <div class="review__ratings__type d-flex">
                                    <div class="review-ratings">
                                        <div class="rating-summary d-flex">
                                            <div class="review-content">

                                                <p>Uploaded by <?php echo $user->getCorreo(); ?></p>
                                                <p>Posted on <?php echo $listDoc->getFecha_creacion(); ?></p>
                                                <p>Email Address <?php echo $user->getCorreo(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-fieldset">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
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
                    <aside class="wedget__categories pro--range">
                        <h3 class="wedget__title">Filter by Years Range</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Year :</span><input type="text" id="amount" readonly="">
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>