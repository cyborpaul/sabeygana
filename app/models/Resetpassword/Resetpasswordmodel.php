<?php 
/**
* 
*/
class ResetpasswordModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

/*   public function verifycodreset($request_params, $mail){
    $cod=$request_params['cod'];
    return $this->db->query("SELECT * FROM `sanmarcos_usuarios` WHERE usu_txt_codereset='$cod' AND usu_txt_email='$mail'");

  } */



}