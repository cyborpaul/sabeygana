<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sabeygana/app/models/Home/HomeModel.php';
/**
 * Home controller
 */
class HomeController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->nombre = 'Mundo';
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->show();
 
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array('nombre' => $this->nombre);
    $this->render(__CLASS__, $params); 

  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->model->getUser($param);
    $this->nombre = $res['usu_int_id'];
}

  public function user($param){
    $res = $this->model->getUser($param);
    $this->nombre = $res['usu_int_id'];
    $this->nivelactual=$res['last_level'];
    $this->saldo=$res['saldo'];
    $this->ganancia=$res['usu_txt_ganancia'];
    $this->game=$res['usu_txt_estadojuego'];
    $params[] = array(
      'nombre' => $this->nombre,
      'nivel'=> $this->nivelactual,
      'saldo'=> $this->saldo,
      'ganancia'=>$this->ganancia,
      'game'=>$this->game
    );
    header('Content-Type: application/json');
    echo json_encode($params);
  }

  public function level($request_params){
    $id = $request_params['id_jugador'];
    $nivel= $request_params['nivel_jugador'];
    $nivelexitoso=$nivel+1;
    $id_pregunta=$request_params['question'];
    $respuesta=$request_params['answer'];
    $saldo=$request_params['saldo'];

    $res=$this->model->actualizarJugada($request_params);
    $actualizar=$this->model->actualizarJugador($request_params);
    $actualizarmovimiento=$this->model->actualizarMovimiento($request_params);
   
    $info[]=array(
      'id_jugador'=>$id,
      'nivel_actual'=>$nivelexitoso,
      'id_pregunta'=>$id_pregunta,
      'respuesta'=>$respuesta
    );
  }


}