#!/bin/bash
out=jquery.infinitescroll.min.js
banner="/*! jquery.infinitescroll.js | https://github.com/diy/jquery-infinitescroll | Apache License (v2) */"

curl -s -d compilation_level=SIMPLE_OPTIMIZATIONS \
        -d output_format=text \
        -d output_info=compiled_code \
        --data-urlencode "js_code@jquery.infinitescroll.js" \
        http://closure-compiler.appspot.com/compile \
        > $out

echo "$banner" | cat - $out > temp && mv temp $out