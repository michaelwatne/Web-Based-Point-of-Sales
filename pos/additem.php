<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NJ Concessions Point of Sales</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
$itemid=$_GET['itemid'];
$category=$_GET['category'];
$cost = file_get_contents("Inventory/$category/$itemid/cost.txt");
$qty = file_get_contents("Inventory/$category/$itemid/available.txt");
$products = file_get_contents("Inventory/$category/$itemid/products.txt");
echo "Item ID is $itemid and category is $category<br>";
echo "The products and the cost is $products <br>and $cost<br>";
echo "There is $qty quantity of this item.";
?>
</body>
</html>