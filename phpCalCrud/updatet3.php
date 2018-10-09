<?php
//update.php
$database_username = '';
$database_password = '';
$connect = new PDO( );

if(isset($_POST["id"]))
{
 $query = "
 UPDATE carrier_ts
 SET carrier=:carrier, phone=:phone, purchorder=:purchorder, email=:email, notes=:notes, apptdatetime=:apptdatetime WHERE id=:id";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':carrier'  => $_POST['carrier'],
   ':phone'  => $_POST['phone'],  
   ':purchorder'  => $_POST['purchorder'],       
   ':email'  => $_POST['email'],
   ':notes'  => $_POST['notes'],       
   ':apptdatetime' => $_POST['start'],
   ':id'   => $_POST['id']
  )
 );
}
?>
