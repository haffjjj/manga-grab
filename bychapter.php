<?php

require_once('lib/grab.php');

echo "Please input chapter link, ex : 'http://www.komikid.com/manga/nanatsu-no-taizai/01'\ninput: ";
$url = trim(fgets(STDIN));

get_manga($url);

//jondes:3
