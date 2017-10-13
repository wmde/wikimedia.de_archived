#!/bin/bash
#
# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

set -o nounset
set -o errexit

# Must be executed from the project root (where Envfile is located).
[[ ! -f Envfile ]] && echo "error: not invoked from project root" && exit 1

source Envfile

if [[ ! -L assets/app ]]; then
	ln -vs ../app/assets assets/app
fi
# We assume at least base_core is present. So we cannot error out.
for SDIR in $(ls -d app/libraries/*/assets); do
	TNAME=$(basename $(dirname $SDIR))
	TNAME=${TNAME//_/-} # Assets use score instead of underscores.

	if [[ ! -L assets/${TNAME} ]]; then
		ln -vs ../$SDIR assets/${TNAME}
	fi
done

