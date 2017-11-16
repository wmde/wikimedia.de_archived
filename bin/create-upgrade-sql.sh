#!/bin/bash
#
# Copyright 2017 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

set -o nounset
set -o errexit

if [[ $# != 1 ]]; then
	echo "Need a version to migrate from, i.e. '1.3'."
	exit 1
fi

TARGET=data/upgrade-$1.sql
echo "" > $TARGET

echo "Creating upgrade bundle as $TARGET..."
for prefix in base cms billing ecommerce; do
	for d in $(find app/libraries -path "*/${prefix}_*" -maxdepth 1); do
		cd $d
		sqls=$(git diff --name-only origin/$1 -- data/upgrade/*.sql)
		cd -
		for sql in $sqls; do
			echo "-- from: $d/$sql" >> $TARGET
			cat $d/$sql >> $TARGET
			echo "" >> $TARGET
		done
	done
done

