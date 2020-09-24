@echo off
cd c:\POS\inventory\1
title Add to Transaction
set productid=1
for /f "delims=" %%x in (cost.txt) do set cost=%%x
for /f "delims=" %%x in (name.txt) do set name=%%x
for /f "delims=" %%x in (c:\POS\transactionid.txt) do set transid=%%x
for /f "tokens=*" %%a in (products.txt) do (
  echo. > ..\..\..\transactions\%transid%\%%a.%random%
)
echo %name% - $%cost% >> c:\POS\transaction.txt
echo %cost% >> c:\POS\sumcost.txt
echo 
cd ..\..\..\
start /b c:\POS\updatetotal.bat