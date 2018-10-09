<?php
//This is the home page connect
//include $_SERVER['DOCUMENT_ROOT']."../protected/configConnect.php";
include '../protected/configConnect.php';
$sql = 'SELECT * FROM userwexconn WHERE WCID = :wcid';
$sth = $pdo->prepare($sql);
$sth->execute(array(':wcid' => $_SESSION["WeconnSec1Id"]));

while ($row = $sth->fetch()) {
	$market = $row['market'];
	$name = $row['name'];
	$wcid = $row['wcid'];
	$Admin = $row['admin'];
}
?>
<?php
//connection to db
require_once('../protected/configConnect.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Carrier Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

     
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet"> 
     
  <link rel='stylesheet' href='calindex1.css' />
   <link rel='stylesheet' href='bootstrap-fullcalendar.css' />  
 </head>
 <body>
    <div class="container">
        <div class="row">
            
          <div class="col-xs-12">
                <h1>FullCalendar Events with Bootstrap Modal</h1>
                <div>
                  <p>This is an example of an application that uses a shipping scenerio. </p>
                  <p>&nbsp;</p>
              </div>
            <div id="calendar"></div>
                
          </div>
        </div>
    </div>
   <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body">
                 <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">carrier</label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="carrier" value="" id="carrier">
                    </div>
                  </div>  
                <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">phone</label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="phone" value="" id="phone">
                    </div>
                  </div>                    
                    
                  <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">po</label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="purchorder" value="" id="purchorder">
                    </div>
                  </div>   
                    <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">email</label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="email" value="" id="email">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">notes</label>
                    <div class="col-md-8 ui-front">
                        <input type="text" class="form-control" name="notes" value="" id="notes">
                    </div>
                  </div>    
                </div>
                <input type="hidden" id="id"/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit">Save changes</button>

                    <a href="" class="btn btn-primary" id="deleteit" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
     
  

<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.min.js'></script>
    <script src="junk1.js"> </script>
     
 </body>
</html>