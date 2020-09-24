@echo off
cd inventory\23
title Add to Transaction
set productid=23
for /f "delims=" %%x in (cost.txt) do set cost=%%x
for /f "delims=" %%x in (name.txt) do set name=%%x
for /f "delims=" %%x in (..\..\..\transactionid.txt) do set transid=%%x
for /f "tokens=*" %%a in (products.txt) do (
  echo. > ..\..\..\transactions\%transid%\%%a.%random%
)
echo %name% - $%cost% >> ..\..\..\transaction.txt
echo %cost% >> ..\..\..\sumcost.txt
echo 
cd ..\..\..\
start /b updatetotal.bat