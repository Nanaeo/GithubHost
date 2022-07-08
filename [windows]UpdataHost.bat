@echo off
type hosts.txt >> %SystemRoot%\System32\drivers\etc\hosts
ipconfig /flushdns
pause
