@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
echo Dim myNumber > checkpayment.vbs
echo myNumber = %transcost% >> checkpayment.vbs
echo If myNumber ^> 100.00 Then >> checkpayment.vbs
echo CreateObject("WScript.Shell").Run "needmorepay.vbs" >> checkpayment.vbs
echo End If >> checkpayment.vbs
echo If myNumber ^<^= 100.00 Then >> checkpayment.vbs
echo CreateObject("WScript.Shell").Run "makepayment100.bat" >> checkpayment.vbs
echo End If >> checkpayment.vbs
start /b checkpayment.vbs
exit
