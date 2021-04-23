<?php

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json");

//Clase para conectarse a una base de datos Mysql
class Conexion{

  public $conexion = null;

  function __construct(){
    $this->connect();
  }

  function connect(){

      $conexion = mysqli_connect(BD_HOST,BD_USER,BD_PASS,BD_NAME,BD_PORT) or die(mysqli_connect_error());

  return $conexion;
  }

  //Funcion para desconectar una conexion existente
  function disconnect($conex){
    mysqli_close($conex);
  }

  //Funcion para traer todos la informacion de la base de datos
  public function readAll($con){
    $respuesta = array();

    //Consulta
    $sql =
    "SELECT a.animal_Id, a.animal_Name, a.animal_Sex, a.animal_Color, a.animal_Bdate, a.animal_Adate,
     te.name_Especie, tr.name_Raza, cr.crias_Num, c.cuidador_Name FROM b1umai1dzddw6qfxqms7.cuidador_animales as ca
    INNER JOIN b1umai1dzddw6qfxqms7.animales as a
    ON ca.animal_Id = a.animal_Id
    INNER JOIN b1umai1dzddw6qfxqms7.tipo_especie as te
    ON a.cod_Especie = te.cod_Especie
    INNER JOIN b1umai1dzddw6qfxqms7.tipo_raza as tr
    ON a.cod_Raza = tr.cod_Raza
    INNER JOIN b1umai1dzddw6qfxqms7.cuidador as c
    ON ca.cuidador_Id = c.cuidador_Id
    INNER JOIN b1umai1dzddw6qfxqms7.crias as cr
    ON a.crias_Id = cr.crias_Id;";

    // Ejecutar consulta
    $resultado = mysqli_query($con,$sql) or die(mysqli_connect_error());

    //El caso resultado tiene un valor verdadero o mayor a 0
    if (mysqli_num_rows($resultado) > 0) {

      $respuesta["Datos"] = array();

      while ($row = mysqli_fetch_array($resultado)) {

          $datos = array();
          $datos["id"] = $row["animal_Id"];
          $datos["name"] = $row["animal_Name"];
          $datos["sex"] = $row["animal_Sex"];
          $datos["color"] = $row["animal_Color"];
          $datos["bdate"] = $row["animal_Bdate"];
          $datos["adate"] = $row["animal_Adate"];
          $datos["especie"] = $row["name_Especie"];
          $datos["raza"] = $row["name_Raza"];
          $datos["crias"] = $row["crias_Num"];
          $datos["cuidador"] = $row["cuidador_Name"];

          //Asignarle datos al array creado
          array_push($respuesta["Datos"], $datos);

      }
      $respuesta["success"] = 1;
      //echo json_encode($respuesta);
    }else {
      $respuesta["success"] = 0;
      $respuesta["message"] = "No se encontran datos";
      //echo json_encode($respuesta);
    }
    return $respuesta;
  }

  //Funcion para insertar datos a la tabla animales
  public function insertAnimal($datos, $con){

    //Asignacion de datos
    $name = $datos['name'];
    $sex = $datos['sex'];
    $color = $datos['color'];
    $bdate = $datos['bdate'];
    $adate = $datos['adate'];
    $especie = $datos['especie'];
    $raza = $datos['raza'];
    $crias = $datos['crias'];
    $cuidador = $datos['cuidador'];

    //consulta
    $sql0 = "INSERT INTO `b1umai1dzddw6qfxqms7`.`crias` (`crias_Id`, `crias_Num`) VALUES (NULL, '$crias');";

    //Ejecutar consulta
    $resultado0 = mysqli_query($con,$sql0) or die(mysqli_connect_error());

    //Si el valor del resultado es verdadero, realizar la siguiente instruccion
    if ($resultado0) {

      $tabla = array();

      $sql1 = "SELECT * FROM b1umai1dzddw6qfxqms7.crias;";

      $resultado1 = mysqli_query($con,$sql1) or die(mysqli_connect_error());

      if (mysqli_num_rows($resultado1)>0) {
          $tabla['Datos'] = array();
        while ($row0 = mysqli_fetch_array($resultado1)) {

          $dcria = array();
          $dcria["id"] = $row0["crias_Id"];
          $dcria["num"] = $row0["crias_Num"];

          array_push($tabla['Datos'], $dcria);
        }
      }

      if ($resultado1) {
        $criasid = '';

        foreach ($tabla['Datos'] as $value) {
          $criasid = $value['id'];
        }

        $sql = "INSERT INTO `b1umai1dzddw6qfxqms7`.`animales` (`animal_Id`, `animal_Name`, `animal_Sex`,
          `animal_Bdate`, `animal_Adate`, `animal_Color`, `cod_Especie`, `cod_Raza`, `crias_Id`)
          VALUES (NULL, '$name', '$sex', '$bdate', '$adate', '$color', '$especie', '$raza','$criasid');";

        $resultado = mysqli_query($con,$sql) or die(mysqli_connect_error());

        if ($resultado) {

          $relacion = array();

          $sql2 = "SELECT a.animal_Id, a.animal_Bdate FROM b1umai1dzddw6qfxqms7.animales as a;";

          $resultado2 = mysqli_query($con,$sql2) or die(mysqli_connect_error());

          if (mysqli_num_rows($resultado2)>0) {

            $relacion['Relacion'] = array();

            while ($row = mysqli_fetch_array($resultado2)) {

              $info = array();
              $info["id"] = $row["animal_Id"];
              $info["fecha"] = $row["animal_Bdate"];

              array_push($relacion['Relacion'], $info);
            }
              $relacion["success"] = 1;
              //echo json_encode($relacion);
            }else {
              $relacion["success"] = 0;
              //echo json_encode($relacion);
            }

          if ($resultado2) {

            foreach ($relacion['Relacion'] as $key) {
              if ($key['fecha'] == $bdate) {
                $idanimal = $key['id'];
              }else {
                $idanimal = '2001';
              }
            }

            $sql3 = "INSERT INTO `b1umai1dzddw6qfxqms7`.`cuidador_animales` (`Id`, `cuidador_Id`, `animal_Id`, `date_assign`)
            VALUES (NULL, '$cuidador', '$idanimal', '2020-11-29');";

            $resultado3 = mysqli_query($con,$sql3);

            if ($resultado3) {
              return true;
            }else {
              return false;
            }
          }else {
            return false;
          }
        }else {
          return false;
        }
      }else {
        return false;
      }
    }else {
      return false;
    }

  }

  public function readCuidador($con){

    $respuesta = array();

    $sql = "SELECT * FROM b1umai1dzddw6qfxqms7.cuidador;";

    $resultado = mysqli_query($con,$sql);

    if (mysqli_num_rows($resultado) > 0) {

      while ($row = mysqli_fetch_array($resultado)) {

        $datos = array();
        $datos['id'] = $row['cuidador_Id'];
        $datos['name'] = $row['cuidador_Name'];
        $datos['age'] = $row['cuidador_Age'];
        $datos['adate'] = $row['cuidador_Adate'];


        array_push($respuesta, $datos);
      }
    }else {
    }
    return $respuesta;
  }

  public function readEspecie($con){

    $respuesta = array();

    $sql = "SELECT * FROM b1umai1dzddw6qfxqms7.tipo_especie;";

    $resultado = mysqli_query($con,$sql);

    if (mysqli_num_rows($resultado) > 0) {

      while ($row = mysqli_fetch_array($resultado)) {

        $datos = array();
        $datos['id'] = $row['cod_Especie'];
        $datos['name'] = $row['name_Especie'];


        array_push($respuesta, $datos);
      }
    }else {
    }
    return $respuesta;
  }

  public function readRaza($con){

    $respuesta = array();

    $sql = "SELECT * FROM b1umai1dzddw6qfxqms7.tipo_raza;";

    $resultado = mysqli_query($con,$sql);

    if (mysqli_num_rows($resultado) > 0) {

      while ($row = mysqli_fetch_array($resultado)) {

        $datos = array();
        $datos['id'] = $row['cod_Raza'];
        $datos['name'] = $row['name_Raza'];


        array_push($respuesta, $datos);
      }
    }else {
    }
    return $respuesta;
  }

  public function updatedAnimal($datos, $con){

    $id = $datos['id'];
    $name = $datos['name'];
    $sex = $datos['sex'];
    $color = $datos['color'];
    $bdate = $datos['bdate'];
    $adate = $datos['adate'];
    $especie = $datos['especie'];
    $raza = $datos['raza'];

    $sql = "UPDATE `b1umai1dzddw6qfxqms7`.`animales` SET `animal_Name` = '$name', `animal_Sex` = '$sex',
     `animal_Color` = '$color', `animal_Bdate` = '$bdate', `animal_Adate` = '$adate', `cod_Especie` = '$especie',
     `cod_Raza` = '$raza' WHERE (`animal_Id` = '$id');";

    $resultado = mysqli_query($con,$sql);

    if ($resultado) {
      return true;
    }else {
      return false;
    }
  }

  public function readAnimal($id, $con){

    $respuesta = array();

    $sql = "SELECT * FROM b1umai1dzddw6qfxqms7.animales as a WHERE a.animal_Id = '$id';";

    $resultado = mysqli_query($con,$sql);

    if (mysqli_num_rows($resultado) > 0) {

      while ($row = mysqli_fetch_array($resultado)) {

        $respuesta['id'] = $row['animal_Id'];
        $respuesta['name'] = $row['animal_Name'];
        $respuesta['sex'] = $row['animal_Sex'];
        $respuesta['color'] = $row['animal_Color'];
        $respuesta['bdate'] = $row['animal_Bdate'];
        $respuesta['adate'] = $row['animal_Adate'];

      }
    }else {
    }
    return $respuesta;
  }

  public function delAnimal($id,$con){

    $sql = "DELETE FROM `b1umai1dzddw6qfxqms7`.`cuidador_animales` WHERE (`animal_Id` = '$id');";

    $resultado = mysqli_query($con,$sql);

    if ($resultado) {

      $sql1 = "DELETE FROM `b1umai1dzddw6qfxqms7`.`animales` WHERE (`animal_Id` = '$id');";

      $resultado1 = mysqli_query($con,$sql1);

      if ($resultado1) {
        return true;
      }else {
        return false;
      }
    }else {
      return false;
    }
  }

}
?>
