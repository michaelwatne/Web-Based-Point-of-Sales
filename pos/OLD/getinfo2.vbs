Dim retval
    retval = "No Price Entered"
    retval = InputBox("Enter the product cost (DO NOT INCLUDE $)", +vbSystemModal)
If IsEmpty(retval) Then
    'cancelled
    WScript.Quit
Else
    'something has entered even zero-length
Set objFSO=CreateObject("Scripting.FileSystemObject")


' How to write file
outFile="inventory\Other\cost.txt"
Set objFile = objFSO.CreateTextFile(outFile,True)
objFile.Write retval
objFile.Close
End If