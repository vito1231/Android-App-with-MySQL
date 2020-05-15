<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['id'])){
    $db = new DbOperations();
    if($db->deleteContacto($_POST['id'])){
      $response['error'] = false;
      $response['message'] = 'Contact deleted successfully';
      $response['contacto'] = $db->getContacto();
    }else{
      $response['error'] = true;
      $response['message'] = 'Some error occurred please try again';
    }
  }else{
    $response['error'] = true;
    $response['message'] = 'Nothing to delete, provide an id please';
  }
}

else{
  $response['error']=true;
  $response['message']="Invalid Request";
}
echo json_encode($response);
