
<?php
session_start();
if(isset($_SESSION['usuario'])){
   
}else{
    echo'<script> 
                alert("debes iniciar sesion para continuar.");
                window.location="./acceso.php";
            </script>';
}

?>

<?php
    require './php/cabecero.php';
    require ("./php/conexioncarrito.php");
  ?>
     
     <?php
     $total=100;
     $sid=session_id();
     $correo=$_SESSION['usuario'];
     $arreglocarrito=$_SESSION['carrito'];
     //$fecha=date('d-m-Y H:i:s');
     global $conexion;
     if($_SESSION['usuario']){
        for ($i=0; $i <count($arreglocarrito) ; $i++) { 
            $total=$total+$arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad'];
        }
        echo"<h6>".$total."</h6>";
     }
    
   $sentencia=$conexion->query("INSERT INTO `ventas` (`clave_transaccion`,`fecha`, `correo`, `total`, `status`) VALUES ( '$sid',NOW(),'$correo','$total', 'pendiente');")or die($conexion->error);

   unset($_SESSION['carrito']);


 ?>


  <?php
    require './php/footer.php';
  ?>