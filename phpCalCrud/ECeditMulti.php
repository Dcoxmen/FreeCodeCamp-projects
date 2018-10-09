<?php
//this page will import a shipment invoice and map the columns
//to show graph info on analyserView.php
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

	$sql = "SELECT * FROM carrier_ts WHERE email = 'open' ORDER BY apptdatetime ASC" ;
	
	$query = $sql;
	$pdo_statement = $pdo->prepare($query);  
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<html>
<head>
<title>Carrier Time Slot 2</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- local css -->
    <link href="/connect/css/connect.css" rel="stylesheet" type="text/css">
    <link href="stylestts.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="carrierstsEC.js" type="text/javascript"></script>
    <script src="pagingplugin/jquery.twbsPagination.js" type="text/javascript"></script>
    
</head>
<body>
<div class="vidpage-header">
  <div class="hero-logo-box">
    <p>&nbsp;</p>
    </div>
</div>
    
<div class="container">
 <p>&nbsp;</p> 
  <!-- Data table in foreach loop. -->
  <form name="frmUser" method="post" action="">
    <div>
      <table class="tablesorter" width="100%">
        <tr class="tableheader" >
          <td align="center">id number</td>
          <td width="11%">Ship Date/Time</td>
          <td width="6%">Carrier Name</td>
          <td width="13%">E-mail</td>
          <td width="15%">Purch Order</td>
          <td width="15%">Notes</td>
          <td colspan="2">Dock Number</td>
        </tr>
        <?php $i=0; 
        foreach($result as $row ) { 
        if($i%2==0)
        $classname="evenRow";
        else
        $classname="oddRow"; 
        ?>                                      
                <tr class="<?php if(isset($classname)) echo $classname;?>">
          <td align="center">id:<?php echo $row["id"]; ?>
            <input type="checkbox" name="id[]" value="<?php echo $row['id']; ?>" ></td>
          <td><?php echo $row["apptdatetime"]; ?></td>
          <td><?php echo $row["carrier"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["purchorder"]; ?></td>
          <td><?php echo $row["notes"]; ?></td>
          <td width="14%"><?php echo $row["docknum"]; ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
        <tr class="listheader" style="text-align: right">
          <td colspan="12" >
            
            <div><input class="button_link" type="button" name="update" value="Update" onClick="setUpdateAction();" />
            <input class="button_link" type="button" name="delete" value="Delete"  onClick="setDeleteAction();" />
              </div>  
              
          </td>
        </tr>
      </table>
    </div>    
  </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/js/extras/jquery.tablesorter.pager.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/js/jquery.tablesorter.widgets.js"></script> 
<script type="text/javascript" src="js/tblresize.js"></script> 
<script type="text/javascript">
$(function() {
		$("table")
			.tablesorter({widthFixed: false, widgets: ['zebra', 'resizable'], widgetOptions:{ resizable: true, resizable_widths: [ '12%','12%', '12%', '12%','12%', '12%', '12%', '12%' ]}})
			.tablesorterPager({container: $("#pager")});
    
	});
	</script>   
</body></html>