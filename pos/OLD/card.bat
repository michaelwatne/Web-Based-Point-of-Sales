@echo off
:checkpayment
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
echo Tendered: %transcost% (Card) > amnttendered.txt
echo transcost = %transcost% > paymsg.vbs
echo change = 0-%transcost% >> paymsg.vbs
echo msgbox "Use mobile pinpad to complete transaction. Amount due: $"^&transcost >> paymsg.vbs
echo Set objFSO=CreateObject("Scripting.FileSystemObject") >> paymsg.vbs
echo outFile="change.txt" >>paymsg.vbs
echo Set objFile = objFSO.CreateTextFile(outFile,True) >> paymsg.vbs
echo objFile.Write change >> paymsg.vbs
echo objFile.Close >> paymsg.vbs
start paymsg.vbs
start printreceipt.vbs


start /b logtransaction.bat
exit
