
<?php
session_start();
if(isset($_SESSION['usuario'])){
   

?>

<?php
    require './php/cabecero.php';
    require ("./php/conexioncarrito.php");
  ?>
     
     
 <?php

$total=$_GET['cant'];


 ?>
<body>
    <script src="https://www.paypal.com/sdk/js?client-id=AUdUvm4sXbytODnMIjwmgAEDMpBc-Md15uidibJ6r0ttTOxKuk1k4tLwm86Yvfe-gQBzquxzJ1zyAAjF&currency=MXN"></script>
 <div class="jumbotron text-center">
    <h1 class="display-4">¡Ya Casi Son Tuyos!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con paypal la cantidad de: <h4>$ <?php echo number_format($total,2); ?></p></h4>
   <div id="paypal-button-container"></div>


</p>     
 </div>

    <script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo($total); ?>' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                 location.href='./aceptado.php?payment='+transaction.id;
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
             //actions.redirect('aceptado.php');
          });
        }
      }).render('#paypal-button-container');

    </script>
</body>
 <?php
}else{
    echo'<script> 
                alert("debes iniciar sesion para continuar.");
                window.location="./acceso.php";
            </script>';
}



 ?>


    <!-- Set up a container element for the button -->


  <?php
    require './php/footer.php';
  ?>