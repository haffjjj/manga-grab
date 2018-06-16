<?php

require_once('lib/simple_html_dom.php');
require_once('lib/grab.php');

echo "Please input title link, ex : 'http://www.komikid.com/manga/nanatsu-no-taizai/'\ninput: ";
$url = trim(fgets(STDIN));

$html = file_get_html($url);
$data = $html->find(".chapter-title-rtl");
$total_chapters = count($data);

echo "Total chapters : ".$total_chapters."\n\n";
echo "Starting download all chapter..\n";

$count = 0;
foreach ($data as $value) {
    get_manga($value->find("a")[0]->href);
    $count++;
}

if($count == $total_chapters){
    echo "\n all chapter was downloaded, enjoy :D\n";
}

//jondes:3