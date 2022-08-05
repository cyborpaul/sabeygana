<?php 
/**
* 
*/
class PasswordModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function verify($request_params){
    $email=$request_params['email'];
    $sql="SELECT * FROM `sanmarcos_usuarios` WHERE usu_txt_email='$email'";
    return $this->db->query($sql);
  }

  public function updatecode($codigo, $email){
    return $this->db->query("UPDATE `sanmarcos_usuarios` SET `usu_txt_codereset` = '$codigo' WHERE usu_txt_email='$email'");

  }



}
