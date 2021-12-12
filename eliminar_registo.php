<?php
    include ('layout/header.php');
    //include ('layout/nav2.php');
    include ('layout/footer.php');
    $id = $_GET['id'];
    // ELIMINAR REGISTO 
    include 'gestor.php';
    $gestor = new Gestor();

    //buscar os dados dos users registados
    $params = array (
        ':id_user' => $id
    );
    $user = $gestor->EXE_NON_QUERY("DELETE FROM users WHERE id_user = :id_user",$params);
?>

    <h1 class='text-center' style='margin-top: 200px; color:white'>User ELIMINADO com sucesso! </br>
    <a href='index.php' class='btn btn-danger'>VOLTAR</a>
<?php
    //REDIRECIONAR PARA O INDEX
    //sleep(5);
    //header("location: index.php");