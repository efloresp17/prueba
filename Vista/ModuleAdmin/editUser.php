<?php

    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

    $obj = new Conexion();
    $conexion = $obj->conectarDB();
    ManejoUser::setConexionBD($conexion);
    $userType = $_GET['userType'];
    $codUser = $_GET["codeUser"];
    $user = ManejoUser::consultUser($codUser);

    
?>
<section class="p-fixed d-flex text-center">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material"  action="ModuleAdmin/editUsers.php" method="post" name="editUser" id="editUser">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <?php if($userType==1){?>
                                        <h3 class="text-center txt-primary">Edit client</h3>
                                        <?php }elseif($userType==3){?>
                                        <h3 class="text-center txt-primary">Edit administrator</h3>
                                        <?php }elseif($userType==4){?>
                                            <h3 class="text-center txt-primary">Edit reader</h3>
                                        <?php }elseif($userType==5){?>
                                            <h3 class="text-center txt-primary">Edit author</h3>
                                        <?php }elseif($userType==6){?>
                                            <h3 class="text-center txt-primary">Edit editorial</h3>
                                        <?php }?>
                                    </div>
                                </div>
                                <hr/>
                                <input id="codUser" name="codUser" type="hidden" value="<?php echo $user->getCod_usuario();?>">
                                <input id="userType" name="userType" type="hidden" value="<?php echo $user->getCod_t_usuario();?>">
                                <div class="input-group">
                                    <input type="text" id="mail" name="mail" class="form-control" placeholder="Email Address" value="<?php echo $user->getCorreo();?>" readonly required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Choose Password"  value="<?php echo $user->getPassword();?>" required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"  value="<?php echo $user->getNombre();?>" required>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?php $user->getTelefono()?>">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="<?php $user->getDireccion()?>">
                                    <span class="md-line"></span>
                                </div>    
                                <div class="input-group">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="3" <?php if($user->getEstado()=="3"){?>selected<?php }?> >Activated</option> 
                                        <option value="4"  <?php if($user->getEstado()=="4"){?>selected<?php }?>>Desactivated</option>
                                    </select>
                                    <span class="md-line"></span>
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button name="editUser" style="background-color: #C0392B; color: #fff;" class="btn btn-md btn-block waves-effect text-center m-b-20 advertencia2">Edit</button>
                                    </div>
                                </div>
                                <hr/>
                                
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
	