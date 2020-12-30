<?php
phpinfo();
$timestamp_ancien = time() - (15*60);


echo time();
echo "\n".$timestamp_ancien;
echo $_SERVER['HTTP_REFERER'];
?>