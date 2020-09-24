dim result
result = msgbox("Are you sure you want to cancel the transaction?", 4 , "Confirmation")

If result=6 then
		Set objShell = CreateObject("Wscript.Shell")
		objShell.Run "canceltrans.vbs"

else
     WScript.Quit
end if