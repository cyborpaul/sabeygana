<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Resetpassword/ResetpasswordModel.php';

class ResetpasswordController extends Controller
{
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
      $this->model = new ResetpasswordModel();
      $this->nombre = 'Mundo';
    }

    public function exec()
    {
      $this->render(__CLASS__);
    }


/*     public function verifycod($request_params){
      $cod=$this->model->verifycodreset($request_params);
      if($cod->num_rows){
          header('location: /sabeygana/Passwordnewreset');
      }else{
          echo 'El código ingresado es incorrecto';
      }

  }
 */


  

}
?>