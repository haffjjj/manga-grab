<?php

echo "Please input link, exmpl 'http://www.komikid.com/manga/nanatsu-no-taizai/01'\ninput: ";

$url = trim(fgets(STDIN));

$info = explode('manga/',$url);
$info = explode('/',$info[1]);

$name = $info[0];
$chapter = $info[1];

//folder directory
$dir = $name."-".$chapter;

echo "\nCreating directory /downloads/$dir...\n";

if (!file_exists("downloads") && !is_dir("downloads")) {
    mkdir("downloads");         
} 

if (!file_exists("downloads/$dir") && !is_dir("downloads/$dir")) {
    mkdir("downloads/$dir");         
} 

//get data
echo "GET data from KOMIKID...\n";
$data = file_get_contents($url);
$data = explode('var pages =',$data);
$data = explode('var next_chapter =',$data[1]);

echo "Convert to JSON...\n";
$data = json_decode(str_replace('];',']',$data[0]), TRUE);

$count = count($data);
echo "Total files = $count \n\n";

echo "Starting download manga :D...\n";

$file = 0;
foreach ($data as $value) {
    echo "Downloading $file...\n";

    if($value['external'] == 1){
        copy($value['page_image'],"downloads/$dir/$file.jpg \n\n");
    }
    else{
        $page_image = $value['page_image'];
        copy("http://www.komikid.com/uploads/manga/$name/chapters/$chapter/$page_image","downloads/$dir/$file.jpg \n\n");
    }

    $file++;

    if($file == $count){
        echo "Done, enjoy your manga\n";
    }
}