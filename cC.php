<?php
function my_merge_image($img1, $img2)
{
$lgbt = array();
$img1 = imagecreatefrompng('dd.png');
$img2 = imagecreatefrompng('str.png'); 
$lgbt[0] = getimagesize('dd.png');
$lgbt[1] = getimagesize('str.png');
//foreach ($lgbt as $plus) {
 //   if 
$img = imagecreatetruecolor(1800, 2000);
imagecopy($dest, $img1, 0, 0, 20, 13, 1000, 1000); 
imagecopy($dest, $img2, 800, 0, 20, 13, 1000, 1000);
$handle = fopen('paf',"w+");
imagepng($dest, $handle);
var_dump($lgbt);
}
my_merge_image('dd.png','str.png');
