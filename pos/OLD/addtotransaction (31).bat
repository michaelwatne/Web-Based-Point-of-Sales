@echo off
title Add to Transaction
for /f "delims=" %%x in (inventory\QUICKPRODUCT75\details.txt) do set details=%%x
for /f "delims=" %%x in (inventory\QUICKPRODUCT75\cost.txt) do set cost=%%x
echo %details% - $%cost% >> transaction.txt
echo %cost% >> sumcost.txt
set /a dollars=1
set /a cents=0
start /b domath.bat