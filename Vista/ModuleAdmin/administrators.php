<?php

    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/User.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

    $obj = new Conexion();
    $conexion = $obj->conectarDB();
    ManejoUser::setConexionBD($conexion);

    $users = ManejoUser::getUserListByType(3);//3 code for the admins

    
?>
<!-- Basic table card start -->
<div class="card">
<div class="card-header" style="background-color: #C0392B;">
        <h3 style="color: #fff">Administrators Table</h3>
        <!--<span>use class <code>table</code> inside table element</span>-->
        <div class="card-header-right">
             <!--<ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left "></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
            </ul>-->

            <button class="btn hor-grd btn-grd-inverse btn-round dropdown-toggle" type="button" 
            id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
            <div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item waves-light waves-effect" href="exportPDF.php?tipoUsuario=1">PDF</a>
                        <a class="dropdown-item waves-light waves-effect" href="exportExcel.php?tipoUsuario=1">XLS</a>

            </div>
            <a type="button" href="?menu=registerUser&userType=3" class="btn hor-grd btn-grd-inverse btn-round ">Add Administrators</a>
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
                        <?php if($user->getCod_t_usuario()==2){?>
                        <th style="width: 10%;">Actions</th>
                        <?php } ?>
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
                        
                        <?php if($user->getCod_t_usuario()==2){?>
                        <td>
                            <?php if($users[$i]->getEstado()!="3") {?>
                            <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=activated" class="btn btn-success btn-round"  style="color: #fff;"><i class="icofont icofont-check-circled"></i></a>
                            <?php }else{?>
                            <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=desactivated" class="btn btn-danger btn-round" style="color: #fff;"><i class="icofont icofont-not-allowed" ></i></a>
                            <?php }?>
                            <a type="button" href="?menu=editUser&codeUser=<?php echo $users[$i]->getCod_usuario();?>&userType=3" style="color: #fff;" class="btn btn-warning btn-round"><i class="icofont icofont-ui-edit"></i></a>
                            <a type="button" href="ModuleAdmin/actionUser.php?codeUser=<?php echo $users[$i]->getCod_usuario();?>&action=delete" style="color: #fff;" class="btn btn-danger btn-round"><i class="icofont icofont-trash"></i></a>
                        </td>
                        <?php } ?>
                    </tr>

                <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>