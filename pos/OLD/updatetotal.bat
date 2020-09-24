@echo off
cd c:\POS
for /f "delims=" %%x in (transactionid.txt) do set transid=%%x
if exist transactions\%transid%\%productid%.prod goto updatecount
if not exist transactions\%transid%\%productid%.prod goto addproduct
:addproduct
echo 1 > transactions\%transid%\%productid%.prod
goto updatetotal
:updatecount
for /f "delims=" %%x in (transactions\%transid%\%productid%.prod) do set oldcount=%%x
set /a newcount=%oldcount%+1
echo %newcount% > transactions\%transid%\%productid%.prod
goto updatetotal
:updatetotal
setlocal enabledelayedexpansion
cls
for /F "tokens=1,2,3" %%i in (c:\POS\sumcost.txt) do call :process %%i %%j %%k
goto thenextstep
:process
set VAR1=%1
set VAR2=%2
set VAR3=%3
set /a cost1=%cost1% + %VAR1:~0,1%
set /a cost2=%cost2% + %VAR1:~2,2%
set %VAR1:~0,1%
if %cost2% == 100 set /a cost1=1+%cost1%
if %cost2% == 100 set /a cost2-=100
if %cost2% == 125 set /a cost1=1+%cost1%
if %cost2% == 125 set /a cost2-=100
if %cost2% == 150 set /a cost1=1+%cost1%
if %cost2% == 150 set /a cost2-=100
if %cost2% == 175 set /a cost1=1+%cost1%
if %cost2% == 175 set /a cost2-=100

if %cost2% == 0 echo %cost1%.00 > c:\POS\transactioncost.txt
if %cost2% == 1 echo %cost1%.01 > c:\POS\transactioncost.txt
if %cost2% == 2 echo %cost1%.02 > c:\POS\transactioncost.txt
if %cost2% == 3 echo %cost1%.03 > c:\POS\transactioncost.txt
if %cost2% == 4 echo %cost1%.04 > c:\POS\transactioncost.txt
if %cost2% == 5 echo %cost1%.05 > c:\POS\transactioncost.txt
if %cost2% == 6 echo %cost1%.06 > c:\POS\transactioncost.txt
if %cost2% == 7 echo %cost1%.07 > c:\POS\transactioncost.txt
if %cost2% == 8 echo %cost1%.08 > c:\POS\transactioncost.txt
if %cost2% == 9 echo %cost1%.09 > c:\POS\transactioncost.txt
if %cost2% GTR 9 echo %cost1%.%cost2% > c:\POS\transactioncost.txt
echo 1. %cost% 
echo 2. %cost2%
echo 3. %cost2:~0,1%
set cost=%cost1%.%cost2%
:thenextstep


REM Programmed by TrueNTG