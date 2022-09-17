<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT .'/sabeygana/app/models/Register/RegisterModel.php';
require_once ROOT .'/sabeygana/app/models/Home/HomeModel.php';
require_once ROOT.'/sabeygana/app/models/Login/LoginModel.php';


class SabeyganawebserviceController extends Controller
{
    public $nombre;

    /**
     * object 
     */
    public $model;
  
    public $modeltwo;

    public $login;
    /**
     * Inicializa valores 
     */
    public function __construct()
    {
      $this->model = new RegisterModel();
      $this->modeltwo = new HomeModel();
      $this->login = new LoginModel();
      $this->nombre = 'Mundo';
    }

    public function exec()
    {
      $this->render(__CLASS__);
    }


    public function signin($request_params)
  {

    $result = $this->login->signInv($request_params['email']);
    
    $resulta = $result->fetch_object();
    
    if(empty($request_params['email']) OR empty($request_params['pass'])){
        $message="El correo y el email son obligatorios";
        $params['error'] = array(
          'message' => $mensaje
        );
    }elseif(!$result->num_rows){
        $message="El email {$request_params['email']} no fue encontrado";
        $params['error'] = array(
          'message' => $mensaje
        );

    }elseif(!password_verify($request_params['pass'], $resulta->usu_txt_password)){
        $message='La contraseña es incorrecta';
        $params['error'] = array(
          'message' => $mensaje
        );
    }
    else{
        $message="Inicio de sesión exitosa";
        $res = $this->modeltwo->getUser($resulta->usu_int_id);
        $this->id = $res['usu_int_id'];
        $this->nombre=$res['usu_txt_nombre'];
        $this->apellido=$res['usu_txt_apellido'];
        $this->email=$res['usu_txt_email'];
        $this->dni=$res['usu_txt_dni'];
        $this->nivelactual=$res['last_level'];
        $this->saldo=$res['saldo'];
        $this->ganancia=$res['usu_txt_ganancia'];
        $this->game=$res['usu_txt_estadojuego'];
        $params['userinfo'] = array(
          'id' => $this->id,
          'nombre'=>$this->nombre,
          'apellido'=>$this->apellido,
          'email'=>$this->email,
          'dni'=>$this->dni,
          'nivel'=> $this->nivelactual,
          'saldo'=> $this->saldo,
          'ganancia'=>$this->ganancia,
          'game'=>$this->game
        );
        $params['successful'] = array(
          'message' => $mensaje
        );
    }

/*     $result = $this->login->signIn($request_params['email']);

    if(!$result->num_rows){
        $message="El email {$request_params['email']} no fue encontrado";
    }  

    $result = $result->fetch_object();

    if(!password_verify($request_params['pass'], $result->usu_txt_password)){
        $message='La contraseña es incorrecta';
    } */
      

    

      header('Content-Type: application/json');
      echo json_encode($params);
  }






    public function user($request_params){
        $res = $this->modeltwo->getUser($request_params);
        $this->id = $res['usu_int_id'];
        $this->nombre=$res['usu_txt_nombre'];
        $this->apellido=$res['usu_txt_apellido'];
        $this->email=$res['usu_txt_email'];
        $this->dni=$res['usu_txt_dni'];
        $this->nivelactual=$res['last_level'];
        $this->saldo=$res['saldo'];
        $this->ganancia=$res['usu_txt_ganancia'];
        $this->game=$res['usu_txt_estadojuego'];
        $params['userinfo'] = array(
          'id' => $this->id,
          'nombre'=>$this->nombre,
          'apellido'=>$this->apellido,
          'email'=>$this->email,
          'dni'=>$this->dni,
          'nivel'=> $this->nivelactual,
          'saldo'=> $this->saldo,
          'ganancia'=>$this->ganancia,
          'game'=>$this->game
        );
        header('Content-Type: application/json');
        echo json_encode($params);

    }




    
}