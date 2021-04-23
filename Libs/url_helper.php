<?php

//funcion para redirecionar una pagina a otra
function redireccionar($page){
  header('location: ' . RUTA_URL . $page);
}

 ?>
