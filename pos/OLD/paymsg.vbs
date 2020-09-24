change = 5-1.00  
msgbox "Change due: $"&change 
Set objFSO=CreateObject("Scripting.FileSystemObject") 
outFile="change.txt" 
Set objFile = objFSO.CreateTextFile(outFile,True) 
objFile.Write change 
objFile.Close 
