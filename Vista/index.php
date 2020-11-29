<!doctype html>
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
	require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/Reservation_Status.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Negocio/ManejoReservation_Status.php';
	
	
	$obj = new Conexion();
	$conexion = $obj->conectarDB();
	
	
	
	ManejoDocument::setConexionBD($conexion);
	ManejoDocument_Type::setConexionBD($conexion);
	ManejoBook::setConexionBD($conexion);
	ManejoPresentation::setConexionBD($conexion);
	ManejoArticle::setConexionBD($conexion);
	ManejoUser::setConexionBD($conexion);
	ManejoEditorial::setConexionBD($conexion);
	ManejoState::setConexionBD($conexion);
	ManejoReservation_Status::setConexionBD($conexion);
	
	$documento = ManejoDocument::getList();
	$t_documento = ManejoDocument_Type::getList();
	$listDoc = ManejoDocument::getList();
?>

<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | MANIGUE ONLINE</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="boighor/images/favicon.ico">
	<link rel="apple-touch-icon" href="boighor/images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="boighor/css/bootstrap.min.css">
	<link rel="stylesheet" href="boighor/css/plugins.css">
	<link rel="stylesheet" href="boighor/style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="boighor/css/custom.css">

	<!-- Modernizer js -->
	<script src="boighor/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
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
								<li class="drop with--one--item"><a href="index.php">Home</a>
								</li>
								<li><a href="login.php">Login</a></li>
							</ul>
						</nav>
					</div>
				</div>			
			</div>		
		</header>
		<!-- //Header -->

        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Find and <span>Reserve </span></h2>
		            				<h2>The <span>Documents </span></h2>
		            				<h2>You <span>Need </span></h2>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>        
		<!-- Start BEst Seller Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section__title text-center">
								<h2 class="title__be--2">All <span class="color--theme">Documents</span></h2>
								<p>In this section you can see the library's documents. If you want to carry out any action, such as booking, you must log in with the system, where you can upload, modify, delete and reserve documents.</p>
							</div>
						</div>
					</div>

					<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
						<!-- Start Single Tab Content -->

						<?php
						if ($documento == 0) {
							echo '<strong class="mr-auto">No hay documentos. </strong>';
						} else {


							foreach ($listDoc as $doc) {


								$tipo = ManejoDocument_Type::consult($doc->getCod_t_documento());


								echo '                  
								<!-- Start Single Product -->
									<div class="col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="product product__style--3">
											<div class="product__thumb">
												<a class="first__img" href="#productmodal"><img src="boighor/images/product/1.jpg" alt="product image"></a>
												<div class="new__box">
													<span class="new-label">'. $tipo->getNom_t_documento() .'</span>
												</div>
												<ul class="prize position__right__bottom d-flex">
													<li>' . $tipo->getNom_t_documento() . '</li>
												</ul>
											</div>
											<div class="product__content content--center content--center">
											'; ?>

						<?php


								# code...

								echo '    <h4><a href="single-product.html">' . $doc->getTitulo() . '</a></h4>';
								echo '
												<div class="action">
													<div class="actions_inner">
														<ul class="add_to_links">
														
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#' . $doc->getCod_documento() . '"><i class="bi bi-search"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Start Single Product -->';
							}
						}
						?>
					</div>
				</div>

		</section>
		
		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.html">
										<img src="boighor/images/logo/logo.png" alt="logo">
									</a>
									<p></p>
								</div>
								<div class="footer__content">
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.php">Home</a></li>
										<li><a href="login.php">Login</a></li>	
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-center">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="#">Manigue | Online Bookstore.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->

    <?php
    foreach ($listDoc as $doc) {
        $user = ManejoUser::consultUser($doc->getSubido_por());
        $editorial = ManejoEditorial::consult($doc->getCod_editorial());
        $t_documento = ManejoDocument_Type::consult($doc->getCod_t_documento());
        $estado = ManejoState::consult($doc->getCod_estado());
 		$presentation = ManejoPresentation::consult($doc->getCod_documento());
 			
 		
 		
       
        
        
       

        echo '<div class="modal fade" id="' . $doc->getCod_documento() . '" tabindex="-1" role="dialog">';

    ?>

        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header modal__header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <a><img src="boighor/images/product/1.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1><?php echo $doc->getTitulo(); ?></h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a>Quantity Available</a>
                                    <a><?php echo $doc->getCantidad(); ?></a>
                                </div>
                            </div>
                            <h1>Loaded by:</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $user->getNombre(); ?></a>
                                </div>
                            </div>
                            <h1>Type of document:</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $t_documento->getNom_t_documento(); ?></a>
                                </div>
                            </div>
                            <h1>publisher's name:</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $editorial->getNom_editorial(); ?></a>
                                </div>
                            </div>
                            <h1>Status:</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $estado->getNom_estado(); ?></a>
                                </div>
                            </div>
                            <h1>Creation date:</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $doc->getFecha_creacion(); ?></a>
                                </div>
                            </div>
                            <h1>Reservation Status</h1>
                            <div class="rating__and__review">
                                <div class="review">
                                    <a><?php echo $reservation->getNom_estado_reserva(); ?></a>
                                </div>
                            </div>
                            
                            <?php
                            if ($doc->getCod_t_documento() == 1) {
                            	 $book = ManejoBook::consultBook($doc->getCod_documento());
                            	echo '<h1>Total Pages:</h1>
                                        <div class="rating__and__review">
                                        <div class="review">
                                            <a>' . $book->getTotal_paginas() . '</a>
                                        </div>
                                        </div>
                                        <h1>ISBN:</h1>
                                        <div class="rating__and__review">
                                        <div class="review">
                                            <a>' . $book->getIsbn() . '</a>
                                        </div>
                                        </div>';
                            }
                            if ($doc->getCod_t_documento() == 2) {
                            	$article = ManejoArticle::consultArticle($doc->getCod_documento());
                                echo '<h1>SSN:</h1>
                                        <div class="rating__and__review">
                                        <div class="review">
                                            <a>' . $article->getSsn() . '</a>
                                        </div>
                                        </div>';
                            }
                            if ($doc->getCod_t_documento() == 3) {
                            	 $reservation = ManejoReservation_Status::consult($doc->getCod_estado_reserva());
                                echo '<h1>ISBN:</h1>
                                        <div class="rating__and__review">
                                        <div class="review">
                                            <a>' . $presentation->getIsbn() . '</a>
                                        </div>
                                        </div>
                                        <h1>Congress name:</h1>
                                        <div class="rating__and__review">
                                        <div class="review">
                                            <a>' . $presentation->getNombre_Congreso() . '</a>
                                        </div>
                                        </div>';
                            } else {
                                echo '';
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php } ?>
</div>
<!-- END QUICKVIEW PRODUCT -->
	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="boighor/js/vendor/jquery.min.js"></script>
	<script src="boighor/js/popper.min.js"></script>
	<script src="boighor/js/bootstrap.min.js"></script>
	<script src="boighor/js/plugins.js"></script>
	<script src="boighor/js/active.js"></script>
	
</body>
</html>