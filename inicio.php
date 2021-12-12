<?php
include ('layout/header.php');
$erro = false;
//VERIFICA SE HOUVE SUBMISSÃO DO FORMULÁRIO
   
if ($_SERVER['REQUEST_METHOD']=='POST'){
    //die('formulário submetido!');
    //VOU CRIAR UMA FUNÇÃO PARA USAR PARA VERIFICAR O LOGIN, EM VEZ DE ESCREVER TODO O CÓDIGO AQUI
    if (verificarLogin()){      //função retorna true ou false
        //include ('index.php');    //////////////////true -> login válido
       //Header ('location:index.php');
       $u = 'index.php';
       redirect($u);
    } else {
        $erro = true;                   /////////////////false -> login inválido
    }
}


if (!isset($_SESSION['user'])){  ?>
    
    <div class="d-flex justify-content-center" style="margin-top: 100px;"> 

    <form method="post" action="?p=inicio.php" id="loginForm">

        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" id="user" name="txtUser" placeholder="Enter username">
        </div>

        <div class="form-group">
            <label for="senha">Password</label>
            <input type="password" class="form-control" id="senha" name="txtPass" placeholder="Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success ">Login</button>
            <!-- <button  class="btn btn-danger ml-4">Registo</button> -->
            <!-- <a href='form_novo_user.php' class='btn btn-danger ml-4'>Registo</a> -->
        </div>
        <?php if($erro): ?>

             <div class="alert alert-danger text-center m-3">
                Login Inválido!
            </div> 

        <?php endif;?>


    </form>

</div>


<?php
}else{

    echo "<h1 style='color:white;' class='text-center'>BEM VINDO ".$_SESSION['user']."</h1>";
        }
?>






   
 
 