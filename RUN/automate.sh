#!/bin/bash
set -x # Enable debugging
export NO_AT_BRIDGE=0 # fix for the error "Gtk-WARNING **: 22:57:12.283: cannot open display: :0"

cd ./

lando start # start the containers lando

lando db-import ./bdd_video_games.sql # import the database

xdg-open "http://phptp-jeuxvideos.lndo.site/" # open the website in the browser

echo "Setup complete, don't forget to connect you to the database" # message to the user

set +x # Disable debugging