<?php

//Modelo Principal
class Model{

  public $db;

  public function __construct(){
    $this->db = new Conexion();

  }

  public function getAllDatas(){

    $con = $this->db->connect();
    $resultado = $this->db->readAll($con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function addAnimal($data){

    $con = $this->db->connect();
    $resultado = $this->db->insertAnimal($data, $con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function getCuidador(){

    $con = $this->db->connect();
    $resultado = $this->db->readCuidador($con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function getEspecie(){

    $con = $this->db->connect();
    $resultado = $this->db->readEspecie($con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function getRaza(){

    $con = $this->db->connect();
    $resultado = $this->db->readRaza($con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function putAnimal($datos){

    $con = $this->db->connect();
    $resultado = $this->db->updatedAnimal($datos,$con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function getAnimal($id){

    $con = $this->db->connect();
    $resultado = $this->db->readAnimal($id,$con);
    $this->db->disconnect($con);
    return $resultado;
  }

  public function deleteAnimal($id){

    $con = $this->db->connect();
    $resultado = $this->db->delAnimal($id,$con);
    $this->db->disconnect($con);
    return $resultado;
  }



}

 ?>
