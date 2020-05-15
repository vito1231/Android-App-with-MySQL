<?php
    class DbOperations{
        private $con;
        function __construct(){
            require_once dirname(__FILE__).'/DbConnect.php';

            $db = new DbConnect();
            $this->con = $db->connect();

        }

        function createContacto($nombre,$correo){
            $stmt= $this->con->prepare("INSERT INTO `contacto` (`Id`, `Nombre`, `Correo`)
             VALUES (NULL, ?, ?);");
             $stmt->bind_param("ss",$nombre,$correo);

             if($stmt->execute()){
               return true;
             }
             else {
               return false;
             }

        }
        /*
	* The read operation
	* When this method is called it is returning all the existing record of the database
	*/
	function getContacto($id){
		$stmt = $this->con->prepare("SELECT * FROM contacto WHERE id = ?");
    $stmt->bind_param("i",$id);

		$stmt->execute();
		$stmt->bind_result($id, $nombre, $correo);
    $stmt->fetch();
    $contacto =array();
    $contacto['id']=$id;
    $contacto['nombre']=$nombre;
    $contacto['correo']=$correo;

		return $contacto;
	}

	/*
	* The update operation
	* When this method is called the record with the given id is updated with the new given values
	*/
	function updateContacto($id,$nombre,$correo){
		$stmt = $this->con->prepare("UPDATE contacto SET Nombre = ?, Correo = ? WHERE id = ?");
		$stmt->bind_param("ssi", $nombre, $correo, $id);
		if($stmt->execute())
			return true;
		return false;
	}


	/*
	* The delete operation
	* When this method is called record is deleted for the given id
	*/
	function deleteContacto($id){
		$stmt = $this->con->prepare("DELETE FROM contacto WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true;

		return false;
	}
    }
