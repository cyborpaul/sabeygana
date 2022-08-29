<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Password/PasswordModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Resetpassword/ResetpasswordModel.php';
require_once LIBS_ROUTE .'Session.php';

class ResetpasswordController extends Controller
{
    public $nombre;

    /**
     * object 
     */
    public $model;
    /**
     * Inicializa valores 
     * 
     */
    private $session;
    public function __construct()
    {
      $this->model = new ResetpasswordModel();
      $this->session = new Session(); 
      $this->nombre = 'Mundo';
      $this->session->init();
      if($this->session->getStatus() === 1| empty($this->session->get('email')))
        exit('Acceso denegado');
    }

    public function exec()
    {
      $params = array(
        'email' => $this->session->get('email')
      );
      $this->render(__CLASS__, $params);
    }
   
    public function verifycod($request_params){
      $cod=$this->model->verifycodreset($request_params);
      if($cod->num_rows){
          header('location: /sabeygana/Passwordnewreset');
      }else{
          echo 'El código ingresado es incorrecto';
      }

  }
 

    
  

}
?>