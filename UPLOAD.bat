@echo off

title upload

git add .
git commit -m "Commit %date% - %time%"
git push origin main

exit
