<?php
class UserValidation{



private $data;
private $errors=[];
private static $fields = ['username', 'email'];
//====construct function==================
  public function __construct($post_data){
$this->data=$post_data;
  }
  ///========form validation==============
public function validationForm(){
  foreach(self::$fields as $field){
  //  echo $field;
////  echo "<pre>";
 //print_r ($this->data) ;
if(empty($this->data[$field])){
      trigger_error("$field is not present in the data");
      return;
    }
  }
/*foreach (self::$fields as $field) {

if(array_key_exists($field,$this->data)){
  trigger_error("'$field' is not present in the data");
  echo "$field errors ";

  return;
}}*/
  $this->validationUser();
  $this->validationEmail();
  return $this->errors;

}
////========username validation================
private function validationUser(){
$value = trim($this->data['username']);
if(empty($value)){
  $this->addError('username','username must not empty');
}else{
  if(!preg_match('/^[a-z0-9]{6,12}$/i',$value)){
    $this->addError('username','username must 6-12 chars alphanumeric');
}
}
}
////email validation================
private function validationEmail(){
$value = trim($this->data['email']);
if(empty($value)){
  $this->addError('email','email must not empty');
}else{
  if (!filter_var($value, FILTER_VALIDATE_EMAIL)){
    $this->addError('email','email  not valid');
}
}
}
//add error function
private function addError($key,$val){
  $this->errors[$key]=$val;
}
}
?>
