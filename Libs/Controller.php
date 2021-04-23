<?php

//Controlador Principal
class Controller{

  //En el caso de ejecutar o llamar un modelo
  public function model($model){
    require_once 'Models/'.$model.'.php';
    return new $model();
  }

  //En el caso de ejecutar o llamar una vista con datos
  public function view($view, $data = []){
    //Comprobar si la pagina o vista, solicitada exista
    if (file_exists('Views/'.$view.'.php')) {
      require_once 'Views/'.$view.'.php';
    }else {
      die('No existe esta Pagina');
    }
  }
}


 ?>
