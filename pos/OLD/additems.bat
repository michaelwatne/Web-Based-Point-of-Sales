@echo off
for /f "delims=" %%x in (getitemid.txt) do set itemid=%%x
cd inventory\%itemid%
start /b addtotransaction.bat