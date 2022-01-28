#!/bin/bash

git diff
read -p "Commit message: " msg
git add .
git commit -m "$msg"
git push

read ggg