#!/usr/bin/env bash

cd storage/app/public/images/products/

for i in {1..171} ; do
    wget "https://onsus.vercel.app/images/product/product-${i}.jpg"
done
