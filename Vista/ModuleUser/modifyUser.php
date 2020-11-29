<?php

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
            <div class="col-lg-12 col-6">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Modify User</h3>
                    <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 1 -->

                    <form action="ModuleUser/modUser.php?cod_usuario=<?php echo $codigoUsuarioActual->getCod_usuario()?>" id="formModificar" enctype="multipart/form-data" method="POST" name="formModificar">
                        <div class="account__form">

                            <div class="col-lg-8">
                                <div class="input__box">
                                    <label>Full name <span>*</span></label>
                                    <input type="text" id="fullname" name="fullname" value="<?php echo  $codigoUsuarioActual->getNombre()  ?>" required>
                                </div>
                                <div class="input__box">
                                    <label>Email <span>*</span></label>
                                    <input type="text" id="email" name="email" value="<?php echo  $codigoUsuarioActual->getCorreo()  ?>" required>
                                </div>
                                <div class="input__box">
                                    <label>Type of User <span>*</span></label>
                                    <select class="select__option" id="typeUser" name="typeUser" placeholder="Type of User" readonly>
                                        <option value="<?php echo $t_user->getCod_t_usuario() ?>"><?php echo $t_user->getNom_t_usuario() ?></option>
                                    </select>
                                </div>
                                <div class="input__box">
                                    <label>Status Profile <span>*</span></label>
                                    <select class="select__option" id="status_profile" name="status_profile" placeholder="Status Profile" required>
                                        <option value="<?php echo $statusUser->getCod_estado() ?>"><?php echo $statusUser->getNom_estado() ?></option>
                                    </select>
                                </div>
                                <div class="input__box">
                                    <label>Address <span>*</span></label>
                                    <input type="text" id="address" name="address" value="<?php echo  $codigoUsuarioActual->getDireccion()  ?>" required>
                                    <!--<input type="text" id="typeOfDocument" name="typeOfDocument" value="" required>-->
                                </div>
                                <div class="input__box">
                                    <label>Phone <span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="<?php echo $codigoUsuarioActual->getTelefono(); ?>" required>
                                </div>
                                <div class="form__btn">
                                    <button class="modifyUser">Save</button>
                                </div>
                            </div>


                        </div>
                </div>
                </form>

                <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 2-->



                <!--AQUI COMIENZA FORMULARIO POR CODIGO T DOCUMENTO = 3 -->


            </div>
        </div>
    </div>
    </div>
</section>