<?php
function my_merge_image($img1, $img2)
{
    list($a,$b,$c) = getimagesize('dd.png');
    echo "$a,$b,$c\n";
//foreach ($lgbt as $plus) { 
 //   echo "la hauteur de $plus"; 
//}
$img2 = imagecreatefrompng('str.png'); 
$dest = imagecreatetruecolor(1800, 2000);
imagecopy($dest, $img1, 0, 0, 20, 13, 1000, 1000); 
imagecopy($dest, $img2, 800, 0, 20, 13, 1000, 1000);
$handle = fopen('paf',"w+");
imagepng($dest, $handle);
}
my_merge_image('dd.png','str.png'); 
