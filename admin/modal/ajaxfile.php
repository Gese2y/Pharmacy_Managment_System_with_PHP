<?php
include "config.php";

$userid = $_POST['userid'];

$sql = "SELECT * FROM report where report_id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['report_id'];
    $emp_name = $row['Title'];
    $salary = $row['prepare_by'];
    $gender = $row['contact'];
    $city = $row['email'];
    $email = $row['sent_date'];
    $doc= $row['document'];
    
?>
<h1><?php echo $id; ?></h1>
<?php

}
$response .= "</table>";

echo $response;
exit;