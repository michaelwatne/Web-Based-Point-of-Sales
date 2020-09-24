@echo off
if exist c:\Windows\System32\tabcal.exe goto calibratescreen
if not exist c:\Windows\System32\tabcal.exe goto notouchscreen
:calibratescreen
start c:\Windows\System32\tabcal.exe DeviceKind=touch DisplayID=\\.\DISPLAY1
exit
:notouchscreen
start calerror.vbs
exit