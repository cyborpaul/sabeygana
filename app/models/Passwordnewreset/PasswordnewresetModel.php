<?php 
/**
* 
*/
class PasswordnewresetModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function changepassword($request_params, $mail){
    $password=$request_params['password'];
    $passwordre=$request_params['passwordre'];
    $passwordcifrada=password_hash($password, PASSWORD_DEFAULT);
    $sql="UPDATE `sanmarcos_usuarios` SET `usu_txt_password`='$passwordcifrada' WHERE usu_txt_email= '$mail'";

    return $this->db->query($sql);


  }



}