<?php
$sql = 'SELECT * FROM userwexconn WHERE WCID = :wcid';
$sth = $pdo->prepare($sql);
$sth->execute(array(':wcid' => $_SESSION["WeconnSec1Id"]));

while ($row = $sth->fetch()) {
	$market = $row['market'];
    $districtno = $row['districtno']; 
	$name = $row['name'];
	$wcid = $row['wcid'];
	$Admin = $row['admin'];
}
require_once("../protected/configConnect.php");
$recordid = (int)$_GET['id'];
if(!empty($_POST["save_record"])) {
	$pdo_statement=$pdo->prepare("update carrier_ts set title='" . $_POST[ 'title' ]. "', emailto1='" . $_POST[ 'emailto1' ]. "', purchorder='" . $_POST[ 'purchorder' ]. "'  where id=" . $recordid);
	$result = $pdo_statement->execute();
	if($result) {
		$carriername = $_POST['title'];
        $carrieremail = $_POST['emailto1'];
        $email_from = 'test@gmail.com';
        $to = "test@2.com";//<== update the email address
        $subject = "Carrier time slot submitted";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $carrieremail \r\n";
        $headers .= "CC: test@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $message = '<html><body>';
        $message .= '<img src="http://site/imgs/logo.png" alt="Carrier Time Bid" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $carriername . "</td></tr>";
        $message .= "<tr><td><strong>Email:</strong> </td><td>" . $carrieremail . "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";
        //Send the email!
        mail($to,$subject,$message,$headers);
        //done. redirect to thank-you page.
        header('Location: index.php');
	}
}
$pdo_statement = $pdo->prepare("SELECT id, title, purchorder, notes, emailto1, start_event, end_event FROM carriertslot2   where id=" . $recordid);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>
