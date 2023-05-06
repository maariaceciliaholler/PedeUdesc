
<script type="text/javascript" src="src/view/js/custom.js"></script>

<link rel="stylesheet" href="src/view/css/animate.min.css" />
<link rel="stylesheet" href="src/view/css/bootstrap-grid.css.map" />
<link rel="stylesheet" href="src/view/css/bootstrap-grid.min.css" />
<link rel="stylesheet" href="src/view/css/bootstrap-grid.min.css.map" />
<link rel="stylesheet" href="src/view/css/bootstrap-reboot.css" />
<link rel="stylesheet" href="src/view/css/bootstrap-reboot.css.map" />
<link rel="stylesheet" href="src/view/css/bootstrap-reboot.min.css" />
<link rel="stylesheet" href="src/view/css/bootstrap-reboot.min.css.map" />
<link rel="stylesheet" href="src/view/css/bootstrap.css" />
<link rel="stylesheet" href="src/view/css/bootstrap.css.map" />
<link rel="stylesheet" href="src/view/css/bootstrap.min.css" />
<link rel="stylesheet" href="src/view/css/bootstrap.min.css.map" />
<link rel="stylesheet" href="src/view/css/default-skin.css" />
<link rel="stylesheet" href="src/view/css/font-awesome.min.css" />
<link rel="stylesheet" href="src/view/css/icomoon.css" />
<link rel="stylesheet" href="src/view/css/jquery-ui.css" />
<link rel="stylesheet" href="src/view/css/jquery.fancybox.min.css" />
<link rel="stylesheet" href="src/view/css/jquery.mCustomScrollbar.min.css" />
<link rel="stylesheet" href="src/view/css/meanmenu.css" />
<link rel="stylesheet" href="src/view/css/nice-select.css" />
<link rel="stylesheet" href="src/view/css/owl.carousel.min.css" />
<link rel="stylesheet" href="src/view/css/normalize.css" />
<link rel="stylesheet" href="src/view/css/responsive.css" />
<link rel="stylesheet" href="src/view/css/slick.css" />
<link rel="stylesheet" href="src/view/css/style.css" />

<?php

    //requiires importantes
    require_once "src/lib/libDatabase.php";

    //require teste
    require_once "src/model/Product.php";

    require_once "src/view/Login.php";

    $teste = Product::listProducts("","");

?>
