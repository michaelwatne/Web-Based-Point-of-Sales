@echo off
set checktime=1
start /wait insertusb.vbs
:recheck
if exist D: goto copydata
if exist E: goto copydata
if exist F: goto copydata
if exist G: goto copydata
if exist H: goto copydata
if exist I: goto copydata
if exist J: goto copydata
if not exist D: goto recheckusb%checktime%
if not exist E: goto recheckusb%checktime%
if not exist F: goto recheckusb%checktime%
if not exist G: goto recheckusb%checktime%
if not exist H: goto recheckusb%checktime%
if not exist I: goto recheckusb%checktime%
if not exist J: goto recheckusb%checktime%
:recheckusb1
set /a checktime=%checktime% + 1
start /wait retryusb
goto recheck
:recheckusb2
set /a checktime=%checktime% + 1
start /wait retryusb.vbs
goto recheck
:recheckusb3
set /a checktime=%checktime% + 1
:recheckusb4
start nodetect.vbs
exit
:copydata
echo Detected
pause
exit