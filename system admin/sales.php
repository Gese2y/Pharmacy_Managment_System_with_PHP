<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
<?php
require_once('../assets/constants/config.php');
$sql = "SELECT sale, rep, Sale, Sale*100/(SELECT SUM(sale) AS s FROM sales) AS percent FROM sales";
$result = $con->query($sql);
?>
<table border="2">
	<tr>
		<td>Name</td>
		<td>Sale</td>
		<td>Percentage</td>
	</tr>
	<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>
    	<tr>
    		<td><?php echo $row["rep"]; ?></td>
		    <td><?php echo $row["sale"]; ?></td>
		    <td><?php echo $row["percent"]; ?></td>
    	</tr>
        <?php
    }
} else {
    echo "0 results";
}
?>
</table>