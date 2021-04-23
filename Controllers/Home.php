<?php

//Controlador Principal de la pagina HOME
class Home extends Controller{

    function __construct(){
      //Llamar Modelo
      $this->datosmodelo = $this->model('Model');
    }

    //Funcion Principal
    function index(){
      $data = $this->datosmodelo->getAllDatas();

      //echo json_encode($data);

      $this->view('index', $data);
    }

    //Funcion para editar formularios.
    function edit($id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Guardar datos del formulario que se recogio con el metodo http:POST en un Array
        $info = [
            'id' => $id,
            'name' => trim($_POST['name']),
            'sex' => trim($_POST['sex']),
            'color' => trim($_POST['color']),
            'bdate' => trim($_POST['bdate']),
            'adate' => trim($_POST['adate']),
            'especie' => trim($_POST['especie']),
            'raza' => trim($_POST['raza'])
        ];

        //Llamar una funcion del modelo
        //comprobar si el valor retornado por la funcion es verdadera
        if ($this->datosmodelo->putAnimal($info)) {
        //redirecionar a la pagina principal
         redireccionar('Home');
       }else {
         //Reportar fallo si el valor retornado de la funcion llamada es falsa
         die('Algo anda mal');
       }
     }else {

       //Llamar otras funciones del modelo para optener sus datos correspondientes
       $dato = $this->datosmodelo->getAnimal($id);
       $esp = $this->datosmodelo->getEspecie();
       $raz = $this->datosmodelo->getRaza();

       //array con datos asignados de las funciones anteriores
       $data = [
           'id' => $dato['id'],
           'name' => $dato['name'],
           'sex' => $dato['sex'],
           'color' => $dato['color'],
           'bdate' => $dato['bdate'],
           'adate' => $dato['adate'],
           'Especie' => $esp,
           'Raza' => $raz
       ];
       //Ejecutar vista
       $this->view('edit',$data);
     }
    }

    //funcioan para asignar nuevos valores a la base de datos
    function add(){
      $cui = $this->datosmodelo->getCuidador();
      $esp = $this->datosmodelo->getEspecie();
      $raz = $this->datosmodelo->getRaza();

      $data = [
        'Cuidador' => $cui,
        'Especie' => $esp,
        'Raza' => $raz
      ];

      //echo json_encode($data);

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $datos = [
            'name' => trim($_POST['name']),
            'sex' => trim($_POST['sex']),
            'color' => trim($_POST['color']),
            'bdate' => trim($_POST['bdate']),
            'adate' => trim($_POST['adate']),
            'especie' => trim($_POST['especie']),
            'raza' => trim($_POST['raza']),
            'crias' => trim($_POST['crias']),
            'cuidador' => trim($_POST['cuidador'])
        ];

        if ($this->datosmodelo->addAnimal($datos)) {
         redireccionar('Home');
         echo json_encode($datos);
       }else {
         die('Algo anda mal');
       }
     }else {

       $datos = [
           'name' => '',
           'sex' => '',
           'color' => '',
           'bdate' => '',
           'adate' => '',
           'especie' => '',
           'raza' => '',
           'crias' => '',
           'cuidador' => ''
       ];

       $this->view('add', $data);
     }
    }

    //Funcion para eliminar datos
    function delect($id){

      if ($this->datosmodelo->deleteAnimal($id)) {
       redireccionar('Home');
     }else {
       die('Algo anda mal');
     }
    }

}


 ?>
