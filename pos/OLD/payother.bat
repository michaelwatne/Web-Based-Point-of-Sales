@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
for /f "delims=" %%x in (tendered.txt) do set tendered=%%x
echo Dim myNumber > checkpayment.vbs
echo myNumber = %transcost% >> checkpayment.vbs
echo If myNumber ^> %tendered% Then >> checkpayment.vbs
echo CreateObject("WScript.Shell").Run "needmorepay.vbs" >> checkpayment.vbs
echo End If >> checkpayment.vbs
echo If myNumber ^<^= %tendered% Then >> checkpayment.vbs
echo CreateObject("WScript.Shell").Run "makepaymentother.bat" >> checkpayment.vbs
echo End If >> checkpayment.vbs
start /b checkpayment.vbs
exit
