<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Passwordnewreset/PasswordnewresetModel.php';
require_once LIBS_ROUTE .'Session.php';

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
      $this->session = new Session(); 
      $this->session->init();
      if($this->session->getStatus() === 1| empty($this->session->get('email')))
        exit('Acceso denegado');
    }

    public function exec()
    {
        $params = array(
            'email' => $this->session->get('email'),
          );
          $this->render(__CLASS__,$params);
    }

    public function newpassword($request_params){
        $mail=$this->session->get('email');
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