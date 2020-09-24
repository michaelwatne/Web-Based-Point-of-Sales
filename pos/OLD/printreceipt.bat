@echo off
title Make & Print Receipt
for /f "delims=" %%x in (transactionid.txt) do set transid=%%x
for /f "delims=" %%x in (amnttendered.txt) do set tendered=%%x
for /f "delims=" %%x in (change.txt) do set change=%%x
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
echo NJ Concessions > receipt.txt
echo %date% %time% >> receipt.txt
echo Transaction ID: %transid% >> receipt.txt
echo ---------------- >> receipt.txt
type transaction.txt >> receipt.txt
echo. >> receipt.txt
echo Total: %transcost% >> receipt.txt
echo Amount Tendered: %tendered% >> receipt.txt
echo Change Given: %change% >> receipt.txt
echo. >> receipt.txt
echo Thank you for shopping with us! >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo. >> receipt.txt
echo . >> receipt.txt
type c:\POS\receipt.txt > \\127.0.0.1\StarTSP
del /f receipt.txt
echo No cash tendered > amnttendered.txt
echo No change given > change.txt