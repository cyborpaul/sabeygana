<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . FOLDER_PATH .'/app/models/Prueba/PruebaModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Password/PasswordModel.php';
require_once LIBS_ROUTE .'Session.php';
class PruebaController extends Controller
{
    public $nombre;

    /**
     * object 
     */
    public $model;
    private $session;
    /**
     * Inicializa valores 
     */
    public function __construct()
    {
      $this->model = new PruebaModel();
      $this->nombre = 'Mundo';
      $this->session = new Session(); 
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

}
?>