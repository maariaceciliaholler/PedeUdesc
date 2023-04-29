<?php
try {
    require_once "src/db/libDatabase.php";
} catch (Exception $e) {
    echo $e->getCode();
}
