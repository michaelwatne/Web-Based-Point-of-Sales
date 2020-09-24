DIM fso    
Set fso = CreateObject("Scripting.FileSystemObject")


Dim retval
    retval = "No Info Entered"
    retval = InputBox("Enter amount tendered")
If IsEmpty(retval) Then
    'cancelled
    WScript.Quit
Else
    'something has entered even zero-length
Set objFSO=CreateObject("Scripting.FileSystemObject")


' How to write file
outFile="tendered.txt"
Set objFile = objFSO.CreateTextFile(outFile,True)
objFile.Write retval
objFile.Close
CreateObject("WScript.Shell").Run "payother.bat"
End If


