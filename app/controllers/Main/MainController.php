<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';

/** 
* Main controller
*/
class MainController extends Controller
{
  private $session;

  public function __construct()
  {
    $this->model = new HomeModel();
    $this->session = new Session(); 
    $this->session->init();
    if($this->session->getStatus() === 1| empty($this->session->get('email')))
      exit('Acceso denegado');
  }

  public function exec()
  {
    $params = array(
      'email' => $this->session->get('email'),
      'nombre'=> $this->session->get('nombre'),
      'usuario'=>$this->session->get('usuario'),
      'level'=>$this->session->get('level')
    );
    $this->render(__CLASS__, $params);
  }

  public function logout()
  {
    $this->session->close();
    header('location: /sabeygana/Login');
  }

  public function showquestion(){
    $params[] = array(
      'pregunta' => $this->question,
      'optiona'=>$this->optiona,
      'optionb'=>$this->optionb,
      'optionc'=>$this->optionc,
      'optiond'=>$this->optiond,
      'optione'=>$this->optione,
      'ontiy'=>$this->ontiy

    );
    header('Content-Type: application/json');
    echo json_encode($params);

  }
  public function question($param)
  {
    $res = $this->model->getPreguntas($param);
    $key= "qwertyuiopasdfghjklñzxcvbnm";
    $pregunta = '';
    $nombre = base64_decode($res['pre_txt_preguntas']);
    for($i=0; $i<strlen($nombre); $i++) {
       $char = substr($nombre, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)-ord($keychar));
       $pregunta.=$char;
    }
    $respuesta='';
    $pass = base64_decode($res['pre_varchar_respuesta']);
    for($i=0; $i<strlen($pass); $i++) {
       $char = substr($pass, $i, 1);
       $keychar = substr($key, ($i % strlen($key))-1, 1);
       $char = chr(ord($char)-ord($keychar));
       $respuesta.=$char;
    }
    $this->question = $pregunta;
    $this->optiona = $res['pre_varchar_optiona'];
    $this->optionb = $res['pre_varchar_optionb'];
    $this->optionc = $res['pre_varchar_optionc'];
    $this->optiond = $res['pre_varchar_optiond'];
    $this->optione = $res['pre_varchar_optione'];  
    $this->ontiy=$respuesta;  
    $this->showquestion();
  }
}
