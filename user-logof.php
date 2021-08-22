<?php
    require_once "includes/connection-bd.php";
    require_once "includes/function/function-login.php";

    logout();
    header("Location: index.php");
?>