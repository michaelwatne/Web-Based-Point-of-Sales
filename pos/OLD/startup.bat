@echo off
cd C:\POS
taskkill /f /im explorer.exe
::Check for Updates
::start /wait c:\POS\checkforupdates.bat

:reloopifclose
start /wait C:\POS\index.hta
goto reloopifclose
exit