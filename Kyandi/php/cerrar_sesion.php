<?php
	session_start();
	session_destroy();
	echo'<script>
		alert("¡Hasta pronto!");
		window.location="../index.html";
	</script>';
?>