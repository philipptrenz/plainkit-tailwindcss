#!/bin/bash

# change to the kirby directory
cd kirby

# update to the latest version
git checkout main
git pull

# change back into the main project folder
cd ..

# add the updated Kirby submodule and commit
git add kirby
git commit -m "Update Kirby"