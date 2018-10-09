<?php
//insert.php
$database_username = '';
$database_password = '';
$connect = new PDO( );

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO carrier_ts 
 (apptdatetime, carrier, email, phone, purchorder, notes, docknum) 
 VALUES (:apptdatetime, :carrier, :email, :phone, :purchorder, :notes, :docknum)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':apptdatetime' => $_POST['start'],   
   ':carrier'  => $_POST['carrier'],
   ':email'  => $_POST['email'],
   ':phone'  => $_POST['phone'],
   ':purchorder' => $_POST['purchorder'],
   ':notes' => $_POST['notes'], 
   ':docknum' => $_POST['docknum']  
  )
 );
}
?>