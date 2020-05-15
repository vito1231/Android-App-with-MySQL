<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['nombre'])and
    isset($_POST['correo']))
  {

    $db = new DbOperations();
    $result = $db->updateContacto(
      $_POST['id'],
      $_POST['nombre'],
      $_POST['correo'],
    );
      if($result){
          $response['error'] = false;
          $response['message'] = 'Contacto updated successfully';
          $response['contacto'] = $db->getContacto();
      }else{
          $response['error'] = true;
          $response['message'] = 'Some error occurred please try again';
        }
      }


  else {
    $response['error']=true;
    $response['message']="Required fields are missing";
  }

}

else{
  $response['error']=true;
  $response['message']="Invalid Request";
}
echo json_encode($response);
