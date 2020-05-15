<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['id'])){
    $db = new DbOperations();

      $response['error'] = false;
      $response['message'] = 'Contact displayed successfully';
      $response['contacto'] = $db->getContacto($_POST['id']);



  }else{
    $response['error'] = true;
    $response['message'] = 'Nothing to read, provide an id please';
  }
}

else{
  $response['error']=true;
  $response['message']="Invalid Request";
}
echo json_encode($response);
