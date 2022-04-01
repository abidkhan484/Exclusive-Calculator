#! /usr/bin/bash

backend="backend"
frontend="frontend"

cd $frontend && docker-compose down && cd ..
cd $backend && docker-compose down && cd ..


