#!/bin/bash
cd /var/www/html/
wget https://github.com/BootPanel/BootPanel/archive/master.zip
if [ -f ./master.zip ]; then
  unzip master.zip
  rm -rf master.zip
  rm -rf .htaccess
  if [ -f ./README.md ]; then
    rm -rf README.md
  fi
  rm -rf shell
  rm -rf assets
  mv BootPanel-master/* /var/www/html/
  chmod 0700 shell/
  rm -rf BootPanel-master
  rm -rf README.md
  rm -rf LICENSE
fi
