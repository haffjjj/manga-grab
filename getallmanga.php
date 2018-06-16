<?php
require_once('lib/grab.php');

$all_manga = file_get_contents('all_manga_link.json');
$all_manga = json_decode($all_manga,TRUE);

$total = count($all_manga);

echo "Total manga : $total\n";
echo "Prepearing to downloads..\n\n";

$count = 1;
foreach ($all_manga as $value) {
    echo "From $count to $total\n";
    get_manga_title($value['link']);
    $count++;

    if($count == $total+1){
        echo "\n ALL MANGA WAS DOWNLOADED, AMAZINGGG :D\n";    
    }
}

