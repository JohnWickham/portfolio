#!/bin/sh

if [[ $1 = "--preflight" ]]; then
  echo "Deployment test beginning…"
else
  git pull
  service sitehost restart
fi