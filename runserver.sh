#! /usr/bin/bash

backend="backend"
frontend="frontend"

cd $frontend && docker-compose up -d && cd ..
cd $backend && docker-compose up -d && cd ..


