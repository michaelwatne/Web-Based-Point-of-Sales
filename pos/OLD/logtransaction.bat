@echo off
title Log Transaction
cd c:\POS
for /f "delims=" %%x in (transactionid.txt) do set transid=%%x
for /f "delims=" %%x in (amnttendered.txt) do set tendered=%%x
for /f "delims=" %%x in (change.txt) do set change=%%x
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
cd c:\POS\transactions\%transid%
echo NJ Concessions > receipt.txt
echo %date% %time% >> receipt.txt
echo Transaction ID: %transid% >> receipt.txt
echo ---------------- >> receipt.txt
type c:\POS\transaction.txt >> receipt.txt
echo. >> receipt.txt
echo Total: %transcost% >> receipt.txt
echo Amount Tendered: %tendered% >> receipt.txt
echo Change Given: %change% >> receipt.txt
::Make Inventory
set productid=1
echo %productid%.prod
goto checknext
:checknext
if "%productid%" == "50" goto finishinventory
if exist %productid%.prod goto getinventorycount
if not exist %productid%.prod goto nextcount
:nextcount
echo Nextcount
set /a productid=%productid%+1
goto checknext
:getinventorycount
if not exist %productid%.prod goto nextcount
for /f "delims=" %%x in (c:\POS\inventory\%productid%\available.txt) do set available=%%x
echo Available: %available%
echo ProductID: %productid%
for /f "delims=" %%x in (%productid%.prod) do set oldcount=%%x
echo Oldcount: %oldcount%
set /a leftover= %available%-%oldcount%
echo %leftover% > c:\POS\inventory\%productid%\available.txt
echo Leftover: %leftover%
set /a productid= %productid%+1
echo %productid%
goto checknext
:finishinventory
::Up Transaction ID
cd c:\POS
set /a transid=%transid%+1
mkdir transactions\%transid%
echo. > transaction.txt
echo. > transactioncost.txt
echo. > sumcost.txt
echo. > sumtotal.txt
echo %transid% > transactionid.txt
pause
exit