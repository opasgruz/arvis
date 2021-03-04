#!/bin/bash

set -e

# Absolute path to this script. /home/user/bin/foo.sh
SCRIPT=$(readlink -f $0)
# Absolute path this script is in. /home/user/bin
DIR=`dirname $SCRIPT`

cd $DIR

composer install

php artisan migrate --force || exit 1
