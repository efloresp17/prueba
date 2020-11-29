<?php

    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

    $obj = new Conexion();
    $conexion = $obj->conectarDB();
    ManejoUser::setConexionBD($conexion);
    $users = ManejoUser::getUserListByType(5);// code for the authors
    
?>
<!-- Basic table card start -->
<div class="card">
<div class="card-header" style="background-color: #C0392B;">

        <h3 style="color: #fff" >Authors Table</h3>
        <!--<span>use class <code>table</code> inside table element</span>-->
        <div class="card-header-right">
            <!--<ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left "></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>

            </ul>-->

            <button class="btn hor-grd btn-grd-inverse btn-round dropdown-toggle" type="button" 
            id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
            <div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item waves-light waves-effect" href="exportPDF.php?tipoUsuario=4">PDF</a>
                        <a class="dropdown-item waves-light waves-effect" href="exportExcel.php?tipoUsuario=4">XLS</a>

            </div>
            <a type="button" href="?menu=registerUser&userType=5" class="btn hor-grd btn-grd-inverse btn-round ">Add Author</a>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th style="width: 10%;">User code</th>
                        <th style="width: 20%;">Email</th>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 20%;">Address</th>
                        <th style="width: 10%;">Telephone</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i <count($users) ; $i++) { 
                    ?>
                <tr>    
                        <td><?php echo $users[$i]->getCod_usuario();?></td>
                        <td><?php echo $users[$i]->getCorreo();?></td>
                        <td><?php echo $users[$i]->getNombre();?></td>
                        <td><?php echo $users[$i]->getDireccion();?></td>
                        <td><?php echo $users[$i]->getTelefono();?></td>
                        <td><?php if($users[$i]->getEstado()==1){echo "WAITING";}elseif($users[$i]->getEstado()==2){echo "REJECTED";}elseif($users[$i]->getEstado()==3){echo "ACTIVATED";}elseif($users[$i]->getEstado()==4){echo "DESACTIVATED";};?></td>
                        <td>
                            <?php if($users[$i]->getEstado()=="2"){
                                       echo "usuario rechazado"   ;                         
                            }elseif($users[$i]->getEstado()=="1"){?>
                            <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=authorized" class="btn btn-success btn-round"  style="color: #fff;"><i class="icofont icofont-check-circled"></i>Authorized</a>
                            <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=rejected" class="btn btn-danger btn-round"><i class="icofont icofont-not-allowed"></i>Reject</a>
                            <?php }else{
                                if($users[$i]->getEstado()!="3") {?>
                                <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=activated" class="btn btn-success btn-round"  style="color: #fff;"><i class="icofont icofont-check-circled"></i>Enable</a>
                                <?php }else{?>
                                <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=desactivated" class="btn btn-danger btn-round" style="color: #fff;"><i class="icofont icofont-not-allowed" ></i>Disable</a>
                                <?php }?>
                                <a type="button" href="?menu=editUser&codeUser=<?php echo $users[$i]->getCod_usuario();?>&userType=5" style="color: #fff;" class="btn btn-warning btn-round"><i class="icofont icofont-ui-edit"></i>Edit</a>
                                <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=delete" style="color: #fff;" class="btn btn-danger btn-round"><i class="icofont icofont-trash"></i>Delete</a>
                        
                            <?php }?>
                        </td>
                </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>