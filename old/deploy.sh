#!/bin/bash

echo -e "\033[0;32mDeploying updates to GitHub...\033[0m"

# Build the project.
hugo -t tahini
echo -e "\033[0;32mPassing CNAME to the doc folder\033[0m"
cp CNAME compiles
cd compiles
git add .

git commit -m "Updating site"
git push

echo -e "\033[0;32mDone!\033[0m"
