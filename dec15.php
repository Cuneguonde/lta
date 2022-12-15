<?php

if ($dh = opendir($argv[1])) {
    while (($file = readdir($dh)) !== false) {
        //echo "filename: $file : filetype " . filetype($dir . $file) . "\n";
        if ($file == ".") {}
        elseif ($file == ".."){}
        else{  
        $arr0[] = array(mime_content_type($file), $file);
        }
    } 
    //var_dump($arr0);
}
foreach ($arr0 as $mime){
    if ( preg_match('/png$/', $mime[0]) == 1){
        echo "true\n";
    }
    elseif ( preg_match('/png$/', $mime[0]) == 0){
        echo "false\n";
  //  print_r($mime[1] . "\n");
}
}
