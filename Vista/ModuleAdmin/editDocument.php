<?php

    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoDocument.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoUser.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoEditorial.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoState.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/negocio/ManejoDocument_Type.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]).'/proyectoLibreria/Persistencia/Util/Conexion.php';

    $obj = new Conexion();
    $conexion = $obj->conectarDB();
  
    ManejoDocument::setConexionBD($conexion);
    ManejoDocument_Type::setConexionBD($conexion);
    ManejoEditorial::setConexionBD($conexion);
    ManejoState::setConexionBD($conexion);
    ManejoUser::setConexionBD($conexion);
    $docType = $_GET['docType'];
    $codDoc = $_GET["codeDoc"];
    $document = ManejoDocument::consult($codDoc);
    $documentType = ManejoDocument_Type::getList();
    $editorials = ManejoEditorial::getList();

    
?>
<section class="p-fixed d-flex text-center">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material"  action="ModuleAdmin/editDoc.php" method="post" name="editDoc">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <?php if($docType==1){?>
                                        <h3 class="text-center txt-primary">Edit Book</h3>
                                        <?php }elseif($docType==2){?>
                                        <h3 class="text-center txt-primary">Edit Article</h3>
                                        <?php }elseif($docType==3){?>
                                            <h3 class="text-center txt-primary">Edit Presentation</h3>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr/>
                                <input id="codBook" name="codBook" type="hidden" value="<?php echo $document->getCod_documento();?>">
                                <input id="docType" name="docType" type="hidden" value="<?php echo $document->getCod_t_documento();?>">
                                <input id="rutaPDF" name="rutaPDF" type="hidden" value="<?php echo $document->getPdf();?>">
                                <div class="input-group">
                                    <input type="text" id="updatedBy" name="updatedBy" class="form-control" value="<?php echo ManejoUser::consultUser($document->getSubido_por())->getNombre();?>" readonly>
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                   
                                    <select name="codEditorial" id="codEditorial" class="form-control" required>
                                        <?php for($i=0;$i<count($editorials);$i++) {?>
                                        <option value="<?php echo $editorials[$i]->getCod_editorial(); ?>" <?php if($document->getCod_estado()==$editorials[$i]->getCod_editorial()){?>selected<?php }?> ><?php echo $editorials[$i]->getNom_editorial(); ?></option>                                         
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" id="codEditorial" name="codEditorial" class="form-control" placeholder="Editorial" value="<?php echo ManejoEditorial::consult($document->getCod_editorial())->getNom_editorial();?>" required>-->
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">                                   
                                    <select name="codTipoDocumento" id="codTipoDocumento" class="form-control" required>
                                        <?php for($i=0;$i<count($documentType);$i++) {?>
                                        <option value="<?php echo $documentType[$i]->getCod_t_documento(); ?>" <?php if($document->getCod_t_documento()==$documentType[$i]->getCod_t_documento()){?>selected<?php }?> ><?php echo $documentType[$i]->getNom_t_documento(); ?></option>                                         
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" id="codEditorial" name="codEditorial" class="form-control" placeholder="Editorial" value="<?php echo ManejoEditorial::consult($document->getCod_editorial())->getNom_editorial();?>" required>-->
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Title"  value="<?php echo $document->getTitulo();?>" required>
                                    <span class="md-line"></span>
                                </div>  
                                <div class="input-group">
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity"  value="<?php echo $document->getCantidad();?>" required>
                                    <span class="md-line"></span>
                                </div> 
                                <div class="input-group">
                                    <input type="text" id="creationDate" name="creationDate" class="form-control" placeholder="Creation Date"  value="<?php echo $document->getFecha_creacion();?>" readonly>
                                    <span class="md-line"></span>
                                </div> 
                                <div class="input-group">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1" <?php if($document->getCod_estado()=="1"){?>selected<?php }?> >Available</option> 
                                        <option value="2"  <?php if($document->getCod_estado()=="2"){?>selected<?php }?>>Unavailable</option>
                                    </select>
                                    <span class="md-line"></span>
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="editDoc" style="background-color: #C0392B; color: #fff;" class="btn btn-md btn-block waves-effect text-center m-b-20">Edit</button>
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
	