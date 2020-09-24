@echo off
echo. > transactioncost.txt
echo. > transaction.txt
echo. > sumcost.txt
for /f "delims=" %%x in (transactionid.txt) do set transid=%%x
del /f /q transactions\%transid%\*
exit