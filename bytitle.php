<?php

require_once('lib/grab.php');

echo "Please input title link, ex : 'http://www.komikid.com/manga/nanatsu-no-taizai/'\ninput: ";
$url = trim(fgets(STDIN));

get_manga_title($url);

//jondes:3