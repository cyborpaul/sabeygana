<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Passwordnewreset/PasswordnewresetModel.php';

class PasswordnewresetController extends Controller
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
      $this->model = new PasswordnewresetModel();
      $this->nombre = 'Mundo';
    }

    public function exec()
    {
          $this->render(__CLASS__);
    }

    public function newpassword($request_params){
        $mail="";
        $password=$request_params['password'];
        $passwordre=$request_params['passwordre'];
        if($password==$passwordre){
            $changepassword=$this->model->changepassword($request_params, $mail);
            header('location: /sabeygana/Login');
        }else{
            return $this->ErrorMessage('Las constraseñas no coinciden');
            
                     
           

        }
        



    }

    public function ErrorMessage($message)
    {
      $params = array('message' => $message);
      $this->render(__CLASS__, $params);
    }



  

}
?>