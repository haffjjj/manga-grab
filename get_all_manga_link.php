<?php
require_once('lib/simple_html_dom.php');

$url = 'http://www.komikid.com/changeMangaList?type=text';

$html = file_get_html($url);
$data = $html->find(".alpha-link");

$manga_link = [];
foreach ($data as $value) {
    $manga_link[] = [
        'link' => $value->href
    ];
}

echo json_encode($manga_link,TRUE);

