<?php
    
    include ('layout/header.php');
    //include ('layout/nav2.php');
    include ('layout/footer.php');

   /////////////////////////////////////incluir o sistema de gestão
   include 'gestor.php';
   $gestor = new Gestor();

   ///////////////////////////////////// buscar dados de users registados
   $utilizadores = $gestor->EXE_QUERY("SELECT * FROM users");
   ///////////////////////////////////// apresentar resultados numa tabela
   
   
   
?>
<div class="container-fluid">
<table border="1" class="table-dark table-bordered table">
   <thead >
       <tr>
           <th>USER</th>
           <th>CRIADO EM:</th>
           <th>AÇÔES</th>
       </tr>
   </thead>
   <tbody  class="text-left">

    <?php foreach($utilizadores as $usuario): ?> 
       <tr>
       <!-- em cada volta do ciclo cada $utilizador passa a ser $usuario  -->
           <td style ="word-break:break-all;"><?php echo ($usuario['user'])?></td>
           <td style ="word-break:break-all;"><?php echo ($usuario['created_at'])?></td>
           <td style ="word-break:break-all;"><a href="editar_user.php?id=<?php echo $usuario['id_user'] ?>" class="btn btn-primary"> Editar </a>
            <a href="eliminar_confirmar.php?id=<?php echo $usuario['id_user'] ?> "class="btn btn-danger"> Eliminar </a></td>
       </tr>
   <?php endforeach; ?>

   </tbody>
</table>

<p>Resultados : <?php echo count($utilizadores) ?></p>
</div>

</div>
</div>