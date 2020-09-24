<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NJ Concessions Point of Sales</title>
<link rel="stylesheet" href="styles.css">
</head>
<!--<style>
body{
	background-color: #ebebeb;
}
</style>-->
<!--Food Categories-->
<!--Drinks-->
<script type="text/javascript">
function showdrinks() {
document.getElementById("Food").style.display = 'none';
document.getElementById("Specials").style.display = 'none';
document.getElementById("Baskets").style.display = 'none';
document.getElementById("Drinks").style.display = 'block';
}
</script>
<!--Food-->
<script type="text/javascript">
function showfood() {
document.getElementById("Drinks").style.display = 'none';
document.getElementById("Specials").style.display = 'none';
document.getElementById("Baskets").style.display = 'none';
document.getElementById("Food").style.display = 'block';
}
</script>
<!--Baskets-->
<script type="text/javascript">
function showbaskets() {
document.getElementById("Drinks").style.display = 'none';
document.getElementById("Specials").style.display = 'none';
document.getElementById("Food").style.display = 'none';
document.getElementById("Baskets").style.display = 'block';
}
</script>
<!--Other-->
<script type="text/javascript">
function showspecials() {
document.getElementById("Drinks").style.display = 'none';
document.getElementById("Baskets").style.display = 'none';
document.getElementById("Food").style.display = 'none';
document.getElementById("Specials").style.display = 'block';
}
</script>

<!--Order Screen -->
<h3 align="center">You can use this screen to manage your inventory. Please note that upon completion, a refresh will be required, otherwise changes will not go into effect.</h3>
<h5 align="center"><i>Some settings are managed by your system administrator and cannot be changed. Please consult your system administrator to make any changes that are locked.</i></h5><br>
<br>
<button class="category" onclick="showdrinks()">Beverages</button> <button class="category" onclick="showfood()">Food Items</button> <button class="category" onclick="showbaskets()">Baskets</button> <button class="category" onclick="showspecials()">Specials/Other</button><br>
<div id="itemcontainer" class="itemcontainer">
<div id="Drinks" class="contentc">
<table>
<th>
<td>Product Name</td><td>Icon Location</td><td>Enabled?</td><td>Product Cost ($)</td><td>Product Quantity</td>
</th>
<tr>
<?php
$itemid = "1";
while (file_exists("Inventory/Drinks/$itemid")) {
echo "<form action='changeinventory.php' method='get'>";
$cost = file_get_contents("Inventory/Drinks/$itemid/cost.txt");
$name = file_get_contents("Inventory/Drinks/$itemid/name.txt");
$qty = file_get_contents("Inventory/Drinks/$itemid/available.txt");
if (file_exists("Inventory/Drinks/$itemid/enabled.true")) {
$enabled = "Checked";
} else {
$enabled = "Unchecked";
}
echo "<th><td><input type='text' value='$name' name='name'></input></td>";
echo "<td><input type='text' value='Inventory/Drinks/$itemid/logo.png' name='iconloc' readonly></input></td>";
echo "<td><input type='checkbox' name='enabled' $enabled></input></td>";
echo "<td><input type='text' value='$cost' name='cost'></input></td>";
echo "<td><input type='text' value='$qty' name='qty'></input></td>";
echo "<td><input type='submit' value='Apply'></input></td>";
echo "</tr>";
echo "<input type='hidden' name='itemid' value='$itemid'></input>";
echo "</form>";
$itemid++;
}
echo "</table>";
?>
</div>
<div id="Food" class="contentc" style="display:none;">
<table>
<th>
<td>Product Name</td><td>Icon Location</td><td>Enabled?</td><td>Product Cost ($)</td><td>Product Quantity</td>
</th>
<tr>
<?php
$itemid = "1";
while (file_exists("Inventory/Food/$itemid")) {
echo "<form action='changeinventory.php' method='get'>";
$cost = file_get_contents("Inventory/Food/$itemid/cost.txt");
$name = file_get_contents("Inventory/Food/$itemid/name.txt");
$qty = file_get_contents("Inventory/Food/$itemid/available.txt");
if (file_exists("Inventory/Food/$itemid/enabled.true")) {
$enabled = "Checked";
} else {
$enabled = "Unchecked";
}
echo "<th><td><input type='text' value='$name' name='name'></input></td>";
echo "<td><input type='text' value='Inventory/Food/$itemid/logo.png' name='iconloc' readonly></input></td>";
echo "<td><input type='checkbox' name='enabled' $enabled></input></td>";
echo "<td><input type='text' value='$cost' name='cost'></input></td>";
echo "<td><input type='text' value='$qty' name='qty'></input></td>";
echo "<td><input type='submit' value='Apply'></input></td>";
echo "</tr>";
echo "<input type='hidden' name='itemid' value='$itemid'></input>";
echo "</form>";
$itemid++;
}
echo "</table>";
?>
</div>
<div id="Baskets" style="display:none;">
<table>
<th>
<td>Product Name</td><td>Icon Location</td><td>Enabled?</td><td>Product Cost ($)</td><td>Product Quantity</td>
</th>
<tr>
<?php
$itemid = "1";
while (file_exists("Inventory/Baskets/$itemid")) {
echo "<form action='changeinventory.php' method='get'>";
$cost = file_get_contents("Inventory/Baskets/$itemid/cost.txt");
$name = file_get_contents("Inventory/Baskets/$itemid/name.txt");
$qty = file_get_contents("Inventory/Baskets/$itemid/available.txt");
if (file_exists("Inventory/Baskets/$itemid/enabled.true")) {
$enabled = "Checked";
} else {
$enabled = "Unchecked";
}
echo "<th><td><input type='text' value='$name' name='name'></input></td>";
echo "<td><input type='text' value='Inventory/Baskets/$itemid/logo.png' name='iconloc' readonly></input></td>";
echo "<td><input type='checkbox' name='enabled' $enabled></input></td>";
echo "<td><input type='text' value='$cost' name='cost'></input></td>";
echo "<td><input type='text' value='$qty' name='qty'></input></td>";
echo "<td><input type='submit' value='Apply'></input></td>";
echo "</tr>";
echo "<input type='hidden' name='itemid' value='$itemid'></input>";
echo "</form>";
$itemid++;
}
echo "</table>";
?>
</div>
<div id="Specials" style="display:none;">
<table>
<th>
<td>Product Name</td><td>Icon Location</td><td>Enabled?</td><td>Product Cost ($)</td><td>Product Quantity</td>
</th>
<tr>
<?php
$itemid = "1";
while (file_exists("Inventory/Other/$itemid")) {
echo "<form action='changeinventory.php' method='get'>";
$cost = file_get_contents("Inventory/Other/$itemid/cost.txt");
$name = file_get_contents("Inventory/Other/$itemid/name.txt");
$qty = file_get_contents("Inventory/Other/$itemid/available.txt");
if (file_exists("Inventory/Other/$itemid/enabled.true")) {
$enabled = "Checked";
} else {
$enabled = "Unchecked";
}
echo "<th><td><input type='text' value='$name' name='name'></input></td>";
echo "<td><input type='text' value='Inventory/Other/$itemid/logo.png' name='iconloc' readonly></input></td>";
echo "<td><input type='checkbox' name='enabled' $enabled></input></td>";
echo "<td><input type='text' value='$cost' name='cost'></input></td>";
echo "<td><input type='text' value='$qty' name='qty'></input></td>";
echo "<td><input type='submit' value='Apply'></input></td>";
echo "</tr>";
echo "<input type='hidden' name='itemid' value='$itemid'></input>";
echo "</form>";
$itemid++;
}
echo "</table>";
?>
</div>
</div>

</form>
</body>
</html>