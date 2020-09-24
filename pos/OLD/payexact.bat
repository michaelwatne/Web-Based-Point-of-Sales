@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
start /b makeexactpayment.bat
exit
