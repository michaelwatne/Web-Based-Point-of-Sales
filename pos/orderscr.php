<?php
session_start();
?>
<html>
<head>
<!--<style>
body{
	background-color: #ebebeb;
}
</style>-->
</head>
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
<button class="category" onclick="showdrinks()">Beverages</button> <button class="category" onclick="showfood()">Food Items</button> <button class="category" onclick="showbaskets()">Baskets</button> <button class="category" onclick="showspecials()">Specials/Other</button>
<br>
<div id="itemcontainer" class="itemcontainer">
<div id="Drinks" class="contentc">
<form action='additem.php' method='get'>
<?php
$itemid = "1";
while (file_exists("Inventory/Drinks/$itemid")) {
if (file_exists("Inventory/Drinks/$itemid/enabled.true")) {
$cost = file_get_contents("Inventory/Drinks/$itemid/cost.txt");
$name = file_get_contents("Inventory/Drinks/$itemid/name.txt");
echo "<button class='item' name='itemid' value='$itemid'>$name<br><img src='Inventory/Drinks/$itemid/logo.png' width='=75px' height='75px'/><br><b>$$cost</b></button>";
$itemid++;
} else {
$itemid++;
}
}
?>
<input type='hidden' name='category' value='Drinks'></input>
</form>
</div>
<div id="Food" class="contentc" style="display:none;">
<form action='additem.php' method='get'>
<?php
$itemid = "1";
while (file_exists("Inventory/Food/$itemid")) {
if (file_exists("Inventory/Food/$itemid/enabled.true")) {
$cost = file_get_contents("Inventory/Food/$itemid/cost.txt");
$name = file_get_contents("Inventory/Food/$itemid/name.txt");
$qty = file_get_contents("Inventory/Food/$itemid/available.txt");
echo "<button class='item' name='itemid' value='$itemid'>$name<br><img src='Inventory/Food/$itemid/logo.png'/><br><b>$$cost</b></button>";
$itemid++;
} else {
$itemid++;
}
}
?>
<input type='hidden' name='category' value='Food'></input>
</form>
</div>
<div id="Baskets" style="display:none;">
<form action='additem.php' method='get'>
<?php
$itemid = "1";
while (file_exists("Inventory/Baskets/$itemid")) {
if (file_exists("Inventory/Food/$itemid/enabled.true")) {
$cost = file_get_contents("Inventory/Baskets/$itemid/cost.txt");
$name = file_get_contents("Inventory/Baskets/$itemid/name.txt");
echo "<button class='item' name='itemid' value='$itemid'>$name<br><img src='Inventory/Baskets/$itemid/logo.png'/><br><b>$$cost</b></button>";
$itemid++;
} else {
$itemid++;
}
}
?>
<input type='hidden' name='category' value='Baskets'></input>
</form>
</div>
<div id="Specials" style="display:none;">
<form action='additem.php' method='get'>
<?php
$itemid = "1";
while (file_exists("Inventory/Other/$itemid")) {
if (file_exists("Inventory/Food/$itemid/enabled.true")) {
$cost = file_get_contents("Inventory/Other/$itemid/cost.txt");
$name = file_get_contents("Inventory/Other/$itemid/name.txt");
echo "<button class='item' name='itemid' value='$itemid' onclick='item$itemid'>$name<br><img src='Inventory/Other/$itemid/logo.png'/><br><b>$$cost</b></button>";
$itemid++;
} else {
$itemid++;
}
}
?>
<input type='hidden' name='category' value='Other'></input>
</form>
</div>
</div>

</form>
</body>
</html>