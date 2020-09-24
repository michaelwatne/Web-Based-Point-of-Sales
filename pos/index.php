
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NJ Concessions Point of Sales</title>
<link rel="stylesheet" href="styles.css">
</head>

<script type="text/javascript">
function showpay() {
document.getElementById("payscr").style.display = 'block';
document.getElementById("advfunctscr").style.display = 'none';
document.getElementById("itemcontainer").style.display = 'none';
}
</script>
<script type="text/javascript">
function showorder() {
document.getElementById("payscr").style.display = 'none';
document.getElementById("advfunctscr").style.display = 'none';
document.getElementById("itemcontainer").style.display = 'block';
}
</script>
<script type="text/javascript">
function showavdfunct() {
document.getElementById("payscr").style.display = 'none';
document.getElementById("itemcontainer").style.display = 'none';
document.getElementById("advfunctscr").style.display = 'block';
}
</script>


<body bgcolor="white">
<h1 align="center">NJ Concessions Point of Sales</h1>
<hr>

<div id="registerfunctions-top" class="registerfunctions-top" align="center">
<button class="regfunction-top" id="Order" onclick="window.location.href='index.php?screen=orderscr.php'">Order</button>&nbsp;
<button class="regfunction-top" id="Pay" onclick="window.location.href='index.php?screen=payscr.php'">Pay</button>&nbsp;
<button class="regfunction-top" id="AdvFunctions" onclick="window.location.href='index.php?screen=advfunctscr.php'">Advanced Functions</button>&nbsp;
</div>
<br>
<div class="contentleft" style="float:left;">
<?php
error_reporting( error_reporting() & ~E_NOTICE );
$screen = $_GET["screen"];
	include "$screen";

?>
</div>

<div class="contentright" style="float:right;">
<div id="transactioncontainer" align="top" class="transactioncontainer">
<h4>Transaction ID: <span class='transid-container'>
<?php
$transid = file_get_contents("transaction.id");
echo "$transid";
?></span>
&nbsp;<button class="prevtrans" id="prevtrans" onclick="prevtrans"><img src="arrow-left.png" style="width:25px; height:auto;" /></button><button class="nexttrans" id="nexttrans" onclick="nexttrans"><img src="arrow-right.png" style="width:25px; height:auto;" /></button><button class="currenttrans" id="currenttrans" onclick="currenttrans"><img src="arrow-down.png" style="width:25px; height:auto;" /></button></h4>

<form action="index.php" method="POST">
<select class='transaction' name='transvoid' multiple>
<?php
if (file_exists("thistransaction/1.item")) {
$itemcount = "1";
while (file_exists("thistransaction/$itemcount.item")) {
$itemname = file_get_contents("thistransaction/$itemcount.item");
echo "<option value='$itemcount'>$itemname</option>";
$itemcount++;
}}
?>
</select>

<h4>Total: $<span class=''><?php include "transactioncost.txt";?></h4>
<div id="registerfunctions" class="registerfunctions">
<button class="regfunction" id="canceltrans" onclick="Canceltrans">Cancel<br>Transaction</button>&nbsp;
<button class="regfunction" id="voiditems" onclick="Voiditem">Void<br>Item(s)</button>&nbsp;
<button class="regfunction" id="printreceipt" onclick="Printreceipt">Print<br>Receipt</button>&nbsp;
</div>
</div>
</div>
</body>
</html>