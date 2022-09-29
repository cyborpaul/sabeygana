<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT .'/sabeygana/app/models/Register/RegisterModel.php';
require_once ROOT .'/sabeygana/app/models/Home/HomeModel.php';
require_once ROOT.'/sabeygana/app/models/Login/LoginModel.php';
require_once ROOT . '/sabeygana/app/models/Home/HomeModel.php';


class SabeyganawebserviceController extends Controller
{
    public $nombre;

    /**
     * object 
     */
    public $model;
  
    public $modeltwo;

    public $login;

    public $home;
    /**
     * Inicializa valores 
     */
    public function __construct()
    {
      $this->model = new RegisterModel();
      $this->modeltwo = new HomeModel();
      $this->login = new LoginModel();
      $this->home=new HomeModel();
      $this->nombre = 'Mundo';
    }

    public function exec()
    {
      $this->render(__CLASS__);
    }


  public function signin($request_params){

    $result = $this->login->signInv($request_params['email']);
    
    $resulta = $result->fetch_object();
    
    if(empty($request_params['email']) OR empty($request_params['pass'])){
        $message="El correo y el email son obligatorios";
        $this->message = $message;
        $params['error'] = array(
          'message' => $this->message
        );
    }elseif(!$result->num_rows){
        $message="El email {$request_params['email']} no fue encontrado";
        $this->message = $message;
        $params['error'] = array(
          'message' => $this->message
        );

    }elseif(!password_verify($request_params['pass'], $resulta->usu_txt_password)){
        $message='La contraseña es incorrecta';
        $this->message = $message;
        $params['error'] = array(
          'message' => $this->message
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
        $this->message = $message;
        $params['successful'] = array(
          'message' => $this->message
        );
    }



    

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

  public function addUser($request_params){
    $result = $this->model->add($request_params);
    if($result==1){
      $message="Nuevo usuario registrado correctamente";
      $this->message = $message;
      $params['successful'] = array(
        'message' => $this->message
      );
    }else{
      $message="Hubo un problema en el registro";
      $this->message = $message;
      $params['error'] = array(
        'message' => $this->message
      );

    }
    header('Content-Type: application/json');
    echo json_encode($params);
  }

  public function level($request_params){
    $id = $request_params['id_jugador'];
    $nivel= $request_params['nivel_jugador'];
    $nivelexitoso=$nivel+1;
    $id_pregunta=$request_params['question'];
    $respuesta=$request_params['answer'];
    $ganancia=$request_params['ganancia'];
    $saldo=$request_params['saldo'];

    $res=$this->home->actualizarJugada($request_params);
    $actualizar=$this->home->actualizarJugador($request_params);
    $actualizarmovimiento=$this->home->actualizarMovimiento($request_params);

    if($res==1){
      $message="Actualización correcta";
      $this->message = $message;
      $params['successful'] = array(
        'message' => $this->message
      );

    }
    header('Content-Type: application/json');
    echo json_encode($params);
  }




    
}