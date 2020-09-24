@echo off
title Add to Transaction
start /wait inventory\OTHER\getinfo.vbs
start /wait inventory\OTHER\getinfo2.vbs
for /f "delims=" %%x in (inventory\Other\details.txt) do set details=%%x
for /f "delims=" %%x in (inventory\Other\cost.txt) do set cost=%%x
echo %details% - $%cost% >> transaction.txt
echo %cost% >> sumcost.txt
set /a dollars=1
set /a cents=0
start /b domath.bat