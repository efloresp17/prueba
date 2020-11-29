<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'index') {
        include_once('ModuleAdmin/index.php');
    }
    if ($_GET['menu'] == 'books') {
        include_once('ModuleAdmin/books.php');
    }
    if ($_GET['menu'] == 'articles') {
        include_once('ModuleAdmin/articles.php');
    }
    if ($_GET['menu'] == 'presentations') {
        include_once('ModuleAdmin/presentation.php');
    }
    if ($_GET['menu'] == 'clients') {
        include_once('ModuleAdmin/clients.php');
    }
    if ($_GET['menu'] == 'authors') {
        include_once('ModuleAdmin/authors.php');
    }
    if ($_GET['menu'] == 'editorials') {
        include_once('ModuleAdmin/editorials.php');
    }
    if ($_GET['menu'] == 'administrators') {
        include_once('ModuleAdmin/administrators.php');
    }
    if ($_GET['menu'] == 'readers') {
        include_once('ModuleAdmin/readers.php');
    }
    if ($_GET['menu'] == 'registerUser') {
        include_once('ModuleAdmin/registerUser.php');
    }
    if ($_GET['menu'] == 'editUser') {
        include_once('ModuleAdmin/editUser.php');
    }
    if ($_GET['menu'] == 'editDocument') {
        include_once('ModuleAdmin/editDocument.php');
    }
    if ($_GET['menu'] == 'statisticUserDoc') {
        include_once('ModuleAdmin/statisticUserDoc.php');
    }
    if ($_GET['menu'] == 'statisticUserReservation') {
        include_once('ModuleAdmin/statisticUserReservation.php');
    }
    if ($_GET['menu'] == 'statisticsUserStatus') {
        include_once('ModuleAdmin/statisticUserStatus.php');
    }
    if ($_GET['menu'] == 'statisticDocumentStatus') {
        include_once('ModuleAdmin/statisticDocumentStatus.php');
    }
    if ($_GET['menu'] == 'viewRecord') {
        include_once('ModuleAdmin/viewDocumentRecord.php');
    }
    if ($_GET['menu'] == 'statisticDocumentQuantity') {
        include_once('ModuleAdmin/statisticDocumentQuantity.php');
    }
    
/*    if ($_GET['menu'] == 'Inicio') {
        include_once('ModuloEstudiante/Inicio.php');
    }
    if ($_GET['menu'] == 'InfoVacante') {
        include_once('ModuloEstudiante/InfoVacante.php');
    }
    if ($_GET['menu'] == 'hojaDeVida') {
        include_once('ModuloEstudiante/HojaDeVida.php');
    }

    if ($_GET['menu'] == 'editarHJ') {
        include_once('ModuloEstudiante/EditarHJ.php');
    }

    if ($_GET['menu'] == 'agregarHJ') {
        include_once('ModuloEstudiante/AgregarHJ.php');
    }

    if ($_GET['menu'] == 'editarInformacionEstudiante') {
        include_once('ModuloEstudiante/EditarInformacionEstudiante.php');
    }

    if ($_GET['menu'] == 'crearPDF') {
        include_once('./ModuloEstudiante/prueba.php');
    }
    */
} else {
    include_once('ModuleAdmin/index.php');
}
?>