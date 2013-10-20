#!/bin/bash

files=(
    "DATSRCLN.txt" \
    "DERIV_CD.txt" \
    "FD_GROUP.txt" \
    "FOOD_DES.txt" \
    "FOOTNOTE.txt" \
    "LANGDESC.txt" \
    "LANGUAL.txt"  \
    "NUT_DATA.txt" \
    "NUTR_DEF.txt" \
    "SRC_CD.txt"   \
    "WEIGHT.txt"   \
    "DATA_SRC.txt"
)

/usr/bin/mysql -urecipes -p < sr26.sql

for x in "${files[@]}"
do
    ./import.php $x
done

/usr/bin/mysql -urecipes -p < keys.sql
