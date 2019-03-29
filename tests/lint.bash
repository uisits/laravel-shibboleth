#!/bin/bash

shopt -s globstar

set -e

for x in src/**/*.php; do
	php -l "$x";
done
