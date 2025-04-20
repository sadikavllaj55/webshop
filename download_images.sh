#!/usr/bin/env bash

DIR="$(dirname "$0")"

mkdir -p storage/app/public/images/products/
mkdir -p storage/app/public/images/avatars/

cd storage/app/public/images/products/

#for i in {1..171} ; do
#    wget "https://onsus.vercel.app/images/product/product-${i}.jpg"
#done

cd ${DIR}

cd storage/app/public/images/avatars/

for i in {1..100} ; do
    wget -O "avatar-${i}.png" "https://avatar.iran.liara.run/public"
done
