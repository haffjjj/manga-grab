<?php

function get_manga($url){

    $info = explode('manga/',$url);
    $info = explode('/',$info[1]);
    
    $name = $info[0];
    $chapter = $info[1];
    
    //folder directory
    $dir = $name."-".$chapter;
    
    echo "\nCreating directory downloads/$name/$chapter..\n";
    
    if (!file_exists("downloads") && !is_dir("downloads")) {
        mkdir("downloads");         
    } 

    if (!file_exists("downloads/$name") && !is_dir("downloads/$name")) {
        mkdir("downloads/$name");         
    } 
    
    if (!file_exists("downloads/$name/$dir") && !is_dir("downloads/$name/$dir")) {
        mkdir("downloads/$name/$dir");         
    } 
    
    //get data
    echo "GET data from KOMIKID:3..\n";
    $data = file_get_contents($url);
    $data = explode('var pages =',$data);
    $data = explode('var next_chapter =',$data[1]);
    
    echo "Convert to JSON.\n";
    $data = json_decode(str_replace('];',']',$data[0]), TRUE);
    
    $count = count($data);
    echo "Total files = $count \n\n";
    
    echo "Starting download $name chapter $chapter :D..\n";
    
    $file = 0;
    foreach ($data as $value) {
        echo "Downloading $file..\n";
    
        if($value['external'] == 1){
            $chapter_url = $value['page_image'];
        }
        else{
            $page_image = $value['page_image'];
            $chapter_url = "http://www.komikid.com/uploads/manga/$name/chapters/$chapter/$page_image";
        }
        copy($chapter_url,"downloads/$name/$dir/$file.jpg \n\n");

        $file++;
    
        if($file == $count){
            echo "Done, downloads/$name/$chapter^_^\n";
        }
    }

}

//jondes:3
