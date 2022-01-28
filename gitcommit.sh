#!/bin/bash

git diff
read msg
git add .
git commit -m $msg
git push