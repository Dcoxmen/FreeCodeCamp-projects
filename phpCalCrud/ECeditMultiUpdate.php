<?php 

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

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$usersCount = count($_POST["id"]);
for($i=0;$i<$usersCount;$i++) {
$pdo_statement=$pdo->prepare("update carrier_ts set carrier='" . $_POST["carrier"][$i] . "', email='" . $_POST["email"][$i] . "', notes='" . $_POST["notes"][$i] . "', phone='" . $_POST["phone"][$i] . "' WHERE id='" . $_POST["id"][$i] . "'");
$pdo_statement->execute();    
}    
header("Location:ECeditMulti.php");
}
 
?>
<html>
<head>
<title>Edit Multiple Carriers</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- local css -->
    <link href="/connect/css/connect.css" rel="stylesheet" type="text/css">    
<link rel="stylesheet" type="text/css" href="stylestts.css" />
</head>
<body>
<div class="vidpage-header">
  <div class="hero-logo-box">
    <p>&nbsp;</p>
    </div>
</div>    
<div class="container">
  <div style="text-align:left;margin:20px 0px;"><a href="ECeditMulti.php" class="button_link">Back to List</a></div>  
  <form name="frmUser" method="post" action="">
    <div style="width:500px;">
      <table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
        <tr>
         <td class="tableheader">Confirm Carrier Schedule</td>
        </tr>
          <!--form table within for loop -->
        <?php   
        $rowCount = count($_POST["id"]);
        for($i=0;$i<$rowCount;$i++) {
        $query = $pdo->prepare("SELECT * FROM carrier_ts WHERE id='" . $_POST["id"][$i] . "'"); 
        $query->execute();    
        $row[$i] = $query->fetch(\PDO::FETCH_ASSOC);     
        ?>
        <tr>
          <td>   
            <table border="0" cellpadding="10" cellspacing="10" width="500" align="center" class="tblSaveForm">
              <tr>
                <td><label>Ship Date:</label></td>
                <td><label><?php echo $display_date = date("m/d/Y", strtotime($row[$i]["apptdatetime"])); ?></label></td>
              </tr>
              <tr>
                <td><label>Carrier Name:</label></td>
                <td><input type="hidden" name="id[]" class="txtField" value="<?php echo $row[$i]['id'];?>"><input type="text" name="carrier[]" class="txtField" value="<?php echo $row[$i]['carrier']; ?>"></td>
              </tr>
              <tr>
                <td><label>Carrier Email:</label></td>
                <td><input type="email" name="email[]" class="txtField" value="<?php echo $row[$i]['email']; ?>"></td>
              </tr>
              <td><label>Notes:</label></td>
                <td><input type="text" name="notes[]" class="txtField" value="<?php echo $row[$i]['notes']; ?>"></td>
                </tr>
              <td><label>Phone:</label></td>
                <td><input type="text" name="phone[]" class="txtField" value="<?php echo $row[$i]['phone']; ?>"></td>
                </tr>
            </table>
            <p>&nbsp;</p>
          </td>
        </tr>
        <?php
        }
        ?>
        <tr>
          <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
        </tr>
      </table>
    </div>
  </form>
</div>
 
</body></html>