<?php

    session_start();
    //print_r ($_SESSION['user']);
    include ('layout/header.php');
    if (!isset($_SESSION['user'])){
        include ('layout/nav.php');
    }else{
        include ('layout/nav2.php');
    }
    
    include ('layout/footer.php');

    $pag = "inicio";
    


    if (isset($_GET['p'])){/*Se existe a variavel p?, se está definida, isset ($_GET['p']*/
        $pag = $_GET['p']; //superglobal GET, vai buscar todas as var na query string ?p=
    }
    
    //include ($pag. '.php');     //concatenar todas as $pag a .php

// SISTEMA DE ROTEAMENTO /////////////////////////////////////////////////


//COM ESTRUTURA SWITCH CASE

    switch($pag){
        case 'logout':
            session_destroy();
            Header('Location: index.php');
            return;
            break;
        case 'inicio':
            include ('inicio.php');
            break;
        case 'empresa':
            include ('empresa.php');
            break;
        case 'servicos':
            include ('servicos.php');
            break;
        case 'contatos':
            include ('contatos.php');
            break;
        case 'areaReservada':
         
            include ('areaReservada.php');
            break;
        default:
            include ('inicio.php');
            break;
    }
    
  

function verificarLogin(){


    $user = trim($_POST['txtUser']);  //trim para remover espaços a mais 
    $pass = trim($_POST['txtPass']);

    include 'gestor.php';
    $gestor = new Gestor();
    $params = array (
        ':user' => $user
    );
    $resultado = $gestor->EXE_QUERY("
        SELECT * FROM users  
        WHERE user = :user 
    ",$params);

    if (count($resultado) == 0){//user não existe na BD
        //die("login inválido!"); 
        return false;
    } else {                    //user existe pelo menos 1 vez na BD
        $senha_BD = $resultado[0]['senha'];
     
  
        /////////////////////VERIFICAÇÃO DA SENHA////////////////////////////////
        if (password_verify($pass,$senha_BD)){//encripta $pass com HASH e $senha_BD e compara, return de true ou false
            
            $_SESSION['user']=$resultado[0]['user'];
            return true;//SENHA VÁLIDA
        } else {
            
            
            return false;//SENHA INVÁLIDA
        }    

    }

}


?>