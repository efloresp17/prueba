<?php 
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Document_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoDocument_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Book.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoBook.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Presentation.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoPresentation.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Article.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoArticle.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/User.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/Editorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoEditorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/State.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Negocio/ManejoState.php';
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

    $cod_doc= $_GET['cod_doc'];
    $documento = ManejoDocument::getList();
    $listDoc = ManejoDocument::consult($cod_doc);
    $user = ManejoUser::consultUser($listDoc->getSubido_por());
    $editorial = ManejoEditorial::consult($listDoc->getCod_editorial());
    $t_documento = ManejoDocument_Type::consult($listDoc->getCod_t_documento());
    $estado = ManejoState::consult($listDoc->getCod_estado());
    $book = ManejoBook::consultBook($listDoc->getCod_documento());
    $article = ManejoArticle::consultArticle($listDoc->getCod_documento());
    $presentation = ManejoPresentation::consult($listDoc->getCod_documento());
    $reservation = ManejoReservation_Status::consult($listDoc->getCod_estado_reserva());
?>

<div class="box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search entire store here...">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Modify and Save</h2>
                    <nav class="bradcaump-content">
                        <a class="breadcrumb_item" href="?menu=index">Documents</a>
                        <span class="brd-separetor">/</span>
                        <span class="breadcrumb_item active">Modify</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<div class="toast" name="toast">
    <div class="toast-header">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Modify Data</h3>
                    <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 1 -->    
                    <?php
                        if($listDoc->getCod_t_documento()==1){?>
                        <form action="ModuleUser/modifyBook.php?cod_doc=<?php echo $listDoc->getCod_documento()?>" id="formModificar" enctype="multipart/form-data" method="POST" name="formModificar">
                        <div class="account__form">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="input__box">
                                <label>Title <span>*</span></label>
                                <input type="text" id="title" name="title" value="<?php echo  $listDoc->getTitulo()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Quantity Available <span>*</span></label>
                                <input type="text" id="quantity" name="quantity" value="<?php echo  $listDoc->getCantidad()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Loaded By <span>*</span></label>
                                <input type="text" id="loadedBy" name="loadedBy" value="<?php echo  $user->getNombre()  ?>"readonly>
                            </div>
                            <div class="input__box">
                                <label>Type Of Document <span>*</span></label>
                                <select class="select__option" name="typeOfDocument" id="typeOfDocument"  placeholder="typeOfDocument" required>
                                <option value="<?php echo $t_documento->getCod_t_documento();?>" ><?php echo $t_documento->getNom_t_documento();?></option> 
                                <option value="1" >Book</option> 
                                <option value="2" >Article Scientific</option>
                                <option value="3" >Presentation</option>
                                </select>
                                <!--<input type="text" id="typeOfDocument" name="typeOfDocument" value="" required>-->
                            </div>
                            <div class="input__box">
                                <label>Creation Date <span>*</span></label>
                                <input type="date" id="date" name="date" value="<?php echo $listDoc->getFecha_creacion();?>" required>
                            </div>
                            <div class="form__btn">
                            <button class="modifyBook">Save</button>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="input__box">
                                <label>Publisher's Name <span>*</span></label>
                                <select class="select__option" id="publisher" name="publisher"  placeholder="publisher" required>
                                <option value="<?php echo $editorial->getCod_editorial();?>" ><?php echo $editorial->getNom_editorial();?></option> 
                                <?php 
                                $editorial = ManejoEditorial::getList();
                                foreach($editorial as $ed){
                                    echo '<option value="'.$ed->getCod_editorial().'">'.$ed->getNom_editorial().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>Status <span>*</span></label>
                                <select class="select__option" id="state" name="state" placeholder="state" required>
                                <option value="<?php echo $estado->getCod_estado();?>" ><?php echo $estado->getNom_estado();?></option> 
                                <?php 
                                $estado = ManejoState::getList();
                                foreach($estado as $es){
                                    echo '<option value="'.$es->getCod_estado().'">'.$es->getNom_estado().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>Reservation Status <span>*</span></label>
                                <select class="select__option" id="reservation" name="reservation" placeholder="reservation" readonly>
                                <option value="<?php echo $reservation->getCod_estado_reserva(); ?>" ><?php echo $reservation->getNom_estado_reserva(); ?></option> 
                                </select>
                            </div>

                            <?php 
                            if($listDoc->getCod_t_documento()==1){
                                echo '<div class="input__box">
                                <label>Total Page <span>*</span></label>
                                <input type="text" id="total" name="total" value="'.$book->getTotal_paginas().'" required>
                                </div>
                                <div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$book->getIsbn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==2){
                                echo '<div class="input__box">
                                <label>SSN <span>*</span></label>
                                <input type="text" id="ssn" name="ssn" value="'.$article->getSsn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==3){
                                echo '<div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$presentation->getIsbn().'" required>
                                </div>
                                <div class="input__box">
                                    <label>CONGRESS NAME <span>*</span></label>
                                    <input type="text" id="nameC" name="nameC" value="'.$presentation->getNombre_Congreso().'" required>
                                </div>';
                            }else{
                                echo '';
                            }
                            ?>
                        </div>
                        </div>
                        </div>
                        </form> 

                    <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 2-->    
                    <?php } ?> <?php if($listDoc->getCod_t_documento()==2){ ?>
                        <form action="ModuleUser/modifyArticle.php?cod_doc=<?php echo $listDoc->getCod_documento()?>" id="formModificar" enctype="multipart/form-data" method="POST" name="formModificar">
                        <div class="account__form">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="input__box">
                                <label>Title <span>*</span></label>
                                <input type="text" id="title" name="title" value="<?php echo  $listDoc->getTitulo()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Quantity Available <span>*</span></label>
                                <input type="text" id="quantity" name="quantity" value="<?php echo  $listDoc->getCantidad()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Loaded By <span>*</span></label>
                                <input type="text" id="loadedBy" name="loadedBy" value="<?php echo  $user->getNombre()  ?>"readonly>
                            </div>
                            <div class="input__box">
                                <label>Type Of Document <span>*</span></label>
                                <select class="select__option" name="typeOfDocument" id="typeOfDocument"  placeholder="typeOfDocument" required>
                                <option value="<?php echo $t_documento->getCod_t_documento();?>" ><?php echo $t_documento->getNom_t_documento();?></option> 
                                <option value="1" >Book</option> 
                                <option value="2" >Article Scientific</option>
                                <option value="3" >Presentation</option>
                                </select>
                                <!--<input type="text" id="typeOfDocument" name="typeOfDocument" value="" required>-->
                            </div>
                            <div class="input__box">
                                <label>Creation Date <span>*</span></label>
                                <input type="date" id="date" name="date" value="<?php echo $listDoc->getFecha_creacion();?>" required>
                            </div>
                            <div class="form__btn">
                            <button class="modifyArticle">Save</button>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="input__box">
                                <label>Publisher's Name <span>*</span></label>
                                <select class="select__option" id="publisher" name="publisher"  placeholder="publisher" required>
                                <option value="<?php echo $editorial->getCod_editorial();?>" ><?php echo $editorial->getNom_editorial();?></option> 
                                <?php 
                                $editorial = ManejoEditorial::getList();
                                foreach($editorial as $ed){
                                    echo '<option value="'.$ed->getCod_editorial().'">'.$ed->getNom_editorial().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>State <span>*</span></label>
                                <select class="select__option" id="state" name="state" placeholder="state" required>
                                <option value="<?php echo $estado->getCod_estado();?>" ><?php echo $estado->getNom_estado();?></option> 
                                <?php 
                                $estado = ManejoState::getList();
                                foreach($estado as $es){
                                    echo '<option value="'.$es->getCod_estado().'">'.$es->getNom_estado().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>Reservation Status <span>*</span></label>
                                <select class="select__option" id="reservation" name="reservation" placeholder="reservation" readonly>
                                <option value="<?php echo $reservation->getCod_estado_reserva(); ?>" ><?php echo $reservation->getNom_estado_reserva(); ?></option> 
                                </select>
                            </div>
                            <?php 
                            if($listDoc->getCod_t_documento()==1){
                                echo '<div class="input__box">
                                <label>Total Page <span>*</span></label>
                                <input type="text" id="total" name="total" value="'.$book->getTotal_paginas().'" required>
                                </div>
                                <div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$book->getIsbn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==2){
                                echo '<div class="input__box">
                                <label>SSN <span>*</span></label>
                                <input type="text" id="ssn" name="ssn" value="'.$article->getSsn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==3){
                                echo '<div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$presentation->getIsbn().'" required>
                                </div>
                                <div class="input__box">
                                    <label>CONGRESS NAME <span>*</span></label>
                                    <input type="text" id="nameC" name="nameC" value="'.$presentation->getNombre_Congreso().'" required>
                                </div>';
                            }else{
                                echo '';
                            }
                            ?>
                        </div>
                        </div>
                        </div>
                        </form>    
                    
                    <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 3 -->        
                    <?php } ?> <?php if($listDoc->getCod_t_documento()==3){ ?>
                        <form action="ModuleUser/modifyPresentation.php?cod_doc=<?php echo $listDoc->getCod_documento()?>" id="formModificar" enctype="multipart/form-data" method="POST" name="formModificar">
                        <div class="account__form">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="input__box">
                                <label>Title <span>*</span></label>
                                <input type="text" id="title" name="title" value="<?php echo  $listDoc->getTitulo()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Quantity Available <span>*</span></label>
                                <input type="text" id="quantity" name="quantity" value="<?php echo  $listDoc->getCantidad()  ?>" required>
                            </div>
                            <div class="input__box">
                                <label>Loaded By <span>*</span></label>
                                <input type="text" id="loadedBy" name="loadedBy" value="<?php echo  $user->getNombre()  ?>"readonly>
                            </div>
                            <div class="input__box">
                                <label>Type Of Document <span>*</span></label>
                                <select class="select__option" name="typeOfDocument" id="typeOfDocument"  placeholder="typeOfDocument" required>
                                <option value="<?php echo $t_documento->getCod_t_documento();?>" ><?php echo $t_documento->getNom_t_documento();?></option> 
                                <option value="1" >Book</option> 
                                <option value="2" >Article Scientific</option>
                                <option value="3" >Presentation</option>
                                </select>
                                <!--<input type="text" id="typeOfDocument" name="typeOfDocument" value="" required>-->
                            </div>
                            <div class="input__box">
                                <label>Creation Date <span>*</span></label>
                                <input type="date" id="date" name="date" value="<?php echo $listDoc->getFecha_creacion();?>" required>
                            </div>
                            <div class="form__btn">
                            <button class="modifyPresentation">Save</button>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="input__box">
                                <label>Publisher's Name <span>*</span></label>
                                <select class="select__option" id="publisher" name="publisher"  placeholder="publisher" required>
                                <option value="<?php echo $editorial->getCod_editorial();?>" ><?php echo $editorial->getNom_editorial();?></option> 
                                <?php 
                                $editorial = ManejoEditorial::getList();
                                foreach($editorial as $ed){
                                    echo '<option value="'.$ed->getCod_editorial().'">'.$ed->getNom_editorial().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>State <span>*</span></label>
                                <select class="select__option" id="state" name="state" placeholder="state" required>
                                <option value="<?php echo $estado->getCod_estado();?>" ><?php echo $estado->getNom_estado();?></option> 
                                <?php 
                                $estado = ManejoState::getList();
                                foreach($estado as $es){
                                    echo '<option value="'.$es->getCod_estado().'">'.$es->getNom_estado().'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input__box">
                                <label>Reservation Status <span>*</span></label>
                                <select class="select__option" id="reservation" name="reservation" placeholder="reservation" readonly>
                                <option value="<?php echo $reservation->getCod_estado_reserva(); ?>" ><?php echo $reservation->getNom_estado_reserva(); ?></option> 
                                </select>
                            </div>
                            <?php 
                            if($listDoc->getCod_t_documento()==1){
                                echo '<div class="input__box">
                                <label>Total Page <span>*</span></label>
                                <input type="text" id="total" name="total" value="'.$book->getTotal_paginas().'" required>
                                </div>
                                <div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$book->getIsbn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==2){
                                echo '<div class="input__box">
                                <label>SSN <span>*</span></label>
                                <input type="text" id="ssn" name="ssn" value="'.$article->getSsn().'" required>
                                </div>';
                            }if($listDoc->getCod_t_documento()==3){
                                echo '<div class="input__box">
                                    <label>ISBN <span>*</span></label>
                                    <input type="text" id="isbn" name="isbn" value="'.$presentation->getIsbn().'" required>
                                </div>
                                <div class="input__box">
                                    <label>CONGRESS NAME <span>*</span></label>
                                    <input type="text" id="nameC" name="nameC" value="'.$presentation->getNombre_Congreso().'" required>
                                </div>';
                            }else{
                                echo '';
                            }
                            ?>
                        </div>
                        </div>
                        </div>
                        </form>  
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>