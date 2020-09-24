@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
if %transcost% == 0 goto nocost
for /f "delims=" %%x in (tendered.txt) do set tendered=%%x
echo Tendered: %tendered% > amnttendered.txt
echo change = %tendered%-%transcost% > paymsg.vbs
echo msgbox "Change due: $"^&change >> paymsg.vbs
echo Set objFSO=CreateObject("Scripting.FileSystemObject") >> paymsg.vbs
echo outFile="change.txt" >>paymsg.vbs
echo Set objFile = objFSO.CreateTextFile(outFile,True) >> paymsg.vbs
echo objFile.Write change >> paymsg.vbs
echo objFile.Close >> paymsg.vbs
start paymsg.vbs
start printreceipt.vbs


start /b logtransaction.bat
exit
:nocost
start nocosterror.vbs
exit