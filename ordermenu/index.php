<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NJ Concessions Point of Sales</title>
<link rel="stylesheet" href="styles.css">
</head>

<script language="VBScript">

Sub Window_OnLoad

  'This method will be called when the application loads
  'Add your code here
End Sub

</script>

<body bgcolor="white">
<h1 align="center">Welcome to Norman/Jessica Concessions!</h1>
<hr>
<div class="beverages">
<h2 align="center">Ice Cold Beverages</h2>
<?php
$itemid = "1";
while (file_exists("../pos/Inventory/Drinks/$itemid")) {
$name = file_get_contents("../pos/Inventory/Drinks/$itemid/name.txt");
$cost = file_get_contents("../pos/Inventory/Drinks/$itemid/cost.txt");
echo "<button class='item' onclick='item$itemid'><b>$name</b><br><img src='../pos/Inventory/Drinks/$itemid/logo.png' width='=100px' height='100px'/><br><b>$$cost</b></button>";
$itemid++;
}
?>
</div>
<div id="Food">
<h3 align="center">Mouth Watering Food</h3>
<?php
$itemid = "1";
while (file_exists("../pos/Inventory/Food/$itemid")) {
$cost = file_get_contents("../pos/Inventory/Food/$itemid/cost.txt");
$name = file_get_contents("../pos/Inventory/Food/$itemid/name.txt");
echo "<button class='item' onclick='item$itemid'>$name<br><img src='../pos/Inventory/Food/$itemid/logo.png'/><br><b>$$cost</b></button>";
$itemid++;
}
?>
</div>
<div id="Baskets"">
<h3 align="center">Get More with our Baskets!</h3>
<?php
$itemid = "1";
while (file_exists("../pos/Inventory/Baskets/$itemid")) {
$cost = file_get_contents("../pos/Inventory/Baskets/$itemid/cost.txt");
$name = file_get_contents("../pos/Inventory/Baskets/$itemid/name.txt");
echo "<button class='item' onclick='item$itemid'>$name<br><img src='../pos/Inventory/Baskets/$itemid/logo.png'/><br><b>$$cost</b></button>";
$itemid++;
}
?>
<br>
<center><b align="center">Each basket comes with a side of french fries and a drink!</b></center>
</div>
<br><br><br>
<center> Accepted here <br><img src="cards.jpeg" height="30px" width="auto"/></center>
</div>
</div>
</div>
</form>

</body>
</html>