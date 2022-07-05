<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class HomeModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUser($id)
  {
    return $this->db->query("SELECT * FROM `sanmarcos_usuarios` WHERE usu_int_id = $id")->fetch_array(MYSQLI_ASSOC);
  }
  public function getPreguntas($id){
    return $this->db->query("SELECT * FROM inventalogame_prueba WHERE niv_int_id='1' ORDER BY rand() LIMIT 3 ")->fetch_array(MYSQLI_ASSOC);
  }
  public function actualizarJugador($request_params){
    $id = $request_params['id_jugador'];
    $nivel= $request_params['nivel_jugador'];
    $nivelexitoso=$nivel+1;
    $salfi=$request_params['saldo'];
    $ganancia=$request_params['ganancia'];
    $saldo=$salfi;
    return $this->db->query("UPDATE `sanmarcos_usuarios` SET `last_level` = '$nivelexitoso', saldo='$saldo', usu_txt_ganancia='$ganancia' WHERE `usu_int_id` = '$id'");
  }
  
  public function actualizarJugada($request_params){
    $id = $request_params['id_jugador'];
    $nivel= $request_params['nivel_jugador'];
    $nivelexitoso=$nivel+1;
    $recurso=1;
    $id_pregunta=$request_params['question'];
    $respuesta=$request_params['answer'];
    $activation=1;
    $resultado=1;
    $date=date("j, n, Y");
    $time=date("H:i:s");
    $completetime=date("Y-m-d H:i:s");
    $equipo="Samsumg";  
    return $this->db->query("INSERT INTO `jugadas`(`jug_int_dni`, `jug_int_nivel`, `jug_int_recurso`, `pre_int_id`, `pre_varchar_respuesta`, `jug_varchar_activation`, `jug_varchar_resultado`, `jug_varchar_date`, `jug_varchar_time`, `jug_date_completime`, `jug_varchar_equipo`) VALUES ('$id','$nivel','$recurso','$id_pregunta','$respuesta','$activation','$resultado','$date','$time','$completetime', '$equipo')");
    
  }


}