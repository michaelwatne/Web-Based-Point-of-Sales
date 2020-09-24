@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
if %transcost% == 0 goto nocost
echo Tendered: %transcost% > amnttendered.txt
start printreceipt.vbs



start /b logtransaction.bat
exit
:nocost
start nocosterror.vbs
exit