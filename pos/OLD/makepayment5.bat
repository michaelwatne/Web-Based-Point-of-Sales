@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
if %transcost% == 0 goto nocost
echo Tendered: $5 > amnttendered.txt
echo change = 5-%transcost% > paymsg.vbs
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