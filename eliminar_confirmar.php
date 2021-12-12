<?php
    include ('layout/header.php');
    //include ('layout/nav2.php');
    include ('layout/footer.php');
 
    
    //VERIFICAR SE O ID FOI INDICADO
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);#verifica se var existe e se é do tipo int

    if($id == false){
        Header('location:index.php');//CHUTAR PARA CANTO
        //echo 'não existe';
        //die();
    } 


    //$id = $_GET['id'];
    //echo $id;
    // apresentar dados do usuário
    include 'gestor.php';
    $gestor = new Gestor();

    //buscar os dados dos users registados
    $params = array (
        ':id_user' => $id
    );
    $user = $gestor->EXE_QUERY("SELECT * FROM users WHERE id_user = :id_user",$params);

    //VERIFICAR SE EXISTE USER COM O ID INDICATO
    if(count($user)==0){
        Header('location:index.php');//CHUTAR PARA CANTO
    }

?>

<h3 class="text-center" style="margin-top: 100px; color:white">ELIMINAR <strong><?php echo $user[0]['user'] ?></strong> ?</h3>

<div class="d-flex justify-content-center"> 

    <a href="index.php" class="btn btn-danger">NÃO</a> <a href="eliminar_registo.php?id=<?php echo $id ?>" class="btn btn-success ml-4">SIM</a>
</div>