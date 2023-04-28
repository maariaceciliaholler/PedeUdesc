<?php
try {
    require_once "src/db/dbConnection.php";
} catch (Exception $e) {
    echo $e->getCode();
}
