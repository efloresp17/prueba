<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/User.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoLibreria/negocio/ManejoUser.php';

$fecha = date("d-m-Y H:i:s");
$tipo = $_GET["tipoUsuario"];

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUser::setConexionBD($conexion);

// Export for admin table
if ($tipo == 1) {
    $admin = ManejoUser::getUserListByType(3); //3 code for the admins
    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=ExcelAdministrators_$fecha.xls"); //Indica el nombre del archivo resultante
    header("Pragma: no-cache");
    header("Expires: 0");
?>

    <!--<img class="img-fluid" src="master/assets/images/logo.png" alt="Theme-Logo" />-->
    <h3 align="center">Administrator List</h3>
    <table width="50%" border="1" align="center">
        <tr style="background-color: yellowgreen;" align="center">
            <th style="width: 10%;">Code</th>
            <th style="width: 10%;">User type</th>
            <th style="width: 10%;">Email</th>
            <th style="width: 10%;">Name</th>
            <th style="width: 10%;">Status</th>
        </tr>
        <?php
        for ($i = 0; $i < count($admin); $i++) {
        ?>
            <tr>
                <td><?php echo $admin[$i]->getCod_usuario(); ?></td>
                <td>ADMIN</td>
                <td><?php echo $admin[$i]->getCorreo(); ?></td>
                <td><?php echo $admin[$i]->getNombre(); ?></td>
                <td><?php if ($admin[$i]->getEstado() == 1) {
                        echo "WAITING";
                    } elseif ($admin[$i]->getEstado() == 2) {
                        echo "REJECTED";
                    } elseif ($admin[$i]->getEstado() == 3) {
                        echo "ACTIVATED";
                    } elseif ($admin[$i]->getEstado() == 4) {
                        echo "DESACTIVATED";
                    }; ?></td>
            </tr>
        <?php }

// Export for reader table
    } else if ($tipo == 2) {
        $reader = ManejoUser::getUserListByType(4); //4 code for the readers
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ExcelReaders_$fecha.xls"); //Indica el nombre del archivo resultante
        header("Pragma: no-cache");
        header("Expires: 0");
        ?>

        <h3 align="center">Reader List</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: yellowgreen;" align="center">
                <th style="width: 10%;">Code</th>
                <th style="width: 10%;">User type</th>
                <th style="width: 10%;">Email</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 10%;">Status</th>
            </tr>

            <?php
            for ($i = 0; $i < count($reader); $i++) {
            ?>
                <tr>
                    <td><?php echo $reader[$i]->getCod_usuario(); ?></td>
                    <td>READER</td>
                    <td><?php echo $reader[$i]->getCorreo(); ?></td>
                    <td><?php echo $reader[$i]->getNombre(); ?></td>

                    <td><?php if ($reader[$i]->getEstado() == 1) {
                            echo "WAITING";
                        } elseif ($reader[$i]->getEstado() == 2) {
                            echo "REJECTED";
                        } elseif ($reader[$i]->getEstado() == 3) {
                            echo "ACTIVATED";
                        } elseif ($reader[$i]->getEstado() == 4) {
                            echo "DESACTIVATED";
                        }; ?></td>
                </tr>
        <?php }

// Export for clients table
        } else if ($tipo == 3) {
            $client = ManejoUser::getUserListByType(1); //1 code for the clients
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=ExcelClients_$fecha.xls"); //Indica el nombre del archivo resultante
            header("Pragma: no-cache");
            header("Expires: 0");
         ?>
        <h3 align="center">Client List</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: yellowgreen;" align="center">
                <th style="width: 10%;">Code</th>
                <th style="width: 10%;">User type</th>
                <th style="width: 10%;">Email</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 10%;">Status</th>
            </tr>

            <?php
            for ($i = 0; $i < count($client); $i++) {
            ?>
                <tr>
                    <td><?php echo $client[$i]->getCod_usuario(); ?></td>
                    <td>CLIENT</td>
                    <td><?php echo $client[$i]->getCorreo(); ?></td>
                    <td><?php echo $client[$i]->getNombre(); ?></td>

                    <td><?php if ($client[$i]->getEstado() == 1) {
                            echo "WAITING";
                        } elseif ($client[$i]->getEstado() == 2) {
                            echo "REJECTED";
                        } elseif ($client[$i]->getEstado() == 3) {
                            echo "ACTIVATED";
                        } elseif ($client[$i]->getEstado() == 4) {
                            echo "DESACTIVATED";
                        }; ?></td>
                </tr>
        <?php }

// Export for authors table       
        } else if($tipo == 4){
            $author = ManejoUser::getUserListByType(5); //5 code for the authors
            header('Content-type: application/vnd.ms-excel');
            header("Content-Disposition: attachment; filename=ExcelAuthors_$fecha.xls"); //Indica el nombre del archivo resultante
            header("Pragma: no-cache");
            header("Expires: 0");
         ?>
        <h3 align="center">Author List</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: yellowgreen;" align="center">
                <th style="width: 10%;">Code</th>
                <th style="width: 10%;">User type</th>
                <th style="width: 10%;">Email</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 10%;">Status</th>
            </tr>

            <?php
            for ($i = 0; $i < count($author); $i++) {
            ?>
                <tr>
                    <td><?php echo $author[$i]->getCod_usuario(); ?></td>
                    <td>AUTHOR</td>
                    <td><?php echo $author[$i]->getCorreo(); ?></td>
                    <td><?php echo $author[$i]->getNombre(); ?></td>

                    <td><?php if ($author[$i]->getEstado() == 1) {
                            echo "WAITING";
                        } elseif ($author[$i]->getEstado() == 2) {
                            echo "REJECTED";
                        } elseif ($author[$i]->getEstado() == 3) {
                            echo "ACTIVATED";
                        } elseif ($author[$i]->getEstado() == 4) {
                            echo "DESACTIVATED";
                        }; ?></td>
                </tr>
        <?php }

// Export for editorials table     
    }else if($tipo == 5){
        $editorial = ManejoUser::getUserListByType(6); //6 code for the editorials
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ExcelEditorials_$fecha.xls"); //Indica el nombre del archivo resultante
        header("Pragma: no-cache");
        header("Expires: 0");
     ?>
     <h3 align="center">Editorial List</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: yellowgreen;" align="center">
                <th style="width: 10%;">Code</th>
                <th style="width: 10%;">User type</th>
                <th style="width: 10%;">Email</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 10%;">Status</th>
            </tr>

            <?php
            for ($i = 0; $i < count($editorial); $i++) {
            ?>
                <tr>
                    <td><?php echo $editorial[$i]->getCod_usuario(); ?></td>
                    <td>EDITORIAL</td>
                    <td><?php echo $editorial[$i]->getCorreo(); ?></td>
                    <td><?php echo $editorial[$i]->getNombre(); ?></td>

                    <td><?php if ($editorial[$i]->getEstado() == 1) {
                            echo "WAITING";
                        } elseif ($editorial[$i]->getEstado() == 2) {
                            echo "REJECTED";
                        } elseif ($editorial[$i]->getEstado() == 3) {
                            echo "ACTIVATED";
                        } elseif ($editorial[$i]->getEstado() == 4) {
                            echo "DESACTIVATED";
                        }; ?></td>
                </tr>
        <?php } 
    
    }else{
        echo '<script>
        window.location="Admin.php?menu=index";
        </script>';
    }?>

        </table>