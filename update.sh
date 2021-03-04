#!/bin/bash

set -e

# Absolute path to this script. /home/user/bin/foo.sh
SCRIPT=$(readlink -f $0)
# Absolute path this script is in. /home/user/bin
DIR=`dirname $SCRIPT`

cd $DIR

composer install

/opt/php/7.3/bin/php artisan migrate --force || exit 1
