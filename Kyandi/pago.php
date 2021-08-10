
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
     if($_SESSION['usuario']){
        for ($i=0; $i <count($arreglocarrito) ; $i++) { 
            $total=$total+$arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad'];
        }
     }
    global $conexion;
   $sentencia=$conexion->query("INSERT INTO `ventas` (`id`,`clave_transaccion`,`fecha`, `correo`, `total`, `status`) VALUES ( NULL,'$sid',NOW(),'$correo','$total', 'pendiente');");//inserta los datos en la tabal ventas

   $idrow=0;//se declara una variable que contendra el ultimo id de nuetsra tabala ventas
   $rs = $conexion->query("SELECT MAX(id) AS id FROM ventas;");//ejecutamos la consulta sql para traer el ultimo resultado de la tabla ventas
   $fila=mysqli_fetch_row($rs);//se convierte la variable $rs en un arreglo
   if ($fila) {
      $idrow = trim($fila[0]);//la variable $idrow cambia su valor de 0 al ultimo id agreagado a la tabla ventas
}
   for ($i=0; $i <count($arreglocarrito) ; $i++) {//atraves de for insertamos uno por uno los productos vendidos del carrito
   $subtotal=$arreglocarrito[$i]['precio']*$arreglocarrito[$i]['cantidad']; 
   $id=$arreglocarrito[$i]['id'];
   $precio=$arreglocarrito[$i]['precio'];
   $cant=$arreglocarrito[$i]['cantidad'];
   $sentencia2=$conexion->query("INSERT INTO `productos_venta`(`id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES ('$idrow','$id','$cant','$precio','$subtotal');")or die($conexion->error);  
   $sentencia3=$conexion->query("UPDATE `productos` SET `inventario`=(`inventario`-$cant) WHERE id=$id;")or die($conexion->error);
        }

   unset($_SESSION['carrito']);//borramos la informacion carrito de la varaibale session 

  
 ?>
 <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

 <div class="jumbotron text-center">
    <h1 class="display-4">¡Ya Casi Son Tuyos!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con paypal la cantidad de: <h4>$ <?php echo number_format($total,2); ?></p></h4>
    <div id="paypal-button-container"></div>

</p>     
 </div>

  <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

        
            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/create/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you

                    // This example reads a v2/checkout/orders capture response, propagated from the server
                    // You could use a different API or structure for your 'orderData'
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart(); // Recoverable state, per:
                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                    }

                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }

        }).render('#paypal-button-container');
    </script>


  <?php
    require './php/footer.php';
  ?>