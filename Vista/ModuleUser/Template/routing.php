<?php
//session_start();
$var = isset($_GET['menu']) ? $_GET['menu'] : '';

$ar = explode(":", $var);
if ($ar[0] == 'info') {
    $menu = $ar[0];
    $num = $ar[1];
}
if ($ar[0] == 'infoBook') {
    $menu = $ar[0];
    $num = $ar[1];
}

if ($ar[0] == 'infoBookReserved') {
    $menu = $ar[0];
    $num = $ar[1];
}

if ($ar[0] == 'infoArticle') {
    $menu = $ar[0];
    $num = $ar[1];
}
if ($ar[0] == 'infoArticleReserved') {
    $menu = $ar[0];
    $num = $ar[1];
}
if ($ar[0] == 'infoPresentation') {
    $menu = $ar[0];
    $num = $ar[1];
}
if ($ar[0] == 'infoPresentationReserved') {
    $menu = $ar[0];
    $num = $ar[1];
}

if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'MyProfile') {
        include_once('ModuleUser/MyProfile.php');
    }
    if ($_GET['menu'] == 'index') {
        include_once('ModuleUser/index.php');
    }
    if ($_GET['menu'] == 'create') {
        include_once('ModuleUser/create_document.php');
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'info:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/info_document.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoBook:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoBook.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoBookReserved:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoBookReserved.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoArticle:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoArticle.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoArticleReserved:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoArticleReserved.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoPresentation:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoPresentation.php');
        }
    }
    if (isset($num)) {
        if ($_GET['menu'] == 'infoPresentationReserved:' . $num) {
            $_SESSION['codDocumento'] = $num;
            include_once('ModuleUser/infoPresentationReserved.php');
        }
    }
    if ($_GET['menu'] == 'delete') {
        include_once('ModuleUser/delete.php');
    }

    if ($_GET['menu'] == 'deleteBook') {
        include_once('ModuleUser/deleteBook.php');
    }
    if ($_GET['menu'] == 'deleteArticle') {
        include_once('ModuleUser/deleteArticle.php');
    }
    if ($_GET['menu'] == 'deletePresentation') {
        include_once('ModuleUser/deletePresentation.php');
    }

    if ($_GET['menu'] == 'modify') {
        include_once('ModuleUser/modifyDocument.php');
    }
    if ($_GET['menu'] == 'myProfileIndex') {
        include_once('ModuleUser/myProfileIndex.php');
    }
    if ($_GET['menu'] == 'modifyUser') {
        include_once('ModuleUser/modifyUser.php');
    }
    if ($_GET['menu'] == 'myProfileReserved') {
        include_once('ModuleUser/myProfileReserved.php');
    }
} else {
    include_once('ModuleUser/index.php');
}
