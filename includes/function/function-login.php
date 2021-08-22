<?php

    session_start();

    if(!isset($_SESSION['id'])){
        $_SESSION['id']="";
        $_SESSION['email']="";
    }

    function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['email']);
    }

    function is_logado(){
        if(empty($_SESSION['id'])){
            return false;
        }
        else{
            return true;
        }
    }

?>
