<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['nombre'])and
    isset($_POST['correo']))
  {

      $db=new DbOperations;
      if($db->createContacto(
        $_POST['nombre'],
        $_POST['correo']
        )){
        $response['error']= false;
        $response['message']= "User Registered Successfully";
      }
      else {
        $response['error']=true;
        $responde['message']="Some error occurred please try again";
      }


  }else {
    $response['error']=true;
    $response['message']="Required fields are missing";
  }

}

else{
  $response['error']=true;
  $response['message']="Invalid Request";
}
echo json_encode($response);
