<?php
    //$banco = new mysqli(host,usuario,senha,banco); linha de conexão com o BD
    $banco = new mysqli("localhost","root","","bd_yas");

    if($banco->connect_error){
        echo "<p> Encontrei um erro $banco->error --> $banco->connect_error </p>";
        die();
    }

    //Padrao utf-8
    $banco->query("SET NAME 'utf8'");
    $banco->query("SET character_set_conenection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

    /*
        $busca = $banco->query("select projeto.proj_id, user.user_first_name, user.user_last_name, projeto.proj_name, projeto.proj_desc from projeto projeto join user_info user on projeto.user_id=user.user_id;");
        if(!$busca){
            echo "<p> Falha na busca! $banco->error </p>";
        }
        else{
            while( $reg = $busca -> fetch_object() ){
                print_r($reg);
            }
        }
    */

    /*
        $sql="SELECT * FROM projeto WHERE proj_id=1 ";
        $busca = $banco->query("$sql");
        $reg = $busca -> fetch_object();
    */
?>