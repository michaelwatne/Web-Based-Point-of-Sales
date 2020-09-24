Dim myNumber 
myNumber = 1.00  
If myNumber > 5.00 Then 
CreateObject("WScript.Shell").Run "needmorepay.vbs" 
End If 
If myNumber <= 5.00 Then 
CreateObject("WScript.Shell").Run "makepayment5.bat" 
End If 
