<?php
$apikey = 'b00387d8-2780-451a-94c5-60eeb3fddac7';
$value = 'http://www.redcube.lk'; // a url starting with http or an HTML string.  see example #5 if you have a long HTML string
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($value));
file_put_contents('mypdf.pdf',$result);
echo'ok';