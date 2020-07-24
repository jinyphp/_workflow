<?php

echo "jinyPHP Development Server started at ".date("Y-m-d H:i:s")." \n";
echo "Listening on http://localhost:8000 \n";
echo "Document root is ".getcwd()." \n";
echo "Press Ctrl-C to quit. \n";

passthru("php -S localhost:8000 -t ./public", $status);
