<html>
<head>
<title>Kitchen Order Controller</title>
<link rel="stylesheet" href="styles.css">
</head>
<body bgcolor='black'>
<table style="border: 3px solid white;">
<?php
$tid = "1";
while (file_exists("../pos/transactions/$tid")) {
	echo "<tr style='border: 3px solid white;'>";
	$item = "1";
	while (file_exists("../pos/transactions/$tid/$item.item")) {
		$item = file_get_contents("../pos/transactions/$tid/$item.item");
		echo "<td>$item</td>";
		$item++;
	}
	echo "</tr>";
	$tid++;
} ?>
</table>
</body>
</html>