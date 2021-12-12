<?php
    include ('layout/header.php');
    //include ('layout/nav2.php');
    include ('layout/footer.php');

    //buscar info do post
    $id_user = $_POST['idUser'];
    $user = $_POST['txtUser'];

    //abrir ligação à BD
    include 'gestor.php';
    $gestor = new Gestor();

    //verificar se existe outro user com o mesmo nome
    $params = array(            //= a $params = [];
        ':id' => $id_user,
        ':user'=>$user
    );

    $res = $gestor->EXE_QUERY("
        SELECT user FROM users
        WHERE user = :user AND id_user <> :id 
    ",$params);

    //se já existe apresentar a mensagem de erro
    if (count($res) != 0){
        echo '<h1 class="text-center" style="margin-top: 200px; color:white">User com esse nome já existe! </br>';
        echo "<a href='index.php' class='btn btn-danger'>VOLTAR</a>";
        exit();//para o resto do código não ser lido
    } 

    //se não existe atualiza os dados no user seleccionado
    $gestor->EXE_NON_QUERY("
        UPDATE users SET user = :user,
                         updated_at = NOW()
        WHERE id_user = :id
    ",$params);

    //header("location: index.php");
     //APRESENTAR INFORMAÇÃO E LINK PARA VOLTAR AO INDEX.PHP
     echo "<h1 class='text-center' style='margin-top: 200px; color:white'>User editado com sucesso! </br>";
     echo "<a href='index.php' class='btn btn-danger'>VOLTAR</a>";