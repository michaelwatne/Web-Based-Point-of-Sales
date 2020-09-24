@echo off
title Updater
echo Checking for updates. Do not close this window...
powershell -command "& { (New-Object Net.WebClient).DownloadFile('https://doc-10-5o-docs.googleusercontent.com/docs/securesc/ha0ro937gcuc7l7deffksulhg5h7mbp1/vbq6v7akltkc399c1ur51khj584knth7/1565208000000/12864771740958719274/*/1Fdxmm-HRxXHacMUfzLFWspZ1Ob1LdP1F?e=download', 'c:\POS\update\updatever.txt') }" > NUL
for /f "delims=" %%x in (c:\POS\update\updatever.txt) do set updatever=%%x
for /f "delims=" %%x in (c:\POS\version.txt) do set currentver=%%x
if %updatever% == %currentver% exit
if not %updatever% == %currentver% goto downloadupdate
:downloadupdate
echo Update is available. Updating your POS. Do not turn off this system!
echo Downloading Update...
powershell -command "& { (New-Object Net.WebClient).DownloadFile('https://doc-0g-5o-docs.googleusercontent.com/docs/securesc/ha0ro937gcuc7l7deffksulhg5h7mbp1/0po13o2hu20i341hkj5d36mpv1btrpss/1565208000000/12864771740958719274/*/19goB1bCGOkp9-vqIb-61QsY_QYr_j9vg?e=download', 'c:\POS\update\Update.7z') }" > NUL
echo Creating a restore point.
Wmic.exe /Namespace:\\root\default Path SystemRestore Call CreateRestorePoint "%DATE%", 100, 1
echo Backing up current POS version...
xcopy c:\POS c:\POS.%currentver%.backup /O /X /E /H /K
echo Installing update...
7z.exe e c:\POS\update\Update.7z c:\ -a
echo Update complete. This system needs to restart
echo in order to finish installing updates.
shutdown -r -t 20 -f
echo Shutdown will begin in 20 seconds.
pause
:lockbatch
goto lockbatch