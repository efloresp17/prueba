<?php

    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/Document.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoDocument.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoEditorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoState.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

    $obj = new Conexion();
    $conexion = $obj->conectarDB();
    ManejoDocument::setConexionBD($conexion);
    ManejoUser::setConexionBD($conexion);
    ManejoEditorial::setConexionBD($conexion);
    ManejoState::setConexionBD($conexion);
    $books = ManejoDocument::getBookList();

    
?>

<!-- Basic table card start -->
<div class="card">
<div class="card-header" style="background-color: #C0392B">
        <h3 style="color: #fff">Books Table</h3>
        <!--<span>use class <code>table</code> inside table element</span>-->
        
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th style="width: 5%;">Code</th>
                        <th style="width: 15%;">Upload by</th>
                        <th style="width: 10%;">Editorial</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 5%;">Quantity</th>
                        <th style="width: 15%;">Title</th>
                        <th style="width: 10%;">Creation date</th>
                        <th style="width: 10%;">View</th>
                        <th style="width: 10%;">Records</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i=0; $i <count($books) ; $i++) { 
                    if($user->getCod_t_usuario()!=4){
                    ?>
                    <tr> 
                        <td><?php echo $books[$i]->getCod_documento();?></td>
                        <td><?php echo ManejoUser::consultUser($books[$i]->getsubido_por())->getNombre()  ;?></td>
                        <td><?php echo ManejoEditorial::consult($books[$i]->getcod_editorial())->getNom_editorial();?></td>
                        <td><?php echo ManejoState::consult($books[$i]->getcod_estado())->getNom_estado();?></td>
                        <td><?php echo $books[$i]->getcantidad();?></td>
                        <td><?php echo $books[$i]->gettitulo();?></td>
                        <td><?php echo $books[$i]->getfecha_creacion();?></td>
                        <td><a href="#" target="_blank">Book</a></td>
                        <td><a href="?menu=viewRecord&codeDoc=<?php echo $books[$i]->getCod_documento();?>">View record</a></td>
                        <td>
                        <?php if($books[$i]->getcod_estado()=="4"){
                                       echo "Document rejected"   ;                         
                            }elseif($books[$i]->getcod_estado()=="3"){?>
                                            <div class="content">
                                                <div class="header">
                                                    <h2>Authorize confirmation</h2>
                                                    <label for="click" class="fas fa-times"></label>
                                                </div>
                                                <label for="click" class="fas fa-check"></label>
                                                <form action="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=authorized" method="post" id="modal">
                                                <p class="ml-3"> Write something great for the user!</p>
                                                <input type="text" class="form-control"></input>
                                                <div class="line"></div>
                                                <button type="submit" class="btn btn-success" style="position: absolute;bottom: 12px;right: 100px;"><i class="icofont icofont-check-circled"></i>Authorized</button>
                                                </form>
                                                <label for="click" class="close-btn">Cancel</label>
                                            </div>

                                            <input type="checkbox" id="click2"><label for="click2" class="btn btn-danger btn-round"><i class="icofont icofont-not-allowed"></i>Reject</a></label>
                                            <div class="content2">
                                                <div class="header2">
                                                    <h2>Reject confirmation</h2>
                                                    <label for="click2" class="fas fa-times"></label>
                                                </div>
                                                <label for="click2" class="fas fa-ban"></label>
                                                <form action="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=rejected" method="post" id="modal">
                                                <p class="ml-3">Write why the document has been rejected</p>
                                                <input type="text"class="form-control" name="mensaje" id="mensaje"></input>
                                                <div class="line"></div>
                                                <button type="submit" class="btn btn-danger" style="position: absolute;bottom: 12px;right: 100px;"><i class="icofont icofont-not-allowed"></i>Reject</button>
                                                </form>
                                                <label for="click2" class="close-btn2">Cancel</label>
                                            </div>
                            <?php }else{
                                 if($books[$i]->getcod_estado()==2) {?>
                                <a type="button" href="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=activated" class="btn btn-success btn-round"  style="color: #fff;"><i class="icofont icofont-check-circled"></i>Enable</a>
                            <?php }else {?>
                                <a type="button" href="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=desactivated" class="btn btn-danger btn-round" style="color: #fff;"><i class="icofont icofont-not-allowed" ></i>Disable</a>
                            <?php }?>
                            <a type="button" href="?menu=editDocument&codeDoc=<?php echo $books[$i]->getCod_documento();?>&docType=1" style="color: #fff;" class="btn btn-warning btn-round"><i class="icofont icofont-ui-edit"></i>Edit</a>
                            <a type="button" href="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=delete" style="color: #fff;" class="btn btn-danger btn-round"><i class="icofont icofont-trash"></i>Delete</a>
                        
                            <?php }?>
                        </td>
                    </tr>
                <?php }elseif($books[$i]->getcod_estado()==3){ ?>

                    <tr> 
                        <td><?php echo $books[$i]->getCod_documento();?></td>
                        <td><?php echo ManejoUser::consultUser($books[$i]->getsubido_por())->getNombre()  ;?></td>
                        <td><?php echo ManejoEditorial::consult($books[$i]->getcod_editorial())->getNom_editorial();?></td>
                        <td><?php echo ManejoState::consult($books[$i]->getcod_estado())->getNom_estado();?></td>
                        <td><?php echo $books[$i]->getcantidad();?></td>
                        <td><?php echo $books[$i]->gettitulo();?></td>
                        <td><?php echo $books[$i]->getfecha_creacion();?></td>
                        <td><a href="#" target="_blank">Book</a></td>
                        <td>
                        <?php if($books[$i]->getcod_estado()=="4"){
                                       echo "Document rejected"   ;                         
                            }elseif($books[$i]->getcod_estado()=="3"){?>
                                            <div class="content">
                                                <div class="header">
                                                    <h2>Authorize confirmation</h2>
                                                    <label for="click" class="fas fa-times"></label>
                                                </div>
                                                <label for="click" class="fas fa-check"></label>
                                                <form action="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=authorized" method="post" id="modal">
                                                <p class="ml-3"> Write something great for the user!</p>
                                                <input type="text" class="form-control"></input>
                                                <div class="line"></div>
                                                <button type="submit" class="btn btn-success" style="position: absolute;bottom: 12px;right: 100px;"><i class="icofont icofont-check-circled"></i>Authorized</button>
                                                </form>
                                                <label for="click" class="close-btn">Cancel</label>
                                            </div>

                                            <input type="checkbox" id="click2"><label for="click2" class="btn btn-danger btn-round"><i class="icofont icofont-not-allowed"></i>Reject</a></label>
                                            <div class="content2">
                                                <div class="header2">
                                                    <h2>Reject confirmation</h2>
                                                    <label for="click2" class="fas fa-times"></label>
                                                </div>
                                                <label for="click2" class="fas fa-ban"></label>
                                                <form action="ModuleAdmin/actionDocument.php?codeDoc=<?php echo $books[$i]->getCod_documento();?>&action=rejected" method="post" id="modal">
                                                <p class="ml-3">Write why the document has been rejected</p>
                                                <input type="text"class="form-control" name="mensaje" id="mensaje"></input>
                                                <div class="line"></div>
                                                <button type="submit" class="btn btn-danger" style="position: absolute;bottom: 12px;right: 100px;"><i class="icofont icofont-not-allowed"></i>Reject</button>
                                                </form>
                                                <label for="click2" class="close-btn2">Cancel</label>
                                            </div>
                            <?php }?>
                        </td>
                    </tr>

                    <?php   
                }
            
            } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>