<?php
try {
    require_once "src/lib/libDatabase.php";

    require_once "src/view/Login.html";
} catch (Exception $e) {
    echo $e->getCode();
}
