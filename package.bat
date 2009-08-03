#!/bin/ksh

export VERSION=1.0.0

mkdir -p listifier_$VERSION/plugins

cp plugins/pi.listifier.php listifier_$VERSION/plugins/
cp README.txt listifier_$VERSION/

tar -czf listifier_$VERSION.tar.gz listifier_$VERSION

rm -rf listifier_$VERSION

echo "Created listifier_$VERSION.tar.gz"
