<?php

if ($dh = opendir($argv[1])) {
    while (($file = readdir($dh)) !== false) {
        /*
        echo filetype($file);
        //echo "filename: $file : filetype " . filetype($dir . $file) . "\n";
        if ($file == ".") 
            echo "true";
        elseif ($file == "..")
            echo "true again";
        else 
            */
            $arr[] = $file;
    } 
    //closedir($dh);
    var_dump($arr);
}

