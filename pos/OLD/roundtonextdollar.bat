@echo off
for /f "delims=" %%x in (transactioncost.txt) do set transcost=%%x
echo Dim transcost, tendered > paymsg.vbs
echo transcost = %transcost% >> paymsg.vbs
::echo tendered = Round(transcost, 2) >> paymsg.vbs
echo tendered = -int(0-transcost) >> paymsg.vbs
echo change = tendered-transcost >> paymsg.vbs
echo msgbox "Change due: $"^&change >> paymsg.vbs
echo Set objFSO=CreateObject("Scripting.FileSystemObject") >> paymsg.vbs
echo outFile="change.txt" >>paymsg.vbs
echo Set objFile = objFSO.CreateTextFile(outFile,True) >> paymsg.vbs
echo objFile.Write change >> paymsg.vbs
echo objFile.Close >> paymsg.vbs
start paymsg.vbs
start printreceipt.vbs