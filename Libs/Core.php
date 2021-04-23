<?php


  class Core{

    protected $ctrl = 'Home';
    protected $mtd = 'index';
    protected $prmt = [];

    public function __construct(){
      $url = $this->getUrl();
      //echo json_encode($url);

      //Buscar controlador si existe en Controllers
      if (isset($url[0])) {
        if (file_exists('Controllers/'.ucwords($url[0]).'.php')) {
          $this->ctrl = ucwords($url[0]);


          unset($url[0]);
        }
      }

      //Llamar el controlador
      require_once 'Controllers/'. $this->ctrl .'.php';
      $this->ctrl = new $this->ctrl;

      //Si se pasa un metodo en la Url
      if (isset($url[1])) {
        if (method_exists($this->ctrl, $url[1])) {
          $this->mtd = $url[1];
          unset($url[1]);
        }
      }

      //Si se pasa algun parametro en la url
      $this->prmt = $url ? array_values($url) : [];

      call_user_func_array([$this->ctrl,$this->mtd],$this->prmt);
    }

    public function getUrl(){

      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        //validar Url
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }


  }



 ?>
