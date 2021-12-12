<?php
   include ('layout/header.php');
   //include ('layout/nav2.php');
   include ('layout/footer.php');
    //SISTEMA DE CRUD

  

    //INCLUIR GESTOR
    include 'gestor.php';
    $gestor = new Gestor();

    //PREPARAR DADOS
    $params = array (
        ':user' => $_POST['txtUser']
    );

    //
    $resultado = $gestor->EXE_QUERY("
    SELECT * FROM users WHERE user = :user 
    ",$params);
    //verificar se existe user com o mesmo nome
    if (count($resultado) != 0){
        //SIM -> apresentar uma msg a indicar que já existe
        //foi encontrado pelo menos 1 registo em que user = user
        echo '<h1 class="text-center" style="margin-top: 200px; color:red; background-color:black">User já registado </br>';
        echo "<a href='index.php' class='btn btn-danger'>VOLTAR</a>";
    } else {
        //NÃO -> guarda novo registo na BD
        //podemos guardar o novo user
            
        //PREPARAR DADOS
        $params = array (
            ':user' => $_POST['txtUser'],
            ':pass' => password_hash( $_POST['txtPass'],PASSWORD_DEFAULT)
        );
        //GUARDAR DADOS
        $gestor->EXE_NON_QUERY("
            INSERT INTO users (user,senha,created_at)
            VALUES (:user,:pass, NOW())
        ",$params);
        
        //APRESENTAR INFORMAÇÃO E LINK PARA VOLTAR AO INDEX.PHP
        echo '<h1 class="text-center" style="margin-top: 200px; color:white">User adicionado com sucesso! </br>';
        echo "<a href='index.php' class='btn btn-danger'>VOLTAR</a>";
    }





