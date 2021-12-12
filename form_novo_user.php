<?php
      include ('layout/header.php');
      //include ('layout/nav2.php');
      include ('layout/footer.php');

?>



<title>Adicionar User</title>
</head>
<body>



<h3 class="text-center" style="margin-top: 100px; color:white">Adicionar User</h3>

<div class="d-flex justify-content-center" style="margin-top: 100px;"> 
    <form action="registar_novo_usuario.php" method="post">
        <p><input type="text" name="txtUser" placeholder="User name" required></p>
        <p><input type="password" name="txtPass" placeholder="Password" required></p>
        <input type="submit" value="Registar" class="btn btn-success ">
        <a href='index.php' class='btn btn-danger ml-4'>VOLTAR</a>
    </form>
</div>
    
<?
